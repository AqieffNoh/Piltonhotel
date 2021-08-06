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
            <h6 class="m-0 font-weight-bold text-primary">Edit Bookings</h6>
        </div>
    
        <div class="card-body">

        <?php

            $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

            if(isset($_POST['editbtn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM booked_room_service WHERE booked_id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                ?>
                    <form action="booking_edit.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['booked_id'] ?>">
                        <div class="form-group">
                            <label>Room ID</label>
                            <input type="number" name="roomid" value="<?php echo $row['room_id'] ?>" class="form-control" placeholder="Enter Room ID" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Room Type</label>
                            <input type="number" name="roomtypeid" value="<?php echo $row['roomtype_id'] ?>" class="form-control" placeholder="Enter Room Type ID" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Check In Date</label>
                            <input type="date" name="checkin" class="form-control" value="<?php echo $row['checkin'] ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Check Out Date</label>
                            <input type="date" name="checkout" class="form-control" value="<?php echo $row['checkout'] ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Status</label>
                            <select id="status" name="status">
                                <option value="1">Pending</option>
                                <option value="2">Checked In</option>
                                <option value="3">Check Out</option>
                                <option value="4">Cancelled</option>
                            </select>
                        </div>
                        <br>
                    <div style="float: right;">
                            <a href="index.php?page=bookings" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update Bookings</button>
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

//update bookings query
if(isset($_POST['updatebtn']))
{

    $id = $_POST['edit_id'];
    $roomid = $_POST['roomid'];
    $roomtypeid = $_POST['roomtypeid'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $status = $_POST['status'];

    $query = "UPDATE booked_room_service SET room_id='$roomid', roomtype_id='$roomtypeid', checkin='$checkin', checkout='$checkout', status='$status' WHERE booked_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    
    if ($query_run)
    {
        $_SESSION['Success'] = "Booking updated";
        header('Location: index.php?page=bookings');
    }
    else 
    {
        $_SESSION['Status'] = "Booking not updated";
        header('Location: index.php?page=bookings');
    }

}

?>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>