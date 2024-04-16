<?php
    session_start();
    
    include("db.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $EventId = $_POST['EventId'];
        $EventName = $_POST['Eventname'];
        $Date = $_POST['Date'];
        $Time = $_POST['Time'];
        $Location = $_POST['Location'];
        $EventImage = $_POST['EImg'];

        $targetDirectory = "eventimg/";
    $targetFile = $targetDirectory . basename($_FILES["EImg"]["Eventname"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["EImg"]["tmp_Eventname"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["EImg"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["EImg"]["tmp_Eventname"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["EImg"]["Eventname"])). " has been uploaded.";

        }
    }

    if(!empty($EventId) && !empty($EventName) && !is_numeric($EventId))
    {
        $query= "insert into events (EventId, Eventname, Date, Time, Location, EImg) values('$EventId', '$EventName', '$Date', '$Time', '$Location', '$EventImage')";

        mysqli_query($connection, $query);

        echo"<script type='text/javascript'> alert('Successful Registered')</script> ";{
            header("location: AdminPage.php");
        }
    }
    else

    {
        echo"<script type='text/javascript'> alert('Please Enter Valid Info')</script> ";
        {
            header("location: AdminPage.php");
        }
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
    <link rel="stylesheet" href="styling/style1.css">
    <title>EVENTS REGISTER</title>
</head>
<body>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
    <div class="signup" style="text-align: center; height: 715px;">
    <!-- Form to add items -->
        <h1>New Event</h1>
        <form method="POST" >
            <label>Event Id</label>
            <input type="text" name="EventId" required>
            <label>Event Name</label>
            <input type="text" name="Eventname" required>
            <label>Event Date (yyyy-mm-dd) </label>
            <input type="Date" id="datepicker" name="datepicker">
            <label>Event Time (24hr Clock System)</label>
            <input type="text" name="Time" required>
            <label>Location(provide GPS link if possible)</label>
            <input type="text" name="Location" required>
            <label for="EImg">Upload Photo/Poster:</label>
            <input type="file" id="EImg" name="EImg" accept="image/*" required>
            <input type="submit" name="" value="submit">
            <p>Please Fill The Information Correctly <br> <a href="AdminPage.php"><-GO BACK</a></p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yyyy-dd-mm' // Format the date as YYYY-MM-DD
            });
        });
    </script>

</body>
</html>
    