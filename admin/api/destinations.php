<?php
session_start();
// Simple auth check (optional)
// if (!isset($_SESSION['admin_logged_in'])) { http_response_code(403); exit; }

header('Content-Type: application/json');

$destFile = __DIR__ . '/../data/destinations.json';
$uploadDir = __DIR__ . '/../assets/img/travel/';

if (!file_exists($destFile)) {
  file_put_contents($destFile, json_encode([]));
}

$action = $_GET['action'] ?? '';

function readDestinations() {
  global $destFile;
  $json = file_get_contents($destFile);
  return json_decode($json, true);
}

function saveDestinations($data) {
  global $destFile;
  return file_put_contents($destFile, json_encode($data, JSON_PRETTY_PRINT));
}

function uploadImage() {
  global $uploadDir;
  $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
  $maxSize = 5 * 1024 * 1024;

  if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    return ['error' => 'No image uploaded or upload error'];
  }
  $file = $_FILES['image'];

  if (!in_array($file['type'], $allowedTypes)) {
    return ['error' => 'Invalid file type'];
  }
  if ($file['size'] > $maxSize) {
    return ['error' => 'File too large'];
  }

  if (!is_dir($uploadDir)) mkdir($uploadDir, 0755, true);

  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $filename = uniqid('img_', true) . '.' . $ext;
  $dest = $uploadDir . $filename;

  if (move_uploaded_file($file['tmp_name'], $dest)) {
    return ['url' => 'assets/img/travel/' . $filename];
  }
  return ['error' => 'Failed to move uploaded file'];
}

if ($action === 'list') {
  echo json_encode(readDestinations());
  exit;
}

if ($action === 'add') {
  $destinations = readDestinations();

  // upload image
  $imgUpload = uploadImage();
  if (isset($imgUpload['error'])) {
    echo json_encode(['success' => false, 'error' => $imgUpload['error']]);
    exit;
  }

  $newId = count($destinations) ? max(array_column($destinations, 'id')) + 1 : 1;
  $newDest = [
    'id' => $newId,
    'title' => $_POST['title'] ?? '',
    'description' => $_POST['description'] ?? '',
    'category' => $_POST['category'] ?? '',
    'tag' => $_POST['tag'] ?? '',
    'tag_class' => $_POST['tag_class'] ?? '',
    'tours' => $_POST['tours'] ?? '',
    'price' => $_POST['price'] ?? '',
    'image' => $imgUpload['url']
  ];

  $destinations[] = $newDest;
  saveDestinations($destinations);

  echo json_encode(['success' => true]);
  exit;
}

if ($action === 'delete') {
  $id = intval($_GET['id'] ?? 0);
  $destinations = readDestinations();
  $destinations = array_filter($destinations, fn($d) => $d['id'] !== $id);
  saveDestinations(array_values($destinations));
  echo json_encode(['success' => true]);
  exit;
}

if ($action === 'edit') {
  $id = intval($_POST['id'] ?? 0);
  $destinations = readDestinations();

  $index = null;
  foreach ($destinations as $k => $d) {
    if ($d['id'] === $id) {
      $index = $k;
      break;
    }
  }

  if ($index === null) {
    echo json_encode(['success' => false, 'error' => 'Destination not found']);
    exit;
  }

  // Update fields
  $destinations[$index]['title'] = $_POST['title'] ?? $destinations[$index]['title'];
  $destinations[$index]['description'] = $_POST['description'] ?? $destinations[$index]['description'];
  $destinations[$index]['category'] = $_POST['category'] ?? $destinations[$index]['category'];
  $destinations[$index]['tag'] = $_POST['tag'] ?? $destinations[$index]['tag'];
  $destinations[$index]['tag_class'] = $_POST['tag_class'] ?? $destinations[$index]['tag_class'];
  $destinations[$index]['tours'] = $_POST['tours'] ?? $destinations[$index]['tours'];
  $destinations[$index]['price'] = $_POST['price'] ?? $destinations[$index]['price'];

  // If new image uploaded
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imgUpload = uploadImage();
    if (isset($imgUpload['error'])) {
      echo json_encode(['success' => false, 'error' => $imgUpload['error']]);
      exit;
    }
    $destinations[$index]['image'] = $imgUpload['url'];
  }

  saveDestinations($destinations);
  echo json_encode(['success' => true]);
  exit;
}

echo json_encode(['success' => false, 'error' => 'Invalid action']);

