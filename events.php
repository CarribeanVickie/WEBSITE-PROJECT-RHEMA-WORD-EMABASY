<?php
session_start();

include("db.php");

$sql = "SELECT * FROM events";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styling/display.css">
    <title>EVENTS</title>
</head>
<body>
    
<main>
        <?php
        while($row = mysqli_fetch_assoc($result)){

        
        ?>
        <div class="card">
            <div class="image">
                <img src="eventimg/<?php echo $row["EImg"] ?>" alt="">
            </div>
            <div class="caption">
                <p class="product_name"><?php  echo $row["EventName"] ?></p> 
                <p class="product_name"><?php  echo $row["Date"] ?></p> 
                <p class="product_name"><?php  echo $row["Time"] ?></p> 
                <p class="price"><b><?php echo $row["Location"]; ?></b></p>
            </div>
        </div>
        <?php

    }
        ?>
    </main>
</body>
</html>