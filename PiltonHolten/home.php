<?php
session_start();
include("headerBef.php");
    include("connection.php");
    // $roomdisplay = display($con);
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

    <main>
        <section class="header">
            <div class="text-box">
		<h1>Pilton Hotel</h1>
		<br>
		<p>Hello, Welcome to Pilton Hotel</p>
        </div>
        </section>

    <section class="card-flex-container">
            <?php

                $con = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($con, 'piltonhotel');
                
                $query = " select * from room_types";
                $result = mysqli_query($con, $query);

                while($roomdisplay = mysqli_fetch_array($result)){
                ?>            
                <div class="card">
                    <div class="card-img">
                        <?php echo '<img src="data:image;base64,'. base64_encode($roomdisplay['room_pic']) .'" alt="room pic" style="width:100%" >'; ?>
                        <img src="" alt="" style="width:100%">
                    </div>
                    <div class="card-info">
                        <h1><?php echo $roomdisplay['room_type']; ?></h1>
                        <p class="price">RM <?php echo $roomdisplay['price']; ?></p>
                        <p><?php echo $roomdisplay['room_desc'] ?></p>
                    </div>
                    <button><a href="rooms.php?room=<?php echo $roomdisplay['room_type']?>" style="text-decoration: none; color: #e0fff4;">Book Now</a></button>
                </div>            
                <?php
                } ?>
            </section>
    
    </main>


</body>
</html>