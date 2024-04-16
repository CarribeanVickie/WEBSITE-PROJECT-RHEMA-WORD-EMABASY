<?php
session_start();
    
include("db.php");

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['user_username'])) {
    header("Location: Login.php");
    exit();
}

// Retrieve user information from the session
$user_username = $_SESSION['user_username'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styling/style.css">
    <title>SUPER MOTORS LTD- USER PAGE.</title>
</head>
<body>
<style>
.dropbtn {
    margin-right: 10px;
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>


    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">Superior Motors Ltd</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li>
                    <div class="dropdown">
            <button class="dropbtn">MORTOCYCLES</button>
            <div class="dropdown-content">
                <a href="products.php">Purchase One</a>
            </div>
        </div>
        </li>
        <li class="nav-item">
        <div class="dropdown">
            <button class="dropbtn">BIKE PARTS</button>
            <div class="dropdown-content">
                <a href="parts.php">Acquire Parts</a>
            </div>
        </div>
        </li>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="Login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!--Showcase-->
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-2 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                <h2 style="text-align: center;">Welcome to the User Panel,</h2> 
                            <div style="text-align: center; color:antiquewhite;">
                                <img src="img/person-circle.svg" alt="" style="width: 200px; height: 200px;" />
                            </div>   
                            <h6 style="text-align: center;"><?php echo $user_username; ?></h6>
                    <h1>Become a <span class="text-warning">Motorcycle owner</span></h1>
                    <p class="lead my-4">
                        We focus on providing with upto specs Bikes that will last and serve you 4 a 
                        long long time and You can Choose any maintainance service
                    </p>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="img/mortocycle.svg" alt=""/>
            </div>
        </div>
    </section>

    <!--Newsletter-->
    <section class="bg-primary text-light p-5">
        <div class="container">
            <div class="d-md-flex justify-content-between 
            align-items-center">
            <h3 class="mb-3 mb-md-0">Access our products</h3>
            
            <div class="input-group news-input">
                <input 
                type="text" 
                class="form-control" 
                placeholder="Enter Email" 
                />
                <input
                class="btn btn-dark btn-lg" 
                type="submit"
                name=""
                value="submit"
                >
              </div>              

        </div>
        </div>
    </section>

    <!--services-->
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Standard Bikes
                            </h3>
                            <p class="card-text">
                                They are broad motorcycle defined by middle-of-the-road. 
                                They have a upright rider position, a medium seat height, and usually little fairing.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Touring Bike
                            </h3>
                            <p class="card-text">
                                is similar to cruisers with a lower seat and foot pegs positioned farther 
                                forward for more relaxed riding. 
                                There is often a passenger seat with a backrest for maximum comfort.
                            </p>
                            <a href="#" class="btn btn-dark">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Cruise Bike
                            </h3>
                            <p class="card-text">
                                Most riders say they're best suited to medium trips as opposed to long hauls. Still, 
                                many cruisers offer all the comfort and performance you need to take off on an extended adventure.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Offroad Bike
                            </h3>
                            <p class="card-text">
                                specially designed for off-road use. 
                                driving surfaces that are not conventionally paved. 
                                These are rough surfaces, often created naturally, such as sand, gravel, a river, mud or snow.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Sports Bike
                            </h3>
                            <p class="card-text">
                                These motorcycle are mostly designed and optimized for speed, acceleration, braking,#
                                and cornering on asphalt concrete race tracks and roads.Currently best for top speeds.
                            </p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1">
                                <i class="bi bi-badge-cc"></i>
                            </div>
                            <h3 class="card-title mb-3">
                                Dual Purpose Bike
                            </h3>
                            <p class="card-text">
                                type of street-legal motorcycle that is designed for both on and off-road use. 
                                dual-purpose are also used for this class of motorcycles.
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Learn Sections-->
    <section id="learn" class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="img/parts.png" class="img-fluid" alt="">
                </div>
                <div class="col-md p-5">
                    <h2>Access All Parts From Various Types of mortocycles.</h2>
                    <p class="lead">
                        The chassis forms the foundation of any motorcycle and consists of the mainframe, front forks, 
                        rear suspension/swingarm and subframe. Frames can be manufactured from a range of materials including steel, aluminium, 
                        magnesium and even more exotic materials such as carbon fibre and Kevlar.
                    </p>
                    <p>Any motorcycle you ride has an engine, a chassis, a transmission and a set of wheels. 
                        By changing the sizes and features of these components, 
                        you can customize your motorcycle to produce different performance and riding results.
                    </p>
                    <a href="" class="btn btn-light mt3">
                        <i class="bi bi-chevron-right"></i> Read More
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    
    <section id="learn" class="p-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p-5">
                    <h2>Bike Services</h2>
                    <p class="lead">
                        Much like other types of vehicle servicing, motorbike services are when a 
                        mechanic or other qualified professional examines your bike to ensure all its 
                        components are working as they should. Services tend to take place at a garage 
                        and last for a couple of hours.
                    </p>
                    <p>Motorcycles: Regular Checks <br>

                        When: Every 5000km. Why: Given the nature of motorcycles, which might be used for longer rides, 
                        a service every 5000km ensures all parts are in optimal condition and any wear and tear is addressed
                    </p>
                </div>
                <div class="col-md">
                    <img src="img/service.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>

    <!--Question Accordion-->
    <section id="question" class="p-5">
        <h2 class="text-center mb-4">
            Frequently Asked Questions
        </h2>
        <div class="accordion accordion-flush" 
        id="Questions">

            <!--Item 1-->
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button 
                class="accordion-button collapsed" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#question-one"
                >
                  Where exactly are you located?
                </button>
              </h2>
              <div id="question-one" 
              class="accordion-collapse collapse" 
              data-bs-parent="#Questions">
                <div class="accordion-body">
                    Lumumba Drive, Roysambu, Nairobi, Kenya.
                </div>
              </div>
            </div>

            <!--Item 2-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button 
                  class="accordion-button collapsed" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#question-two"
                  >
                    How much does it cost for a Bike?
                  </button>
                </h2>
                <div id="question-two" 
                class="accordion-collapse collapse" 
                data-bs-parent="#Questions">
                  <div class="accordion-body">
                    Visit Us @ any of our outpost and there the price will be negotiated but the set price will be provided after signing up and logging in.
                  </div>
                </div>
            </div>

            <!--Item 3-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button 
                  class="accordion-button collapsed" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#question-three"
                  >
                    What do I need to Know?
                  </button>
                </h2>
                <div id="question-three" 
                class="accordion-collapse collapse" 
                data-bs-parent="#Questions">
                  <div class="accordion-body">
                  Nothing much for a brochure will be provided for for you with all the detals and nformation you require so as
                      to choos ur package.
                  </div>
                </div>
            </div>

            <!--Item 4-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button 
                  class="accordion-button collapsed" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#question-four"
                  >
                    How do I sign Up?
                  </button>
                </h2>
                <div id="question-four" 
                class="accordion-collapse collapse" 
                data-bs-parent="#Questions">
                  <div class="accordion-body">
                    Sign Up through the link on the Navigation Bar Above.
                  </div>
                </div>
            </div>

            <!--Item 5-->
            <div class="accordion-item">
                <h2 class="accordion-header">
                  <button 
                  class="accordion-button collapsed" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#question-five"
                  >
                    Do you Provide Custom Bike?
                  </button>
                </h2>
                <div id="question-five" 
                class="accordion-collapse collapse" 
                data-bs-parent="#Questions">
                  <div class="accordion-body">
                      No we do not currently provide custom bikes but you can come to us so that we may request
                      for you from the company at Our Prices.
                  </div>
                </div>
            </div>
        </div>
    </section>

    <section id="instructors" class="p-5 bg-primary">
        <div class="container">
            <div class="text-center text-white">Our Sales People</div>
            <div class="lead text-center text-white mb-5">
                <p>Our SalesPeople all have are trust worthy and can provide services in each of our centers.             
                </p>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/men/11.jpg" class="rounded-circle mb-3" alt=""
                                />
                                <h3 class="card-title mb-3">John Doe</h3>
                                <div class="card-text">Currently has 6yrs experience at our centers. Located at Thika town.</div>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/women/11.jpg" class="rounded-circle mb-3" alt=""
                                />
                                <h3 class="card-title mb-3">Jane Doe</h3>
                                <div class="card-text">Currently has 4yrs experience at our centers. Located at New York, USA.</div>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/men/12.jpg" class="rounded-circle mb-3" alt=""
                                />
                                <h3 class="card-title mb-3">Steve Smith</h3>
                                <div class="card-text">Currently has 8yrs experience at our centers. Located at our Headquaters in Nairobi.</div>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" class="rounded-circle mb-3" alt=""
                                />
                                <h3 class="card-title mb-3">Sara Smith</h3>
                                <div class="card-text">Currently has 7 yrs experience at our centers. Located at Dallas, Texas.</div>
                                <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Conatcts & Map-->
    <section class="p-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-center mb-4">Contact Info</h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">Main Location:</span> Lumumba Drive, Roysambu, Nairobi, Kenya
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Center Phone:</span>(011)265-5565
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Alternate Phone:</span>(010)043-2180
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Center Email:</span>debbiemotorsltd@gmail.com
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Alternate Email:</span>ichguvictor@gmail.com
                        </li>
                    </ul>
                </div>
                <div class="col-md">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d3988.9355441702687!2d36.89831475465547!3d-1.205297842914549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d-1.2052125!2d36.8982831!4m3!3m2!1d-1.2052232!2d36.898304599999996!5e0!3m2!1sen!2ske!4v1705493366806!5m2!1sen!2ske" width="400" height="300" style="border:0;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Footer-->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">
                Copyright &copy; 2021 Frontend Bootcamp
            </p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>