<?php
session_start();
if (!isset($_SESSION['admin'])) { 
    header("Location: login.php"); 
    exit; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
    }

    .dashboard-container {
      width: 80%;
      max-width: 800px;
      margin: 50px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
      text-align: center;
    }

    h1 {
      color: #2c3e50;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    ul li {
      margin: 15px 0;
    }

    ul li a {
      display: block;
      padding: 12px;
      background: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background 0.3s;
    }

    ul li a:hover {
      background: #2980b9;
    }

    .logout {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #e74c3c;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .logout:hover {
      background: #c0392b;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h1>⚙️ Admin Dashboard</h1>
    <ul>
      <li><a href="manage_about.php">Manage About</a></li>
      <li><a href="manage_activities.php">Manage Activities</a></li>
      <li><a href="manage_education.php">Manage Education</a></li>
      <li><a href="manage_qualification.php">Manage Qualifications</a></li>
      <li><a href="manage_interest.php">Manage Interests</a></li>
    </ul>
    <a href="logout.php" class="logout">🚪 Logout</a>
  </div>
</body>
</html>
