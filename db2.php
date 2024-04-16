<?php


if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Username = $_POST['Username'];
        $Email = $_POST['email'];
        $Password = $_POST['pass'];

        if(!empty($Email) && !empty($Password) && !is_numeric($Email))
        {
            $query= "insert into Admindetails (Username, email, pass) values('$Username', '$Email', '$Password')";

            mysqli_query($connection, $query);

            echo"<script type='text/javascript'> alert('Successful Registered')</script> ";{
                header("location: Login.php");
            }
        }
        else

        {
            echo"<script type='text/javascript'> alert('Please Enter Valid Info')</script> ";
            {
                header("location: Login.php");
            }
        }
    }
?>