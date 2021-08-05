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
            <h4 class="m-0 font-weight-bold text-primary">Payment
            </h4>
        </div>
    
        <div class="card-body">
            <div class="table-responsive">

            <?php
                if(isset($_POST['viewbtn'])){
                    
                    $id = $_POST['view_id'];

                    //retrieve data from database
                    $connection = mysqli_connect("localhost", "root", "", "piltonhotel") or die(mysqli_error($connection));

                    $query = "SELECT * FROM payments where PaymentID ='$id'";
                    $query_run = mysqli_query($connection, $query);

                }

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 50%;"></th>
                            <th style="width: 50%;">Information</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($query_run as $row)
                    {

                    ?>
                    <tbody>
                        <tr>
                        <td>Payment ID</td>
                        <td><?php echo $row['PaymentID']; ?></td>
                        </tr>       
                        <tr>
                        <td>Name</td>
                        <td><?php echo $row['Name']; ?></td>
                        </tr>  
                        <tr>
                        <td>Pay Date</td>
                        <td><?php echo $row['PayDate']; ?></td>
                        </tr>  
                        <tr>
                        <td>Card</td>
                        <td><?php echo $row['Card Number']; ?></td>
                        </tr>  
                        <tr>
                        <td>Amount Paid</td>
                        <td><?php echo $row['PaymentID']; ?></td>
                        </tr> 
                        <?php
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>