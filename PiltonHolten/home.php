<?php
    // session_start();
    include_once "header.php";
    
    // include("connection.php");
    // include("functions.php");

    // $user_data = check_login($conn);
    // // $bookdeets = search($con);
	// $roomdisplay = display($conn);
    // $date_now = date('d-m-y');
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
        <h1>Welcome to Pilton Hotel</h1>
        <p>Hello, <?php echo $user_data['fname']; ?> <?php echo $user_data['lname']; ?>. Start booking now!</p>		
        <p>Enjoy your vacation with Pilton<br></p>
    </div>
</section>
<div class="rooms-addons"><h1>Rooms and Rates</h1></div>
<section class="card-flex-container">
            <?php

                // $con = mysqli_connect("localhost", "upandrunning", "super");
                // $db = mysqli_select_db($conn, 'up_and_running');
                
                $query = " select * from test_room";
                $result = mysqli_query($conn, $query);

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
                }?>
</section>

<div class="rooms-addons"><h1>Other Services</h1></div>




</main>





</body>
<?php
    include_once "footer.php";
?>

</html>





