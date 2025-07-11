<?php include 'inc/header.php'; ?>

<?php
session_start();

if (isset($_SESSION['admin_logged_in'])) {
  header('Location: dashboard.php');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  if ($username === 'admin' && $password === 'secret') {
    $_SESSION['admin_logged_in'] = true;
    header('Location: dashboard.php');
    exit;
  } else {
    $error = 'Invalid credentials.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
  <div class="form-container">
    <h2>Admin Login</h2>
    <?php if ($error): ?><div class="alert"><?= $error ?></div><?php endif; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>


<?php include 'inc/footer.php'; ?>
