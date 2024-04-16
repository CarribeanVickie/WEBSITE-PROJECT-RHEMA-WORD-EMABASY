<?php
session_start();

include("db.php");


$adminType = "1";
$sql = "SELECT * FROM Admindetails WHERE Admin = '$adminType'";
$result = $connection->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styling/style.css">
    <title>SUPERIOR MOTORS LTD ADMINS AND USERS</title>
</head>
<body>
    <!-- navbar -->
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
                    <li class="nav-item">
                        <a href="Admin1.php" class="nav-link">ADMIN PRIVILEDGES</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
        
            <h2>ADMINS TABLE</h2>
            <table>
                <thead>
                    <tr>
                        <th>UserId</th>
                        <th>fname</th>
                        <th>lname</th>
                        <th>address</th>
                        <th>email</th>
                        <th>Telno</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["Username"] . "</td>";
                            echo "<td>" . $row["fname"] . "</td>";
                            echo "<td>" . $row["lname"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telno"] . "</td>";
                            echo "<td>" . $row["Admin"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No data available</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </section>


</body>
</html>