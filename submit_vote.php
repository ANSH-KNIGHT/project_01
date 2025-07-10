<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "poll_db";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get vote
$vote = $_POST['vote'] ?? '';

if (!empty($vote)) {
  $stmt = $conn->prepare("INSERT INTO poll_votes (vote) VALUES (?)");
  if ($stmt) {
    $stmt->bind_param("s", $vote);
    $stmt->execute();
    $stmt->close();
    echo "Thanks for voting!";
  } else {
    echo "Prepare failed: " . $conn->error;
  }
} else {
  echo "No vote selected.";
}

$conn->close();
?>
