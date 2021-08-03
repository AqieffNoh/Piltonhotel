<head>
<title>Add Seller</title>
</head>
<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<br>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Seller</h6>
        </div>
    
        <div class="card-body">

        <?php

            $connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");

            if(isset($_POST['editbtn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM seller_acc WHERE s_id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                ?>
                    <form action="sellercode.php" method="post">
                        <input type="hidden" name="edit_id" value="<?php echo $row['s_id'] ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="Name" value="<?php echo $row['s_name'] ?>" class="form-control" placeholder="Enter Name">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="Username" value="<?php echo $row['s_username'] ?>" class="form-control" placeholder="Enter Username">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" value="<?php echo $row['s_email'] ?>" placeholder="Enter E-mail">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="PhoneNo" class="form-control" value="<?php echo $row['s_phone'] ?>" placeholder="Enter Phone Number">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Business Description</label>
                            <textarea name="Description" cols = "40" rows="4" class="form-control" placeholder="Enter Description"><?php echo $row['s_description'] ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                        <label>Birth Date</label>
                            <input type="date" name="BirthDate" value="<?php echo $row['s_birthdate'] ?>" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="Address" cols = "40" rows="4" class="form-control" placeholder="Enter Adress"><?php echo $row['s_address'] ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" value="<?php echo $row['s_password'] ?>" placeholder="Enter Password">
                        </div>
                        <br>
                        <div class="form-group">
                        <label>Register Date</label>
                            <input type="date" name="RegDate" value="<?php echo $row['s_regis_date'] ?>" class="form-control">
                        </div>
                        <br>
                    <div style="float: right;">
                            <a href="Sellers.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update Seller</button>
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