<?php

include "connVote.php";

// Retrieve vote counts for each candidate
// Retrieve data from database
$sql = "SELECT candidate, COUNT(*) as vote_count, position FROM votes GROUP BY candidate, position ORDER BY vote_count DESC";
$result = mysqli_query($conn, $sql);

// Separate candidates by position and vote count
$positions = array(
    "President" => array(),
    "Vice President" => array(),
    "Treasurer" => array(),
    "Secretary" => array(),
    "Auditor" => array(),
    "PIO" => array(),
    "PO" => array(),
    "Representative" => array()
);
// Separate candidates by position
$positions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $position = $row["position"];
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
                    <li><a href="../../html/ADVISER/home.html">Home</a></li>
                </ul>
            </div>
    </nav>

    <!--Add Form-->
    <div class="main">
        <div class="main-container">
        <div class="form-container">
            
            <a href="../../html/ADVISER/home.html">
                <div class="add_btn">
                    <h3 id="btn-add">Back</h3>
                </div></a>
                
            <!-- Display results in table -->
            <table class="candidates">
            <tr>
                <th>Position</th>
                <th>Name</th>
                <th>Vote Count</th>
            </tr>
            <?php
            // Display candidates in an HTML table, with position displayed only once
        foreach ($positions as $position => $candidates) {
            $first_candidate = true;
            foreach ($candidates as $candidate) {
                echo "<tr>";
                if ($first_candidate) {
                    echo "<td rowspan='".count($candidates)."'>$position</td>";
                    $first_candidate = false;
                }
                echo "<td>".$candidate["candidate"]."</td>";
                echo "<td>".$candidate["vote_count"]."</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<?php
// Close connection
mysqli_close($conn);
?>

            </table>
            

            </div>
        </div>
    </div>

    <div class="overlay"></div>

</body>

</html>