<?php
session_start();

$user_data = check_login($con);
include("connection.php");
include("functions.php");
include("header");
$date_now = date('d-m-y');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Check Out</title>
</head>
<body>

<?php

    function dateDifference($checkin , $checkout , $differenceFormat = '%a' )
    {
      
        $days = date_diff($checkin, $checkout);
      
        return $days->format($differenceFormat);
      
    }

    $conn = mysqli_connect("localhost", "upandrunning", "super");
    $db = mysqli_select_db($conn, 'up_and_running');
    

  // if($_SERVER['REQUEST_METHOD'] == "POST"){
      //something was posted
      $card_name = $_POST['card_name'];
      $card_no = $_POST['card_no'];
      $exp_month = $_POST['exp_month'];
      $exp_year = $_POST['exp_year'];
      $cvv = $_POST['cvv'];
      $pay_date = $_POST['pay_date'];
      $payment_id = $_POST['payment_id']

    if(isset($_POST['book-checkout'])){
      
      $checkroomtype_id = $_POST['roomtype_id']
      $checkroom_id = $_POST['room_id'];
      $checkin = $_POST['checkin'];
      $checkout = $_POST['checkout'];
      $pax_no = $_POST['pax_no'];
      $price = $_POST['price'];
      $total_price = $price * $days;

      // $roomdeets = $_GET['roomdeets'];

      $query1 = "INSERT into booked_room_service (cust_id, room_id, roomtype_id, checkin, checkout, days_stayed, price, total_price, payment_id) values ('$just_id', '$checkroom_id', '$checkroomtype_id', '$checkin', '$checkout', /*DATEDIFF(day,'$checkin','$checkout')*/ '$days', '$price', '$total_price' '$payment_id')";      	

      //UPDATE `booked_room_service` SET `total_price`=(SELECT `days_stayed`*`price` as `total_price`) WHERE `booked_id`=2

      $query = "INSERT into payments (card_no, card_name, exp_date, payment_date) values ('$card_no', '$card_name', '$exp_year', '$date_now')";

    	mysqli_query($con, $query1);
      mysqli_query($con, $query);

      header("Location: index.php");
    }
//  }

    ?>

<div class="row-checkout">
    <div class="col-75">
        <div class="container">
            <form action="/action_page.php" method="POST">
                <div class="row">                    
                    <div class="col-50">
                      <h3>Payment</h3>
                      <label for="payment_id">Merch order no</label>
                      <input type="text" id="payment_id" name="payment_id" value="<?php echo rand(10000,50000);?>" readonly>
                      <input type="text" name="pay_date" style="color:#a8a6b1; display:none;" value="<?php echo $date_now?>"></input>
                      <label for="card_name">Name on Card</label>
                      <input type="text" id="cname" name="card_name" placeholder="John More Doe">
                      <label for="card_no">Credit card number</label>
                      <input type="text" id="ccnum" name="card_no" placeholder="1111-2222-3333-4444">
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="exp_month" placeholder="September">

                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="exp_year" placeholder="2018">
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
</html>