<?php
include "connVote.php";

// get the post records
$Voter_Name = $_POST['Name'];
$Voter_Section = $_POST['Section'];
$Pres = $_POST['president'];
$VP = $_POST['vice-president'];
$Secretary = $_POST['Secretary'];
$Treasurer = $_POST['Treasurer'];
$Auditor = $_POST['Auditor'];
$PIO = $_POST['PIO'];
$PO1 = $_POST['PO1'];
$PO2 = $_POST['PO2'];
$Repre1 = $_POST['Representative1'];
$Repre2 = $_POST['Representative2'];

// database insert SQL code
$sql = "INSERT INTO `votes` (`Voter_Name`, `Voter_Section`, `candidate`, `position`) VALUES ('$Voter_Name', '$Voter_Section', '$Pres', 'President'), ('$Voter_Name', '$Voter_Section', '$VP', 'Vice President'), ('$Voter_Name', '$Voter_Section', '$Secretary', 'Secretary'), ('$Voter_Name', '$Voter_Section', '$Treasurer', 'Treasurer'), ('$Voter_Name', '$Voter_Section', '$Auditor', 'Auditor'), ('$Voter_Name', '$Voter_Section', '$PIO', 'PIO'), ('$Voter_Name', '$Voter_Section', '$PO1', 'PO'), ('$Voter_Name', '$Voter_Section', '$PO2', 'PO'), ('$Voter_Name', '$Voter_Section', '$Repre1', 'Representative'), ('$Voter_Name', '$Voter_Section', '$Repre2', 'Representative')";

// insert in database 
$rs = mysqli_query($conn, $sql);

if($rs)
{

    //redirect to homepage
    header('Location: ../../../../Voting_System/html/STUDENT/home.html');
    echo '<script type="text/javascript">
        alert("Added Successfully");
    </script>';
    exit;
    
}


?>