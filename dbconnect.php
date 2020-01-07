<?php

$servername = "192.168.0.100";
$username = "bhimupil_b";
$password = "KANAKg-1991";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,"bhimupil_B");

//mysqli_query($conn,"INSERT INTO users (username, password, email)VALUES ('John', 'Doe', 'john@example.com')");


?>
