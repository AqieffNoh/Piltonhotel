<?php
    session_start();
    include ("includes/dbh.inc.php")
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Seller landing Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" >
        <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
    </head>

    <body>

    <header>
        <section class="topmenu">
        <nav>

            <a href="index.php"><img name="logo" src="images/s_logo.png"></a>
            <div class="nav-links">
            <ul>
                <!-- <li><a href="">HOME</a></li> -->
                <li><a href="managemerch.php">MANAGE MERCHANDISE</a></li>
                <li><a href="merchorder.php">ORDER</a></li>
                <li><a href="report.php">REPORT</a></li>
                <!-- <li><a href="merchpage.php">MERCHANDISE</a></li> -->
            </ul>
        </div>


<!-- pop up for the user icon -->
        <div class="user-dd" >
            <button class="userdropdown"><i class="fas fa-user"></i></button>

            <div class="user-dropdown-con">
                <!-- <p> Welcome! </p> -->
                <a href="sellerprofile.php">Profile</a>
                <a href="includes/s_logout.inc.php">Log out</a>
            

            </div>
        </div>
</section>

<section class="header">


    </header>