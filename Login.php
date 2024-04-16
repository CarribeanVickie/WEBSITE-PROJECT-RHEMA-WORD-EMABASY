<?php
session_start();

include("db.php");
include("db2.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Username = $_POST['Username'];
    $Password = $_POST['pass'];

    if (!empty($Username) && !empty($Password) && !is_numeric($Username)) {
        $query = "SELECT * FROM Admindetails WHERE Username = '$Username' LIMIT 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['pass'] == $Password) {
                // Check if the user has admin privileges
                if ($user_data['Admin'] == 1) {
                    $_SESSION['admin_username'] = $Username;
                    header("location: AdminPage.php");
                    die;
                } else {
                    $_SESSION['user_username'] = $Username;
                    // Redirect to a non-admin page or show an error message
                    header("location: index.php");
                    echo "<script type='text/javascript'> alert('Not an Admin Ask admin to give you priviledges.')</script> ";
                    die;
                }
            }
        }

        // Display error message if credentials are incorrect
        echo "<script type='text/javascript'> alert('Wrong Username or Password')</script> ";
        header("location: Login.php");
    } else {
        // Display error message if fields are empty or email is numeric
        echo "<script type='text/javascript'> alert('Wrong Username or Password')</script> ";
        header("location: Login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Styling/login.css">
    <title>Login Page-RHEMA WORD EMBASSY CHURCH</title>
</head>
<body>
</head>
<body>

  <video id="video-background" autoplay muted loop>
    <source src="img/background-video.mp4" type="video/mp4">
  </video>
    
    <div class="wrapper" >
        <div class="form-wrapper sign-in">
            <form method="POST">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="Username" required>
                    <label>Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox">Remember me</label>
                </div>
                <input type="submit" name="" value="Sign In">
                <div class="signup-link">
                    <p>Don't have an account? <a href="#" class="signUpBtn-link">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="form-wrapper sign-up">
            <form method="POST">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="Username" required>
                    <label>Username</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label style="left: 20px;">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="pass" required>
                    <label>Password</label>
                </div>
                <div class="remember">
                    <label><input type="checkbox">I agree 
                        to the terms & conditions.</label>
                </div>
                <input type="submit" name="" value="Sign Up">
                <div class="signup-link">
                    <p>Already have an account? <a href="#" 
                        class="signInBtn-link">Sign In</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>