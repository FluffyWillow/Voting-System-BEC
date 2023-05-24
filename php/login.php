<?php
// connect to database
include "connVote.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
    $username = $_POST["UName"];
    $password = $_POST["Pass"];
  
    // Retrieve user data from database
    $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
    $result = $conn->query($sql);
  
    // Check if user exists in database
    if ($result->num_rows == 1) {
      // Get user type from database
      $row = $result->fetch_assoc();
      $user_type = $row["user_type"];
  
      // Set session variable for user type
      $_SESSION["user_type"] = $user_type;
  
      // Redirect to appropriate page based on user type
      if ($user_type == "1") {
        header("Location: ../html/STUDENT/home.html");
        exit;
      } elseif ($user_type == "2") {
        header("Location: ../html/ADVISER/home.html");
        exit;
      } elseif ($user_type == "3") {
        header("Location: ../html/ADMIN/home.html");
        exit;
      }
    } else {
      // Invalid username or password
      $error_msg = "Invalid username or password.";
    }
  }
  
  // Close connection
  $conn->close();
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
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="../res/BEC Logo.png">

<!-- LOAD ANIMATION -->
  <script>
    window.onload = function() {
      document.body.classList.add('loaded');
    };
</script>

    <title>Login</title>

</head>
<body>



    <nav class="navigation">
        <div class="VS">
            <div class="Logo">
                <img src="../res/BEC Logo.png" alt="Logo">
            </div>
            <div class="title">BEC Voting System</div>
        </div>
            <div class="nav_links">
                <ul>
                    <li><a href="./login.php">Login</a></li>
                </ul>
            </div>
    </nav>

    <div class="main-contaianer">
            
    <div class="login_container">
        <div class="form-container">
            <form action="./login.php" class="form-login" method="POST" name="Login_Form">
                <label for="UName">Username</label>
                <input type="text" name="UName" id="UName" placeholder="Username">
                <label for="Pass">Password</label>
                <input type="password" name="Pass" id="Pass" placeholder="Password">
                <input type="submit" value="Login">
              <?php
              // Display error message if it exists
              if (isset($error_msg)) {
                  echo "<p style='color:#FFD700'>$error_msg</p>";
              }
              ?>
            </form>
        </div>
    </div>

    </div>

    <div class="overlay"></div>

</body>
</html>