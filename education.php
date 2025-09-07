<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Education</title>
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

    h3 {
      color: #2c3e50;
      margin-bottom: 5px;
    }

    p {
      margin: 5px 0 10px;
      font-style: italic;
      line-height: 1.6;
    }

    small {
      color: #7f8c8d;
      font-weight: bold;
    }

    hr {
      border: 0;
      border-top: 1px solid #ddd;
      margin: 15px 0;
    }

    a.back {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 15px;
      background: #3498db;
      color: white;
      border-radius: 5px;
      text-decoration: none;
    }

    a.back:hover {
      background: #2980b9;
    }
  </style>
</head>
<body>
  <header>
    <h1>My Education</h1>
  </header>

  <div class="container">
    <?php
    $result = $conn->query("SELECT * FROM education");
    while($row = $result->fetch_assoc()) {
       echo "<h3>".$row['school']."</h3>";
       echo "<p>".$row['program']."</p>";
       echo "<small>".$row['year']."</small><hr>";
    }
    ?>

    <a href="index.php" class="back">⬅ Back to About Me</a>
  </div>
</body>
</html>

