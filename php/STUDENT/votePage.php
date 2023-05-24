<?php
include "connVote.php";

// retrieve data from database
$sql = "SELECT Name, Position FROM candidates ORDER BY Position, Name";
$result = mysqli_query($conn, $sql);

// Group options by position
$options_by_position = array();
while ($row = mysqli_fetch_assoc($result)) {
    $position = $row["Position"];
    if (!isset($options_by_position[$position])) {
        $options_by_position[$position] = array();
    }
    array_push($options_by_position[$position], $row);
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
                    <li><a href="../../html/STUDENT/home.html">Home</a></li>
                </ul>
            </div>
    </nav>

    <!--Add Form-->
    <div class="main">
        <div class="main-container">
        <div class="form-container">
                
                <form action="./addVote.php" class="form-add" method="post" name="AddVote">

                <label for="Name">Name:</label>
                <input type="text" id="Name" placeholder="Your Name" name= "Name" required>

                <label for="Section">Section:</label>
                <input type="text" id="Section" placeholder="Your Section" name="Section" required>
                  
                <div class="form-group">
                    <label for="president">President:</label>
                    <?php
                    // Retrieve options for President from database
                    $sql = "SELECT Name FROM candidates WHERE Position='President' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="president" id="president">
                        <option value="">Select a President</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="vice-president">Vice-President:</label>
                    <?php
                    // Retrieve options for Vice President from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Vice President' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="vice-president" id="vice-president">
                        <option value="">Select a Vice President</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                  

                <div class="form-group">
                    <label for="Secretary">Secretary:</label>
                    <?php
                    // Retrieve options for Secretary from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Secretary' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="Secretary" id="Secretary">
                        <option value="">Select a Secretary</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Treasurer">Treasurer:</label>
                    <?php
                    // Retrieve options for Treasurer from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Treasurer' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="Treasurer" id="Treasurer">
                        <option value="">Select a Treasurer</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                  
                <div class="form-group">
                    <label for="Auditor">Auditor:</label>
                    <?php
                    // Retrieve options for Auditor from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Auditor' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="Auditor" id="Auditor">
                        <option value="">Select a Auditor</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="PIO">PIO:</label>
                    <?php
                    // Retrieve options for PIO from database
                    $sql = "SELECT Name FROM candidates WHERE Position='PIO' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="PIO" id="PIO">
                        <option value="">Select a PIO</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                  
                <div class="form-group">
                    <label for="PO1">PO:</label>
                    <?php
                    // Retrieve options for PO from database
                    $sql = "SELECT Name FROM candidates WHERE Position='PO' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="PO1" id="PO1">
                        <option value="">Select a PO</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="PO2">PO:</label>
                    <?php
                    // Retrieve options for PO from database
                    $sql = "SELECT Name FROM candidates WHERE Position='PO' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="PO2" id="PO2">
                        <option value="">Select a second PO</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                  
                <div class="form-group">
                    <label for="Representative1">Representative:</label>
                    <?php
                    // Retrieve options for Representative from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Representative' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="Representative1" id="Representative1">
                        <option value="">Select a Representative</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Representative2">Representative:</label>
                    <?php
                    // Retrieve options for Representative from database
                    $sql = "SELECT Name FROM candidates WHERE Position='Representative' ORDER BY Name";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <select name="Representative2" id="Representative2">
                        <option value="">Select a second Representative</option>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?= $row['Name'] ?>"><?= $row['Name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                    
                    <div class="add_btn">
                        <input type="submit" value="VOTE!" id="btn-add">
                    </div>

                    <a href="../../html/STUDENT/home.html">
                        <div class="add_btn">
                            <h3 id="btn-add">Back</h3>
                        </div></a>
                    </form>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

</body>

</html>