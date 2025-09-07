<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include("db.php");

// Add New
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $conn->query("INSERT INTO activities (title, description, date) VALUES ('$title','$desc','$date')");
}

// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // secure deletion by id
    $conn->query("DELETE FROM activities WHERE title=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Activities</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background: #f4f6f9;
      color: #333;
    }
    h1 {
      color: #2c3e50;
      border-bottom: 2px solid #ddd;
      padding-bottom: 10px;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #3498db;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #2980b9;
    }
    .activity {
      background: #fff;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 8px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1);
    }
    .activity h3 {
      margin: 0;
      color: #34495e;
    }
    .activity small {
      color: #888;
    }
    .delete-btn {
      display: inline-block;
      margin-top: 10px;
      color: red;
      font-weight: bold;
      text-decoration: none;
    }
    .delete-btn:hover {
      text-decoration: underline;
    }
    a.back {
      display: inline-block;
      margin-top: 20px;
      padding: 8px 15px;
      background: #2ecc71;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    a.back:hover {
      background: #27ae60;
    }
  </style>
</head>
<body>

<h1>Manage Activities</h1>

<form method="post">
  <input type="text" name="title" placeholder="Title" required>
  <textarea name="description" placeholder="Description"></textarea>
  <input type="date" name="date">
  <button type="submit" name="add">Add Activity</button>
</form>

<?php
$result = $conn->query("SELECT * FROM activities ORDER BY date DESC");
while($row = $result->fetch_assoc()) {
    echo "<div class='activity'>";
    echo "<h3>".$row['title']."</h3>";
    echo "<p>".$row['description']."</p>";
    echo "<small>📅 ".$row['date']."</small><br>";
    echo "<a class='delete-btn' href='?delete=".$row['title']."' onclick=\"return confirm('Are you sure you want to delete this activity?');\">🗑 Delete</a>";
    echo "</div>";
}
?>

<a class="back" href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
