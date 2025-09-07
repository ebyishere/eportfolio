<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include("db.php");

// Add New
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $date = $_POST['date'];
    $conn->query("INSERT INTO qualifications (title, description, date) VALUES ('$title','$desc','$date')");
}

// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM qualifications WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Qualifications</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 30px;
      color: #333;
    }
    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 25px;
    }
    form {
      background: #fff;
      padding: 20px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #bbb;
      border-radius: 6px;
      font-size: 14px;
    }
    button {
      background: #3498db;
      color: #fff;
      border: none;
      padding: 10px 15px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
    }
    button:hover {
      background: #2980b9;
    }
    .card {
      background: #fff;
      padding: 15px;
      margin: 20px auto;
      max-width: 500px;
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
      display: block;
      text-align: center;
      margin: 30px auto;
      width: 200px;
      background: #2ecc71;
      padding: 10px;
      border-radius: 6px;
      color: #fff;
      text-decoration: none;
    }
    a.back:hover {
      background: #27ae60;
    }
  </style>
</head>
<body>

<h1>Manage Qualifications</h1>

<form method="post">
  <input type="text" name="title" placeholder="Qualification Title" required>
  <textarea name="description" placeholder="institution"></textarea>
  <input type="text" name="text" placeholder="year">
  <button type="submit" name="add">➕ Add Qualification</button>
</form>

<?php
$result = $conn->query("SELECT * FROM qualification ORDER BY year DESC");
while($row = $result->fetch_assoc()) {
    echo "<div class='card'>";
    echo "<h3>".$row['qualification_name']."</h3>";
    echo "<p>".$row['institution']."</p>";
    echo "<small>📅 ".$row['year']."</small><br>";
    echo "<a class='delete-btn' href='?delete=".$row['id']."' onclick=\"return confirm('Are you sure you want to delete this qualification?');\">🗑 Delete</a>";
    echo "</div>";
}
?>

<a class="back" href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>

