<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pilton Hotel Management System</title>
 	

<?php
	session_start();
  if(!isset($_SESSION['login_id']))
    header('location:login.php');
 include('./header.php'); 
 // include('./auth.php'); 
 ?>

</head>
<style>
	body{
        background: #80808045;
  }
</style>

<body>
	<?php include 'topbar.php' ?>
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>

<div class="container-fluid" style="padding-top:70px;">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Booking</h6>
        </div>
    
        <div class="card-body">
            <form action="bookingcode.php" method="post">
                <input type="hidden" name="paymentid" class="form-control" value="1">
                <div class="form-group">
                    <label>Customer ID</label>
                    <input type="number" name="custid" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Check In</label>
                    <input type="date" name="checkin" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Check Out</label>
                    <input type="date" name="checkout" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Room ID</label>
                    <input type="number" name="roomid" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Room Type</label>
                    <input type="number" name="roomtype" class="form-control">
                </div>
                <br>
                <div class="form-group">
                <label>Price</label>
                    <input type="number" name="price" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Total Price</label>
                    <input type="number" name="totalprice" class="form-control">
                </div>
                <br>
            <div style="float: right;">
                    <a href="bookings.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="addbtn" class="btn btn-primary">Add Booking</button>
            </div>
            </form>
            
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>