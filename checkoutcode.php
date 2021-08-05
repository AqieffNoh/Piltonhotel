<?php
session_start();

include("connection.php");
include("functions.php");

$date_now = date('d-m-y');

// $checkoutcustid = $_SESSION['cookcuid'];
// $checkroomtype_id = $_SESSION['cookrtid'];
// $checkroom_id = $_SESSION['cookcrid'];
// $checkin = $_SESSION['cookrci'];
// $checkout = $_SESSION['cookrco'];
// $pax_no = $_SESSION['cookrpn'];
// $price = $_SESSION['cookpr'];

// echo $checkoutcustid;

if(isset($_POST['checkout'])){    

    $card_name = $_POST['card_name'];
    $card_no = $_POST['card_no'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];
    $pay_date = $_POST['pay_date'];
    $payment_id = $_POST['payment_id'];
    

    // $price = $_POST['price'];
    // $_SESSION['cookpr'] = $price;

    $_SESSION['cookpid'] = $payment_id;
    $totalprice = $_SESSION['cooktp'];

    echo $card_name;

    // $query1 = "INSERT into booked_room_service (cust_id, room_id, roomtype_id, checkin, checkout, price, payment_id) values ('$checkoutcustid', '$checkroom_id', '$checkroomtype_id', '$checkin', '$checkout', '$price', $payment_id)";      	

    $query = "INSERT into payments (payment_id, card_no, card_name, exp_date, payment_date, total_price) values ('$payment_id', '$card_no', '$card_name', '$exp_year', '$date_now', '$totalprice')";
    
    $paymentinsert =  mysqli_query($con, $query);

    // $bookedinsert = mysqli_query($con, $query1);
    
    // if($paymentinsert){
    //     $bookedinsert = mysqli_query($con, $query1);
        
    // }    

    header("Location: aftercheckoutcode.php");

    // if($paymentinsert && $bookedinsert){
    //     echo "Saved.";
    // }else{
    //   echo "not Saved.";
    // }

  }
    
   
?>