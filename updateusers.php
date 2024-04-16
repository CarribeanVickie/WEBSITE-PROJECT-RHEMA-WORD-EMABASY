<?php

session_start();

include ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $Username = $_POST["Username"];
    $fname = $_POST["update_fname"];
    $lname = $_POST["update_lname"];
    $address = $_POST["update_address"];
    $email = $_POST["update_email"];
    $telno = $_POST["update_telno"];

    // SQL query to update data in the database
    $updateSql = "UPDATE Admindetails SET fname='$fname', lname='$lname', address='$address', email='$email', telno='$telno' WHERE Username='$Username'";

    if ($connection->query($updateSql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styling/style.css">
    <title>Update Users</title>
</head>
<body>


<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">Superior Motors Admins And Users</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="AdminPage.php" class="nav-link">Go Back To Admin Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<div class="container mt-5">
        <h3>Update User</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="Username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="update_Username" name="Username" required>
            </div>
            <div class="mb-3">
                <label for="update_fname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="update_fname" name="update_fname" required>
            </div>
            <div class="mb-3">
                <label for="update_lname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="update_lname" name="update_lname" required>
            </div>
            <div class="mb-3">
                <label for="update_address" class="form-label">Address</label>
                <input type="text" class="form-control" id="update_address" name="update_address" required>
            </div>
            <div class="mb-3">
                <label for="update_email" class="form-label">Email</label>
                <input type="text" class="form-control" id="update_email" name="update_email" required>
            </div>
            <div class="mb-3">
                <label for="update_telno" class="form-label">Phone No</label>
                <input type="text" class="form-control" id="update_telno" name="update_telno" required>
            </div>
            <div class="mb-3">
                <label for="update_pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="update_pass" name="update_pass" required>
            </div>
            

            <!-- Update button -->
            <button type="submit" class="btn btn-warning" name="update">Update</button>
        </form>



</body>
</html>