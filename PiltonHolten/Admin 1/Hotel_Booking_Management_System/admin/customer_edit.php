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
            <h6 class="m-0 font-weight-bold text-primary">Edit Customer</h6>
        </div>
    
        <div class="card-body">

        <?php

            $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

            if(isset($_POST['editbtn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM customer WHERE CustID='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                ?>
                    <form action="customercode.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['CustID'] ?>">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" value="<?php echo $row['fname'] ?>" class="form-control" placeholder="Enter First Name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" value="<?php echo $row['lname'] ?>" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" value="<?php echo $row['email'] ?>" placeholder="Enter E-mail" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="PhoneNo" class="form-control" value="<?php echo $row['phone'] ?>" placeholder="Enter Phone Number" pattern="[0-9]{10}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" value="<?php echo $row['password'] ?>" placeholder="Enter Password" required>
                        </div>
                        <br>
                    <div style="float: right;">
                            <a href="index.php?page=customer" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update Customer</button>
                    </div>
                    </form>
                    <?php
                }

            }
                    ?>

        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>