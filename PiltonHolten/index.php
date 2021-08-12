<?php
  //session_start();

    include("connection.php");
    include("header.php");
    include("functions.php");
    
    $user_data = check_login($con);
    // $bookdeets = search($con);
	$roomdisplay = display($con);
    $date_now = date('d-m-y');

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pilton Hotel</title>
	<link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <main>

            <section class="header">
            <div class="text-box">
                <h1 style="color: white;">Pilton Hotel</h1>
                <p>Hello, <?php echo $user_data['fname']; ?> <?php echo $user_data['lname']; ?>. Start booking now!</p>  
            </div>
            </section>
                
		<!--This will show the name, email, etc. that is stored in $user_data php variable-->
		
	<!-------------------------------------------------------------------------------------------------------------------------------------------->
	
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
                }

                // if($_SERVER['REQUEST_METHOD'] == "POST"){
                //     //something was posted
                //     $checkin = $_POST['checkin'];
                //     $checkout = $_POST['checkout'];
                //     $paxno = $_POST['pax_no'];
            
                //     if (!($checkin > $date_now or $checkout > $checkin)) {
                //         echo '<script>alert("Please enter a valid date.")</script>';
                //     }else {
                //         $query = " select * from test_room where roomtype_id in (select roomtype_id from room where room_id in (select room_id from booked_room_service where checkin != '$checkin' and checkout != '$checkout'";
                //         $result = mysqli_query($con, $query);

                //         while($roomdis = mysqli_fetch_array($result)){
                //         ?>            
                <!-- //         <div class="card">
                //             <div class="card-img">
                //                 <?php echo '<img src="data:image;base64,'. base64_encode($roomdis['room_pic']) .'" alt="room pic" style="width:100%" >'; ?>
                //                 <img src="" alt="" style="width:100%">
                //             </div>
                //             <div class="card-info">
                //                 <h1><?php echo $roomdis['room_type']; ?></h1>
                //                 <p class="price">RM <?php echo $roomdis['price']; ?></p>
                //                 <p><?php echo $roomdis['room_desc'] ?></p>
                //             </div>
                //             <button type="submit" name="addtocart">Add to Cart</button>
                //         </div>            
                //         <?php 
                //         }
                        
                //     }
                // }?>  -->
                
          
        </section>
	
	</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<footer>
    <h1>Foot.</h1>
</footer>
</html>