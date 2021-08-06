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
            <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
        </div>
    
        <div class="card-body">
            <form action="customercode.php" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                </div>
                <br>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="Enter Last name">
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="Email" class="form-control" placeholder="Enter E-mail">
                </div>
                <br>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="PhoneNo" class="form-control" placeholder="Enter Phone Number">
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="Password" class="form-control" placeholder="Enter Password">
                </div>
                <br>
            <div style="float: right;">
                    <a href="index.php?page=customer" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="addbtn" class="btn btn-primary">Add Customer</button>
            </div>
            </form>
            
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>