<?php
session_start();
    
include("db.php");

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['admin_username'])) {
    header("Location: Login.php");
    exit();
}

// Retrieve user information from the session
$admin_username = $_SESSION['admin_username'];


$query = "SELECT * FROM Admindetails WHERE Username = '$admin_username' LIMIT 1";
$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
} else {
    // Handle the case where admin data is not found
    echo "Error fetching admin data.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission to update admin profile
    $newPassword = $_POST['pass'];
    // Add additional fields as needed

    // Validate and sanitize input as needed

    // Update admin data in the database
    $updateQuery = "UPDATE admin_table SET pass = '$newPassword' WHERE Username = '$admin_username'";
    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Profile updated successfully');</script>";
        // You can redirect to another page or refresh the current page as needed
    } else {
        echo "Error updating profile.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SUPERIOR MOTORS - ADMIN PAGE</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="styling/styles.css" rel="stylesheet" />
        <link href="styling/settings.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">RWEC</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-lg order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        </form>
                        <h5 style="text-align: center;">Personel Settings,</h5> 
                            <div style="text-align: center;">
                                <img src="img/person-circle.svg" alt="" style="width: 100px; height: 100px;" />
                            </div>   
                            <h6 style="text-align: center;"><?php echo $admin_username; ?></h6>
                            <div class="sb-sidenav-menu-heading">HomePage</div>
                            <a class="nav-link" href="AdminPage.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">MOTORS SERVICE</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                MORTOCYCLE
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="products.php">All Motorcycles</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                DEPARTMENTS
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                              u  <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        SALES
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="salesstores.php">Sales Stores</a>
                                            <a class="nav-link" href="salespersons.php">Sales Persons</a>
                                            <a class="nav-link" href="salesmanager.php">Sales Managers</a>
                                            <a class="nav-link" href="serviceengineer.php">Service Engineers</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        ACCOUNTS
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="employees.php">Employees</a>
                                            <a class="nav-link" href="products.php">Products</a>
                                            <a class="nav-link" href="revenues.php">Revenue</a>
                                            <a class="nav-link" href="parts.php">Parts</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">User Account</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Admins
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                            <a class="nav-link" href="allusers.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                All Users
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><b>Logged in as:</b>
                        <?php echo $admin_username; ?>
                        </div>
                        WELCOME!
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">RHEMA WORD EMBASSY CHURCH</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </main>
                <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
                    <div class="container">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                            <div class="container">
        <div class="row" style="text-align: center; width: 1000px; height: 500px;">
            <div class="col-md-4" >
                <!-- Image thumbnail with data-bs-toggle and data-bs-target attributes -->
                <img src="img/person-circle.svg" alt="Image Description" class="img-thumbnail" data-bs-toggle="modal" data-bs-target="#myModal" style="width: 500px; height: 500px;" />
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <label for="PImg">Upload Photo:</label>
                <input type="file" id="PImg" name="PImg" accept="image/*" required>
                            <input type="submit" name="" value="submit">
                    <p>Image details go here...</p>
                    <!-- You can add more content, such as additional images, text, etc. -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>  
                            
                                <h1>RHEMA WORD EMBASSY<span class="text-warning"><br> Profile User</span></h1>
                            </div>
                            <form>
                            <label>User_Name</label>
                            <input type="text" name="Username" value="<?php echo $userData['Username']; ?>" required>
                            <label>First Name</label>
                            <input type="text" name="fname" value="<?php echo $userData['fname']; ?>" required>
                            <label>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $userData['lname']; ?>" required>
                            <label>Address</label>
                            <input type="text" name="address" value="<?php echo $userData['address']; ?>" required>
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $userData['email']; ?>" readonly>
                            <label>Phone Number</label>
                            <input type="text" name="telno" value="<?php echo $userData['telno']; ?>" required>
                            <label>Password</label>
                            <div class="password-input-container">
                                <input type="password" id="passwordInput" name="pass" value="<?php echo $userData['pass']; ?>" required>
                                <span class="toggle-password" onclick="togglePasswordVisibility()">
                                <i id="eyeIcon" class="bi bi-eye"></i>
                                </span>
                            </div>
                            </form>
                        </div>
                    </div>
                </section>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SUPERIOR MOTORS LTD 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
