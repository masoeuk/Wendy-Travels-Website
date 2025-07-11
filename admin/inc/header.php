<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Wendy Travels Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap (optional but recommended) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

  <!-- Embedded admin styles -->
  <style>
    /*--------------------------------------------------------------
    # Admin Color Variables
    --------------------------------------------------------------*/
    :root {
      /* Reuse your existing color scheme */
      --admin-background: #f2f8f9;
      --admin-surface: #ffffff;
      --admin-text: #000000;
      --admin-heading: #000000;
      --admin-accent: #ff8a00;
      --admin-alert: #dc3545;
      --admin-success: #28a745;

      /* Admin-specific variables */
      --admin-border: rgba(0, 0, 0, 0.1);
      --admin-shadow: 0 2px 15px rgba(0, 0, 0, 0.05);
    }

    /*--------------------------------------------------------------
    # Admin Base Styles
    --------------------------------------------------------------*/
    .admin-login,
    .admin-dashboard {
      color: var(--admin-text);
      background-color: var(--admin-background);
      font-family: Arial, Helvetica, sans-serif;
      min-height: 100vh;
      padding: 0;
      margin: 0;
    }

    /*--------------------------------------------------------------
    # Admin Containers
    --------------------------------------------------------------*/
    .login-container,
    .admin-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem;
    }

    .form-container {
      background: var(--admin-surface);
      border-radius: 8px;
      box-shadow: var(--admin-shadow);
      padding: 2rem;
      margin: 2rem auto;
      max-width: 500px;
    }

    /*--------------------------------------------------------------
    # Admin Typography
    --------------------------------------------------------------*/
    .admin-dashboard h1,
    .admin-dashboard h2,
    .admin-dashboard h3 {
      color: var(--admin-heading);
      font-family: Arial, Helvetica, sans-serif;
      margin-bottom: 1.5rem;
    }

    /*--------------------------------------------------------------
    # Admin Form Elements
    --------------------------------------------------------------*/
    .admin-dashboard input,
    .admin-dashboard select,
    .admin-dashboard textarea {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid var(--admin-border);
      border-radius: 4px;
      font-family: Arial, Helvetica, sans-serif;
      transition: all 0.3s ease;
    }

    .admin-dashboard input:focus,
    .admin-dashboard select:focus,
    .admin-dashboard textarea:focus {
      border-color: var(--admin-accent);
      outline: none;
      box-shadow: 0 0 0 3px rgba(255, 138, 0, 0.2);
    }

    .admin-dashboard button,
    .admin-dashboard .btn {
      background-color: var(--admin-accent);
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 4px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
    }

    .admin-dashboard button:hover {
      background-color: #cc7300; /* fallback for color-mix */
      /* fallback as color-mix() not supported in all browsers */
    }

    /*--------------------------------------------------------------
    # Admin Alerts & Messages
    --------------------------------------------------------------*/
    .alert {
      padding: 0.75rem 1.25rem;
      border-radius: 4px;
      margin-bottom: 1rem;
    }

    .alert-danger {
      background-color: rgba(220, 53, 69, 0.1);
      color: var(--admin-alert);
      border-left: 3px solid var(--admin-alert);
    }

    .alert-success {
      background-color: rgba(40, 167, 69, 0.1);
      color: var(--admin-success);
      border-left: 3px solid var(--admin-success);
    }

    /*--------------------------------------------------------------
    # Admin Navigation
    --------------------------------------------------------------*/
    .admin-nav {
      background: var(--admin-surface);
      box-shadow: var(--admin-shadow);
      margin-bottom: 2rem;
      border-radius: 8px;
      padding: 1rem;
    }

    .admin-nav ul {
      display: flex;
      gap: 1rem;
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .admin-nav a {
      color: var(--admin-text);
      padding: 0.5rem 1rem;
      border-radius: 4px;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .admin-nav a:hover {
      color: var(--admin-accent);
      background: rgba(255, 138, 0, 0.1);
    }

    /*--------------------------------------------------------------
    # Admin Cards
    --------------------------------------------------------------*/
    .stat-card {
      background: var(--admin-surface);
      padding: 1.5rem;
      border-radius: 8px;
      box-shadow: var(--admin-shadow);
      text-align: center;
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card h3 {
      color: var(--admin-text);
      font-size: 1rem;
      margin-bottom: 0.5rem;
    }

    .stat-card span {
      color: var(--admin-accent);
      font-size: 2rem;
      font-weight: bold;
    }

    /*--------------------------------------------------------------
    # Admin Tables
    --------------------------------------------------------------*/
    .admin-table {
      width: 100%;
      border-collapse: collapse;
      background: var(--admin-surface);
      box-shadow: var(--admin-shadow);
      border-radius: 8px;
      overflow: hidden;
    }

    .admin-table th,
    .admin-table td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid var(--admin-border);
    }

    .admin-table th {
      background-color: rgba(255, 138, 0, 0.1);
      color: var(--admin-accent);
      font-family: Arial, Helvetica, sans-serif;
    }

    /*--------------------------------------------------------------
    # Admin Responsiveness
    --------------------------------------------------------------*/
    @media (max-width: 768px) {
      .admin-nav ul {
        flex-direction: column;
        gap: 0.5rem;
      }

      .form-container {
        padding: 1.5rem;
        margin: 1rem;
      }
    }
  </style>
</head>
<body>
  <header class="bg-light p-3 mb-4">
    <div class="container">
      <h1 class="h3">Wendy Travels Admin</h1>
      <nav>
        <a href="dashboard.php">Dashboard</a> |
        <a href="destinations.php">Destinations</a> |
        <a href="tours.php">Tours</a> |
        <a href="gallery.php">Gallery</a> |
        <a href="testimonials.php">Testimonials</a> |
        <a href="logout.php">Logout</a>
      </nav>
    </div>
  </header>

  <!-- Your page content here -->

</body>
</html>
