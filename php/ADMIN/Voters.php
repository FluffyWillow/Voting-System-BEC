<?php
include "connVote.php";

// SQL query
$sql = "SELECT Voter_Name, Voter_Section,
  MAX(CASE WHEN position = 'President' THEN candidate END) AS President,
  MAX(CASE WHEN position = 'Vice President' THEN candidate END) AS Vice_President,
  MAX(CASE WHEN position = 'Treasurer' THEN candidate END) AS Treasurer,
  MAX(CASE WHEN position = 'Secretary' THEN candidate END) AS Secretary,
  MAX(CASE WHEN position = 'Auditor' THEN candidate END) AS Auditor,
  MAX(CASE WHEN position = 'PIO' THEN candidate END) AS PIO,
  MAX(CASE WHEN position = 'PO' THEN candidate END) AS PO,
  MAX(CASE WHEN position = 'Representative' THEN candidate END) AS Representative
FROM votes
GROUP BY Voter_Name, Voter_Section";

$result = mysqli_query($conn, $sql);

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

                <a href="./ClearVotes.php">
                <div class="add_btn">
                    <h3 id="btn-add">Remove votes</h3>
                </div></a>
                
            <?php
            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // Create a table to display the data
                echo "<table class='candidates'>
                <tr>
                    <th>Voter Name</th>
                    <th>Voter Section</th>
                    <th>President</th>
                    <th>Vice President</th>
                    <th>Treasurer</th>
                    <th>Secretary</th>
                    <th>Auditor</th>
                    <th>PIO</th>
                    <th>PO</th>
                    <th>Representative</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>".$row['Voter_Name']."</td>
                    <td>".$row['Voter_Section']."</td>
                    <td>".$row['President']."</td>
                    <td>".$row['Vice_President']."</td>
                    <td>".$row['Treasurer']."</td>
                    <td>".$row['Secretary']."</td>
                    <td>".$row['Auditor']."</td>
                    <td>".$row['PIO']."</td>
                    <td>".$row['PO']."</td>
                    <td>".$row['Representative']."</td>
                </tr>";
                }

                echo "</table>";
            } else {
                // If there are no results, display a message
                echo "No results found";
            }

            // Close the connection
            mysqli_close($conn);
            ?>

            </div>
        </div>
    </div>

    <div class="overlay"></div>

</body>

</html>