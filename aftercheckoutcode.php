<?php
session_start();

include("connection.php");
include("functions.php");

$date_now = date('d-m-y');


if(isset($_POST['aftercheckout'])){

$checkoutcustid = $_SESSION['cookcuid'];
$checkroomtype_id = $_SESSION['cookrtid'];
$checkroom_id = $_SESSION['cookcrid'];
$checkin = $_SESSION['cookrci'];
$checkout = $_SESSION['cookrco'];
$pax_no = $_SESSION['cookrpn'];
$price = $_SESSION['cookpr'];

$payment_id = $_SESSION['cookpid'];
$totalprice = $_SESSION['cooktp'];

echo $checkoutcustid;

$query1 = "INSERT into booked_room_service (cust_id, room_id, roomtype_id, checkin, checkout, price, total_price, payment_id) values ('$checkoutcustid', '$checkroom_id', '$checkroomtype_id', '$checkin', '$checkout', '$price', '$totalprice', $payment_id)";

$bookedinsert = mysqli_query($con, $query1) or die(mysqli_error($con));

    if($bookedinsert){
    header("Location: index.php");
        
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>
<body>
    <p>Are you sure about this booking?</p>
    <form action="aftercheckoutcode.php" method="POST">
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookcuid']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookrtid']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookcrid']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookrci']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookrco']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookrpn']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookpr']?>"></input>
    <input type="text" name="checkoutcust_id" style=" display:;" value="<?php echo $_SESSION['cookpid']?>"></input>
    <button type="submit" name="aftercheckout">Yes</button>
    <button>No</button>
    </form>
</body>
</html>