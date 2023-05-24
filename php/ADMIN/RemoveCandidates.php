<?php
// connect to database
include "connVote.php";


if (isset($_POST['delete_item'])) {
  // Retrieve the ID of the item to be deleted
  $rec_id = mysqli_real_escape_string($conn, $_POST["rec_id_e"]);
  
  // Delete the item from the database
  $sql = "DELETE FROM candidates WHERE Id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $rec_id);
  mysqli_stmt_execute($stmt);

  // Check if the deletion was successful
  if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Redirect the user back to the main page
    header('Location: ./Edit.php');
    exit();
  } else {
    die("Error deleting record: " . mysqli_error($conn));
  }
}

// Close the database connection
$conn->close();
?>