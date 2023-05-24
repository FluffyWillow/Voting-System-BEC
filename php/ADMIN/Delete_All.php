<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

include "connVote.php";

// Check if form is submitted
if (isset($_POST['confirm'])) {
    // If user confirms, delete all data in the table
    $sql = "TRUNCATE TABLE candidates";
    if (mysqli_query($conn, $sql)) {
      echo "cleared successfully";
      // Redirect to another page
      header("Location: ../../html/ADMIN/home.html");
      exit();
    } else {
      echo "Error clearing table: " . mysqli_error($conn);
    }
  }
  
  // Close the connection
  mysqli_close($conn);
?>