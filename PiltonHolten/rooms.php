<?php
session_start();

    include("connection.php");
    include("functions.php");
    include("header.php");

    $user_data = check_login($conn);
    // $bookdeets = search($con);
	$roomdisplay = display($conn);
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
    
<?php

    $conn = mysqli_connect("localhost", "upandrunning", "super");
    $db = mysqli_select_db($conn, 'up_and_running');

if(isset($_GET['room'])){

    $room = $_GET['room'];


    $query = "SELECT room_type, test_room.roomtype_id, room_desc, pax_no, price, room_pic FROM test_room INNER JOIN room ON room.roomtype_id = test_room.roomtype_id WHERE room_type = '$room' LIMIT 1";
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
        <button><a href="rooms.php?room=<?php echo $roomdisplay['roomtype_id']; ?>" style="text-decoration: none;"></a>Book Now</button>
    </div>            
    <?php
    }
}?>
<form class="form-inline" method="POST" action="index.php">
            <div class="search-date boxing">            
                <label for="checkin">
                    <p class="d-inline">Check In
                        <input type="date" id="checkin" name="checkin"> 
                    </p>
                </label>
            </div>
            <div class="search-date boxing">
                <label for="checkout">
                    <p class="d-inline">Check Out
                        <input type="date" id="checkout" name="checkout"> 
                    </p>
                </label>
            </div>
            <div class="col-md-3 boxing">
                <label for="pax_no">                   
                    <p class="d-inline">Travellers 
                        <input id="pax_no" name="pax_no" type="number" placeholder="Pax No." min="1" >
                    </p>
                </label>
            </div>
            <button type="submit">Search</button>
        </form>




<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  
</div>
</body>
<footer>
    <h1 style=" font: size 1000px; weight 700px">Foot.</h1>
</footer>
</html>