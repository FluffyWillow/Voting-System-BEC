<?php

// Database configuration
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "voting_sys";

// Create database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>