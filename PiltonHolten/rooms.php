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
    <link rel="stylesheet" href="roomstyle.css">
    <link rel="stylesheet" href="styles.css">
    <title>Book Room</title>
</head>
<body>
    
<div class="row">
  <div class="column-left">
  <?php

    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, 'piltonhotel');

    


    if(isset($_GET['room'])){

    $room = $_GET['room'];

    $query = "SELECT room_type, room_types.roomtype_id, hotel_rooms.room_id, room_desc, pax_no, price, room_pic FROM room_types JOIN hotel_rooms ON hotel_rooms.roomtype_id = room_types.roomtype_id WHERE room_type = '$room' LIMIT 1";
    
    $result = mysqli_query($conn, $query);

    while($roomdisplay = mysqli_fetch_array($result)){
    ?>            
    <!-- <div class="card-rooms">
        <div class="card-img"> -->
            <?php echo '<img src="data:image;base64,'. base64_encode($roomdisplay['room_pic']) .'" alt="room pic" style="width:100%" >'; ?>
            <img src="" alt="" style="width:100%">
            
        <!-- </div>
        <div class="card-info">
            <h1><?php echo $roomdisplay['room_type']; ?></h1>
            <p class="price">RM <?php echo $roomdisplay['price']; ?></p>
            <p><?php echo $roomdisplay['room_desc'] ?></p>
        </div>
        <button><a href="rooms.php?room=<?php echo $roomdisplay['roomtype_id']; ?>" style="text-decoration: none;"></a>Book Now</button>
    </div> -->
    </div>            
    
    <div class="column-right">
    <form action="checkout.php" method="POST">
      <div class="container">
        <input type="text" name="checkoutcust_id" style="color:#a8a6b1; display:none;" value="<?php echo $user_data['CustID']?>"></input>
        <input type="text" name="room_id" style="color:#a8a6b1; display:none;" value="<?php echo $roomdisplay['room_id']?>"></input>
        <input type="text" name="roomtype_id" style="color:#a8a6b1; display:none;" value="<?php echo $roomdisplay['roomtype_id']?>"></input>
        <input type="number" name="price" style="color:#a8a6b1; display:none;" value="<?php echo $roomdisplay['price']?>"></input>
        <h1><?php echo $roomdisplay['room_type']; ?></h1>
        <p><?php echo $roomdisplay['room_desc'] ?></p>
        <p class="price">RM <?php echo $roomdisplay['price'];?></p>
        <hr>

        <label for="checkin"><b>Check In Date</b></label>
        <input type="date" id="checkin" name="checkin" required>

        <label for="checkout"><b>Check Out Date</b></label>
        <input type="date" id="checkout" name="checkout" required>

        <label for="pax_no"><b>Number of People</b></label>
        <input type="number" placeholder="1" id="pax_no" name="pax_no" required>
        <hr>
        <!-- <a href="checkout.php style="text-decoration: none;></a> -->
        <button type="submit" class="bookroom" name="book-checkout"><a href="checkout.php style="text-decoration: none;></a>Book Room</button>

        <!-- <button><a href="rooms.php?room=/*<?php echo $roomdisplay['roomtype_id']; ?>" style="text-decoration: none;"></a>Book Now</button> -->
        <!-- <button><a class="btn margin-center" href="#modal" style="text-decoration: none;"></a>Book Now</button> -->
        <!-- <button type="button" onclick="document.getElementById('id01').style.display='block'"></button> -->

      </div>
    </form>
    <?php
    }
}
?>

  <!-- </div>
  <div class="column-right">
    <form class="form-inline" method="POST" action="index.php">
        <div class="search-date boxing">            
            <label for="checkin">
              <p class="d-inline">Check In Date
                <input type="date" id="checkin" name="checkin"> 
              </p>
            </label>
          </div>
        <div class="search-date boxing">
            <label for="checkout">
              <p class="d-inline">Check Out Date
                <input type="date" id="checkout" name="checkout"> 
              </p>
            </label>
          </div>
        <div class="col-md-3 boxing">
            <label for="pax_no">                   
              <p class="d-inline">Number of People 
                <input id="pax_no" name="pax_no" type="number" placeholder="Pax No." min="1" >
              </p>
            </label>
          </div>
        <button type="submit">Book Room</button>
    </form>

  </div> -->

 

</div>
</div>


  

  
</div>
</body>

<footer>
    <h1 style=" font: size 1000px; ">Foot.</h1>
</footer>

</html>