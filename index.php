<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>About Me</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      color: #333;
      margin: 0;
      padding: 0;
    }

    header {
      background: #2c3e50;
      color: white;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }

    .container {
      width: 80%;
      margin: 20px auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    h2 {
      color: #2c3e50;
    }

    p {
      line-height: 1.6;
    }

    a {
      color: #3498db;
      text-decoration: none;
      margin-right: 15px;
    }

    a:hover {
      text-decoration: underline;
    }

    .nav {
      margin: 20px 0;
      padding: 10px;
      background: #ecf0f1;
      border-radius: 5px;
    }

    .admin-link {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 15px;
      background: #e74c3c;
      color: white;
      border-radius: 5px;
    }

    .admin-link:hover {
      background: #c0392b;
    }
  </style>
</head>

<body>
  <header>
    <h1>About Me</h1>
  </header>

  <div class="container">

    <div class="nav">
      <a href="activities.php">My Activities</a> 
      <a href="education.php">My Education</a> 
      <a href="qualification.php">My Qualifications</a> 
      <a href="interest.php">My Interests</a>
  </div>
  
    <div>  
	<?php
    $result = $conn->query("SELECT * FROM about LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        echo "<h2>".$row['name']."</h2>";
        echo "<p><a href='mailto:".$row['email']."' target='_blank'>".$row['email']."</a></p>";
        echo "<p>".$row['description']."</p>";
    }
    ?>
    </div>

    <a href="login.php" target="_blank" class="admin-link">🔒 Admin Login</a>
  </div>
</body>
</html>
