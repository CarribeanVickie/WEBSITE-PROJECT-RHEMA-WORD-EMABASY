<?php
session_start();

include("db.php");



$sql = "SELECT * FROM Admindetails";
$result = $connection->query($sql);


// Delete Operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $Username = $_POST["Username"];

    // SQL query to delete data from the database
    $deleteSql = "DELETE FROM Admindetails WHERE Username='$Username'";

    if ($connection->query($deleteSql) === TRUE) {
        echo "Record deleted successfully";
        header("location: allusers.php");

    } else {
        echo "Error deleting record: " . $connection->error;
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
    <title>SUPERIOR MOTORS LTD ADMINS AND USERS</title>
</head>
<body class="bg-dark">
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
                    <li class="nav-item">
                        <a href="NewUser.php" class="nav-link">New Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <a href="NewUser.php" class="btn btn-success"><i class="bi bi-plus"></i> Add New User</a>
    </div>
    
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
                        <th>Action</th>
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
                            echo "<td>
                                    <a href='updateusers.php?id={$row["Username"]}' class='btn btn-warning btn-sm'><i class='bi bi-pencil'></i></a>
                                    <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' style='display: inline;'>
                                        <input type='hidden' name='UserId' value='{$row["Username"]}'>
                                        <button type='submit' class='btn btn-danger btn-sm' name='delete'><i class='bi bi-trash'></i></button>
                                    </form>
                                </td>";
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
