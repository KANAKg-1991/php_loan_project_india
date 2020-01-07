<?php

$servername = "";
$username = "";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn,"database name");

//mysqli_query($conn,"INSERT INTO users (username, password, email)VALUES ('John', 'Doe', 'john@example.com')");


?>
