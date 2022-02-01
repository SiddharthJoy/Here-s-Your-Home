<?php

$username = 'root';
$password = '';
$database = 'hyh2';

// Create connection
$conn = mysqli_connect('localhost', $username, $password, $database);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

?>