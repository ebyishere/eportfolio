<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
include("db.php");

// Add New
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $conn->query("INSERT INTO about (name, email, description) VALUES ('$name','$email','$description')");
}

// Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // safe cast to int
    $conn->query("DELETE FROM about WHERE name=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage About</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background: #f9f9f9;
      color: #333;
    }
    h1 {
      color: #444;
      border-bottom: 2px solid #ddd;
      padding-bottom: 5px;
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
      margin: 5px 0 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background: #4CAF50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #45a049;
    }
    .record {
      background: #fff;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 8px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .delete-btn {
      color: red;
      text-decoration: none;
      font-weight: bold;
    }
    .delete-btn:hover {
      text-decoration: underline;
    }
    a.back {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }
    a.back:hover {
      color: #4CAF50;
    }
  </style>
</head>
<body>

<h1>Manage About</h1>

<form method="post">
  <input type="text" name="name" placeholder="Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <textarea name="description" placeholder="Description" required></textarea><br>
  <button type="submit" name="add">Add About</button>
</form>

<hr>

<?php
$result = $conn->query("SELECT * FROM about");
while($row = $result->fetch_assoc()) {
    echo "<div class='record'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>".$row['email']."</p>";
    echo "<small>".$row['description']."</small><br><br>";
    echo "<a class='delete-btn' href='?delete=".$row['name']."' onclick=\"return confirm('Are you sure you want to delete this record?');\">🗑 Delete</a>";
    echo "</div>";
}
?>

<a class="back" href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
