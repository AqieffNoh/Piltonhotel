<?php
session_start();


include("connection.php");
include("functions.php");
// include("header");
$date_now = date('d-m-y');
$user_data = check_login($con);

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

    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, 'piltonhotel');
    
    if(isset($_POST['book-checkout'])){
    
      $checkoutcustid = $_POST['checkoutcust_id'];
      $checkroomtype_id = $_POST['roomtype_id'];
      $checkroom_id = $_POST['room_id'];
      $checkin = $_POST['checkin'];
      $checkout = $_POST['checkout'];
      $pax_no = $_POST['pax_no'];
      $price = $_POST['price'];

      $_SESSION['cookcuid'] = $checkoutcustid;
      $_SESSION['cookrtid'] = $checkroomtype_id;
      $_SESSION['cookcrid'] = $checkroom_id;
      $_SESSION['cookrci'] = $checkin;
      $_SESSION['cookrco'] = $checkout;
      $_SESSION['cookrpn'] = $pax_no;
      $_SESSION['cookpr'] = $price;
      
      $earlier = new DateTime($_POST['checkin']);

      $later = new DateTime($_POST['checkout']);
      
      $abs_diff = $later->diff($earlier)->format("%a");
  
      $totalprice = $price*$abs_diff;
  
      $_SESSION['cooktp'] = $totalprice;

    }   
?>

<div class="row-checkout">
    <div class="col-75">
        <div class="container">
            <form action="checkoutcode.php" method="POST">
                <div class="row">                    
                    <div class="col-50">
                      <h3>Payment Checkout</h3>
                      <p>Your Total price: RM <?php echo $totalprice; ?></p>
                      <label for="payment_id">Insert Your Details</label>
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
              <input name="checkout" type="submit" value="Continue to checkout" class="btn">
            </form>
        </div>
    </div>
</div>
</body>
</html>

