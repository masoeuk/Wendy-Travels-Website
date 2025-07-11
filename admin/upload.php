<?php
session_start();

// OPTIONAL: require login
if (!isset($_SESSION['admin_logged_in'])) {
  http_response_code(403);
  echo json_encode(['error' => 'Access denied.']);
  exit;
}

header('Content-Type: application/json');

// Settings
$allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
$maxSize = 5 * 1024 * 1024; // 5 MB
$uploadBase = '../assets/img/'; // relative to this PHP file

// Check if file and folder are set
if (!isset($_FILES['image'])) {
  echo json_encode(['error' => 'No file uploaded.']);
  exit;
}

$file = $_FILES['image'];

// Optional subfolder from POST (e.g., 'travel', 'gallery')
$folder = isset($_POST['folder']) ? basename($_POST['folder']) : 'uploads';
$uploadDir = $uploadBase . $folder . '/';

// Create folder if not exists
if (!is_dir($uploadDir)) {
  mkdir($uploadDir, 0755, true);
}

// Validate file type
if (!in_array($file['type'], $allowedTypes)) {
  echo json_encode(['error' => 'Invalid file type.']);
  exit;
}

// Validate file size
if ($file['size'] > $maxSize) {
  echo json_encode(['error' => 'File too large. Max 5MB.']);
  exit;
}

// Generate unique file name
$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
$filename = uniqid('img_', true) . '.' . $ext;
$destination = $uploadDir . $filename;

if (move_uploaded_file($file['tmp_name'], $destination)) {
  $relativeUrl = 'assets/img/' . $folder . '/' . $filename;
  echo json_encode(['success' => true, 'url' => $relativeUrl]);
} else {
  echo json_encode(['error' => 'Failed to move uploaded file.']);
}
