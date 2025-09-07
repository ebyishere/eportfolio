<?php include("db.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Qualification</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      color: #333;
      margin: 0;
      padding: 0;
    }
	
    header {
      background: #16a085;
      color: white;
      padding: 20px;
      text-align: center;
    }

    h1 {
      margin: 0;
    }
    }
    .card {
      background: #fff;
      padding: 15px;
      margin: 20px auto;
      max-width: 600px;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .card h3 {
      margin: 0;
      color: #34495e;
    }
    .card p {
      margin: 10px 0;
      line-height: 1.5;
    }
    .card small {
      color: #888;
    }
	hr {
      border: 0;
      border-top: 1px solid #ddd;
      margin: 15px 0;
    }
    a.back {
      display: block;
      text-align: center;
      margin: 30px auto;
      width: 200px;
      background: #3498db;
      padding: 10px;
      border-radius: 6px;
      color: #fff;
      text-decoration: none;
    }
    a.back:hover {
      background: #2980b9;
    }
	.container {
      width: 80%;
      margin: 20px auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
<header>
<h1>My Qualification</h1>
</header>

<div class="container">
<?php
$result = $conn->query("SELECT * FROM qualification ORDER BY year DESC");
while($row = $result->fetch_assoc()) {
    echo "<div class='card'>";
    echo "<h3>".$row['qualification_name']."</h3>";
    echo "<p>".$row['institution']."</p>";
    echo "<small>📅 ".$row['year']."</small><hr>";
    echo "</div>";
}
?>

<a class="back" href="index.php">⬅ Back to About Me</a>
</div>
</body>
</html>
