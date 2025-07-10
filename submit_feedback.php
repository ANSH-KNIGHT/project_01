<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "knightshack"; // your DB name

$conn = new mysqli("localhost", "root", "", "poll_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
  echo "Thanks for your feedback!";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
?>
