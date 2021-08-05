<?php
session_start();

    include("connection.php");
    include("functions.php");
    include("headerBef.php");
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" type="text/css" href="merchpage.css" >
    <title>Welcome to Pilton Hotel</title>
</head>
    <main>
        

    <section class="header">
    <div class="text-box">
        <h1>Welcome to Pilton Hotel</h1>
        <p>Enjoy your vacation with Pilton<br></p>
        <p>*Please note that you will need to login or sign up before booking.<br></p>
    </div>
</section>
<h1>Featured Rooms</h1>
    <section >
            <?php

                // $conn = mysqli_connect("localhost", "upandrunning", "super");
                // $db = mysqli_select_db($conn, 'up_and_running');
                
                $query = " select * from test_room";
                $result = mysqli_query($conn, $query);

                while($roomdisplay = mysqli_fetch_array($result)){
                ?>            
                <div class="card">
                    <!-- <div class="card-img"> -->
                        <?php echo '<img src="data:image;base64,'. base64_encode($roomdisplay['room_pic']) .'" alt="room pic" style="width:100%" >'; ?>
                        <img src="" alt="" style="width:100%">
                    <!-- </div> -->
                    <!-- <div class="card-info"> -->
                        <h1><?php echo $roomdisplay['room_type']; ?></h1>
                        <p class="price">RM <?php echo $roomdisplay['price']; ?></p>
                        <p><?php echo $roomdisplay['room_desc']; ?></p>
                    <!-- </div> -->
                    <button><a href="login.php" style="text-decoration: none; color: #e0fff4;">Book Now</a></button>
                </div>    
                </section>
                <?php
                }
            
            ?>

    </main>


</body>
</html>