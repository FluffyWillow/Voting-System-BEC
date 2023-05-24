<?php
// Establish database connection
include "connVote.php";

if (isset($_POST['update_item'])) {
  // Retrieve the updated item data
  $Id = $_POST["Id"];
  $name = mysqli_real_escape_string($conn, $_POST['Name']);
  $Pos = mysqli_real_escape_string($conn, $_POST['Position']);
  $Sec = mysqli_real_escape_string($conn, $_POST['Section']);
  $Strand = mysqli_real_escape_string($conn, $_POST['Strand']);
  
  // Update the item data in the database
  $sql = "UPDATE records SET Student_Name='$name', Grade_Section='$Pos', Infraction='$Sec', Reason='$Strand' WHERE Rec_ID='$Id'";
  mysqli_query($conn, $sql);
  
  // Redirect the user back to the main page
  header('Location: ./Edit.php');
  exit;
}
?>
