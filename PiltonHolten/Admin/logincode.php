<?php

$connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");


//login query
if(isset($_POST['LoggingInButton']))
{
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$pass' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $username;
        header('location: index.php');
    }
    else 
    {
        $_SESSION['status'] = 'Username / Password is not valid';
        header('location: login.php');
    }
    
    
}


?>