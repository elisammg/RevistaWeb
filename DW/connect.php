<?php
$servername = "localhost";
$username = "root";
$password = "AlexanderLeo22";
$table = "revistadb";

// Create connection
$conn = new mysqli($servername, $username, $password, $table);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>