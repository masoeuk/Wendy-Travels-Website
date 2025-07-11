<?php
// admin-dashboard.php (example filename)
session_start();
// You can add auth check here if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Wendy Travels Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap (optional but recommended) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

  <!-- Full hardcoded CSS -->
  <style>
    :root {
      --admin-background: #f2f8f9;
      --admin-surface: #ffffff;
      --admin-text: #000000;
      --admin-heading: #000000;
      --admin-accent: #ff8a00;
      --admin-alert: #dc3545;
      --admin-success: #28a745;
      --admin-border: rgba(0, 0, 0, 0.1);
      --admin-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
      --surface-color: #ffffff;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: var(--admin-background);
      margin: 0;
      padding: 0;
      color: var(--admin-text);
    }

    header {
      background-color: #f8f9fa;
      padding: 1rem 0.75rem;
      margin-bottom: 1.5rem;
      box-shadow: var(--admin-shadow);
    }

    header .container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    header h1 {
      margin: 0;
      font-size: 1.5rem;
      color: var(--admin-heading);
    }

    nav a {
      color: var(--admin-text);
      text-decoration: none;
      margin-left: 1rem;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav a:first-child {
      margin-left: 0;
    }

    nav a:hover {
      color: var(--admin-accent);
    }

    .admin-container {
      max-width: 1200px;
      margin: 0 auto 3rem;
      padding: 0 1rem;
    }

    .admin-container h1 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
      color: var(--admin-heading);
    }

    .admin-container p {
      font-size: 1.1rem;
      margin-bottom: 2rem;
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .admin-card {
      flex: 1 1 45%;
      background: var(--surface-color);
      padding: 1.5rem;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .admin-card h2 {
      margin-top: 0;
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      color: var(--admin-accent);
    }

    .admin-card p {
      flex-grow: 1;
      font-size: 1rem;
      margin-bottom: 1rem;
      color: #333;
    }

    .btn {
      background-color: var(--admin-accent);
      color: white !important;
      text-decoration: none;
      padding: 0.5rem 1rem;
      border-radius: 4px;
      text-align: center;
      transition: background-color 0.3s ease;
      font-weight: 600;
      display: inline-block;
      cursor: pointer;
      border: none;
    }

    .btn:hover {
      background-color: #cc7300;
      color: white !important;
      text-decoration: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .admin-card {
        flex: 1 1 100%;
      }

      nav {
        width: 100%;
        margin-top: 0.5rem;
      }

      nav a {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <h1>Wendy Travels Admin</h1>
      <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="destinations.php">Destinations</a>
        <a href="tours.php">Tours</a>
        <a href="gallery.php">Gallery</a>
        <a href="testimonials.php">Testimonials</a>
        <a href="logout.php">Logout</a>
      </nav>
    </div>
  </header>

  <div class="admin-container">
    <h1>Welcome, Admin</h1>
    <p>Use the options below to manage your travel site content:</p>

    <div class="row">
      <div class="admin-card">
        <h2>🌍 Destinations</h2>
        <p>Add, edit, delete destinations.</p>
        <a href="destinations.php" class="btn">Manage Destinations</a>
      </div>

      <div class="admin-card">
        <h2>🧭 Tours</h2>
        <p>Control tours & pricing information.</p>
        <a href="tours.php" class="btn">Manage Tours</a>
      </div>

      <div class="admin-card">
        <h2>🖼️ Gallery</h2>
        <p>Upload or manage gallery images.</p>
        <a href="gallery.php" class="btn">Manage Gallery</a>
      </div>

      <div class="admin-card">
        <h2>💬 Testimonials</h2>
        <p>Read and manage customer testimonials.</p>
        <a href="testimonials.php" class="btn">Manage Testimonials</a>
      </div>
    </div>
  </div>

</body>
</html>
