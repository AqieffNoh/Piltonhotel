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
            <h6 class="m-0 font-weight-bold text-primary">Edit Add-On</h6>
        </div>
    
        <div class="card-body">
            <?php

                $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

                if(isset($_POST['editbtn']))
                {
                    $id = $_POST['edit_id'];
                
                    $query = "SELECT * FROM add_ons WHERE AddOnID='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row)
                    {
                    ?>  
                        <form action="addoncode.php" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $row['AddOnID'] ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="edit_Name" value="<?php echo $row['Name'] ?>" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="edit_Desc" cols = "40" rows="4" class="form-control" placeholder="Enter Description" required><?php echo $row['Description'] ?></textarea>
                            </div>
                            <div class="form-group">
                            <label>Price</label>
                                <input type="number" name="edit_Price" value="<?php echo $row['Price'] ?>" class="form-control" step=".01" required>
                            </div>
                            <br>
                            <a href="AddOn.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>

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