<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

include "connVote.php";

// get the post records
$Student_Name = $_POST['Name'];
$Strand = $_POST['Strand'];
$Section = $_POST['Section'];
$Position = $_POST['Position'];

// database insert SQL code
$sql = "INSERT INTO `candidates` (`Name`, `Strand`, `Section`, `Position`) VALUES ('$Student_Name', '$Strand', '$Section', '$Position')";

// insert in database 
$rs = mysqli_query($conn, $sql);

if($rs)
{

    //redirect to homepage
    header('Location: ../../../../Voting_System/html/ADMIN/home.html');
    exit;

    echo '<script type="text/javascript">
	alert("Added Succesfully");
    </script>';
}

?>