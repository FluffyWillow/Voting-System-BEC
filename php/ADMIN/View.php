<?php
include "connVote.php";

// Retrieve data from database
$sql = "SELECT Name, Position, Section, Strand FROM candidates";
$result = mysqli_query($conn, $sql);

// Separate members by position
$positions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $position = $row["Position"];
    if (!isset($positions[$position])) {
        $positions[$position] = array();
    }
    array_push($positions[$position], $row);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

<!--LINKS-->
    <link rel="stylesheet" href="../../css/links.css">
    <link rel="icon" href="../../res/BEC Logo.png">

<!-- LOAD ANIMATION -->
<script>
    window.onload = function() {
        document.body.classList.add('loaded');
    };
</script>

    <title>ADD</title>

</head>

<body>
    
    <!--Navigation-->
    <nav class="navigation">
        <div class="IMS">
            <div class="Logo">
                <a href="https://bec.edu.ph/"><img src="../../res/BEC Logo.png" alt="BEC Logo"></a>
            </div>
            <div class="title"></div>
        </div>
            <div class="nav_links">
                <ul>
                    <li><a href="../../html/ADMIN/home.html">Home</a></li>
                </ul>
            </div>
    </nav>

    <!--Add Form-->
    <div class="main">
        <div class="main-container">
        <div class="form-container">
            
            <a href="../../html/ADMIN/home.html">
                <div class="add_btn">
                    <h3 id="btn-add">Back</h3>
                </div></a>

            <?php
            // Display members in an HTML table
            echo "<table class='candidates'>";
            echo "<thead><tr><th><h2>Position</h2></th><th><h2>Photo</h2></th><th><h2>Name</h2></th><th><h2>Section</h2></th><th><h2>Strand</h2></th></tr></thead>";
            echo "<tbody>";
            foreach ($positions as $position => $members) {
                echo "<tr><td rowspan='".count($members)."'>$position</td>";
                $first_member = true;
                foreach ($members as $member) {
                    if (!$first_member) {
                        echo "<tr>";
                    }
                    echo "<td><img class='photo' src='../../res/male.jpg' alt='Photo'></td>";
                    echo "<td>".$member["Name"]."</td>";
                    echo "<td>".$member["Section"]."</td>";
                    echo "<td>".$member["Strand"]."</td>";
                    echo "</tr>";
                    $first_member = false;
                }
            }
            echo "</tbody>";
            echo "</table>";

            // Close connection
            mysqli_close($conn);
            ?>

            </div>
        </div>
    </div>

    <div class="overlay"></div>

</body>

</html>