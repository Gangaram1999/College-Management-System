<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Create connection
$mysqli = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM tlogin WHERE username = '$username'";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();

      if ($user['password'] == $password) {
          header("location: teacherdashboard.html");
          exit();
      } else {
          echo "<script>alert('Wrong password');</script>";
      }
  } else {
      echo "<script>alert('User not found');</script>";
  }
}

$mysqli->close();



?>
