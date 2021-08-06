<?php
session_start();

    include("connection.php");
    include("functions.php");
    include("header.php");

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
      <div>
        <img src="images\background1.jpg" alt="">
		<h1>Pilton Hotel</h1>
		<br>
		<!--This will show the name, email, etc. that is stored in $user_data php variable-->
		<p>Hello, <?php echo $user_data['fname']; ?> <?php echo $user_data['lname']; ?>. Start booking now!</p>
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
                </div>         
                <br>
                <div id=wrapper>
    <div class="container-fluid">
    <div class="shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary" style="position:center;">Pilton's Activities
            </h4>
        </div>
    
        <div class="card-body">

            <div class="table-responsive">

            <?php
                //retrieve data from database
                $connection = mysqli_connect("localhost", "root", "", "piltonhotel") or die(mysqli_error($connection));

                $query = "SELECT * FROM contents";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 9.5%;">Picture</th>
                            <th style="width: 8%;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //repeat each row of data
                            $target_dir = "Admin 1\Hotel_Booking_Management_System/admin/webimg/";
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                                    ?>
                                <tr>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo "<img src=" . "'" . $target_dir . "/" . $row['Picture'] . "'" . "style='width:150px;height:150px'/>"; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "No Records Found";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
	</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<footer class="sticky-footer bg-white" style="margin:50px;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Pilton Hotel 2001</span>
            </div>
        </div>
    </footer>
</html>