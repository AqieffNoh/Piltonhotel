<?php
session_start();

    include("connection.php");
    $roomdisplay = display($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pilton Hotel</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-left">
                <a href="">Pilton</a>
            </div>
            <div class="nav-center">
                <a href="#home">Home</a>
                <a href="">Merchandies</a>
                <a href="#contact">Events</a>
            </div>
            <div class="nav-right">
                <a href="login.php">Log In</a>
                <a href="signin.php">Join Us</a>
            </div>
        </div>
    </header>
    <main>

    
    </main>


</body>
</html>