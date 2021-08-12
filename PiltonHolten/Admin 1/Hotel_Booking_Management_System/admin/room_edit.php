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


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Room</h6>
        </div>
    
        <div class="card-body">
            <?php

                $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

                if(isset($_POST['editbtn']))
                {
                    $id = $_POST['edit_id'];
                
                    $query = "SELECT * FROM hotel_rooms WHERE room_id='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row)
                    {
                    ?>  
                        <form action="roomcode.php" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Room ID</label>
                                <input type="number" name="roomID" value="<?php echo $row['room_id']; ?>" class="form-control" placeholder="Enter Room ID">
                            </div>
                            <div class="form-group">
                                <label>Room Type</label>
                                <input type="number" name="roomtypeID" value="<?php echo $row['roomtype_id']; ?>" class="form-control" placeholder="Enter Room Type">
                                <h6>Room type is limited to: <br> 3- Queen Deluxe <br> 4-Twin Deluxe<br> 5- Suite <br> 6-Penthouse<br> 7-Twin Single room </h6>
                            </div>
                        </div>
                            <a href="index.php?page=hotelrooms" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update Room</button>
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