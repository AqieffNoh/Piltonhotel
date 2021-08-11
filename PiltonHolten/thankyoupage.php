<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="center">
        <h1>Thank you for your bookings.</h1>
        <h1>Pilton Hotel awaits your arrival !!!</h1>
        <a href="index.php">Continue Booking</a>
        <a href="logout.php">Log Out</a>
        </div>
</body>
</html>
<?php
   
    include_once "footer.php";
?>
<style>
    html{
    box-sizing: border-box;
    }

    *, *::before, *::after{
    box-sizing: border-box;
    }

    body{
        margin-top: 270px;
        background-color: #854f3e;
    }
    a{
        text-decoration: none;
        padding: 30px;
        color: #854f3e;
        font-size: 20px;
        
    }
    a:hover{
        text-decoration: double;
    }

    .center{
        background-color: #ebfefa;
        color: #854f3e;
        margin: 0 auto;
        width: 60%;
        border: 5px solid #ebfefa;
        padding: 10PX;
    }

/*---Cornflower
#86c8ee
Black
#181a1d--*/

</style>