<?php

session_start();

include ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $EventId = $_POST["EventId"];
    $Eventname = $_POST["update_Eventname"];
    $Date = $_POST["update_Date"];
    $Time = $_POST["update_Time"];
    $Location = $_POST["update_Location"];
    $EImg = $_POST["update_EImg"];

    // SQL query to update data in the database
    $updateSql = "UPDATE Admindetails SET Eventname='$Eventname', Date='$Date', Time='$Time', Location='$Location', EImg='$EImg' WHERE EventId='$EventId'";

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
        <h3>Update Event</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="EventId" class="form-label">Event Id</label>
                <input type="text" class="form-control" id="update_EventId" name="EventId" required>
            </div>
            <div class="mb-3">
                <label for="update_Eventname" class="form-label">Event Name</label>
                <input type="text" class="form-control" id="update_Eventname" name="update_Eventname" required>
            </div>
            <div class="mb-3">
                <label for="update_Date" class="form-label">Date (yyyy-mm-dd)</label>
                <input type="text" class="form-control" id="update_Date" name="update_Date" required>
            </div>
            <div class="mb-3">
                <label for="update_Time" class="form-label">Time (24hr format)</label>
                <input type="text" class="form-control" id="update_Time" name="update_Time" required>
            </div>
            <div class="mb-3">
                <label for="update_Location" class="form-label">Location (GPS Link if possible)</label>
                <input type="text" class="form-control" id="update_Location" name="update_Location" required>
            </div>
            <div class="mb-3">
                <label for="update_telno" class="form-label">Event Image</label>
                <input type="file" class="form-control" id="update_EImg" name="update_EImg" accept="image/*" required>
            </div>
            

            <!-- Update button -->
            <button type="submit" class="btn btn-warning" name="update">Update</button>
        </form>



</body>
</html>