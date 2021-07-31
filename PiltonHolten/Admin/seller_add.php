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
            <h6 class="m-0 font-weight-bold text-primary">Add Seller</h6>
        </div>
    
        <div class="card-body">
            <form action="sellercode.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="Name" class="form-control" placeholder="Enter Name">
                </div>
                <br>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="Username" class="form-control" placeholder="Enter Username">
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
                    <label>Business Description</label>
                    <textarea name="Description" cols = "40" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                </div>
                <br>
                <div class="form-group">
                <label>Birth Date</label>
                    <input type="date" name="BirthDate" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="Address" cols = "40" rows="4" class="form-control" placeholder="Enter Adress"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="Password" class="form-control" placeholder="Enter Password">
                </div>
                <br>
                <div class="form-group">
                <label>Register Date</label>
                    <input type="date" name="RegDate" class="form-control">
                </div>
                <br>
            <div style="float: right;">
                    <a href="Sellers.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="addbtn" class="btn btn-primary">Add Seller</button>
            </div>
            </form>
            
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>