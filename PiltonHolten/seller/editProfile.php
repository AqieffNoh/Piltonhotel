<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="sellerprofile.css" >
    <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>

    <style>
        input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.profilehaedit {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
}

button {
  background-color: #04AA6D;
  color: white;
  border-radius: 10px;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
    </style>
</head>

<body>

<section class="topmenu">
    <nav>
        <a href="index.php"><img name="logo" src="images/s_logo.png"></a>
        <div class="nav-links">
            <ul>
                <!-- <li><a href="">HOME</a></li> -->
                <li><a href="managemerch.php">MANAGE MERCHANDISE</a></li>
                <li><a href="merchorder.php">ORDER</a></li>
                <li><a href="merchreport.php">REPORT</a></li>
                <!-- <li><a href="merchpage.php">MERCHANDISE</a></li> -->
            </ul>
        </div>


<!-- pop up for the user icon -->
        <div class="user-dd" >
            <button class="userdropdown"><i class="fas fa-user"></i></button>

            <div class="user-dropdown-con">
                <!-- <p> Welcome! </p> -->
                <a href="">Profile</a>
                <a href="includes/s_logout.inc.php">Log out</a>
            

            </div>
        </div>
</section>

<div class="divider">
</div>
	
<section>

<?php
  include 'includes/dbh.inc.php';
  session_start();
    $s_id=$_SESSION['s_id'];
    $query=mysqli_query($conn,"SELECT * FROM seller_acc WHERE s_id='$s_id'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
  ?>

<div class="col-xl-8 order-xl-1">
          <form class="userProfile" action="includes/editProfile.inc.php" method="POST" enctype="multipart/form-data" id="displayProfile">

          <div name="s_ID" style="display: none;">
                <label name="s_ID">seller ID</label>
                <textarea name=sellerID>
                <?php
                    include_once 'includes/dbh.inc.php';
                    $check=$_SESSION["s_id"];
                    $session=mysqli_query($conn, "SELECT s_id FROM seller_acc where s_id='$check' ");
                    while($res= mysqli_fetch_assoc($session))
                    {
                    echo $res['s_id'];
                    }
                ?> 
                </textarea>
          </div>  
          <div class="profilehaedit">
                <div class="col-8">
                  <h1 class="mb-0">My account</h1>
                  <p style="font-style: italic;">*Please note that your username and name are not allow to change</p>
                </div>

           
            <div class="card-body">

              
                <h3 class="heading-small text-muted mb-4">User information</h3>
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $row['s_username']; ?>" readonly required>
                      </div>

                  <div class="row">
                        <label class="form-control-label" for="input-full-name">Full Name</label>
                        <input type="text" id="fullname" name="fullname"class="form-control form-control-alternative" placeholder="First name" value="<?php echo $row['s_name']; ?>" readonly required>
                    </div>

                    <div>
                        <label class="form-control-label" for="input-full-name">Date of Birth</label>
                        <input type="date" id="birthdate" 
                        name="birthdate"class="form-control form-control-alternative" style="width: 50%;" value="<?php echo $row['s_birthdate']; ?>" required>
                    </div>

                </div>

                <!-- Address -->
                <h3 class="heading-small text-muted mb-4">Contact Information</h3>
               
                  
                <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="email" id="email" name="email"class="form-control form-control-alternative" style="width: 50%;" placeholder="123@example.com" value="<?php echo $row['s_email']; ?>" required>
                      </div>

                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Phone Number</label>
                        <input type="phone" id="phoneNo" name="phoneNo"class="form-control form-control-alternative" style="width: 50%;" placeholder="011-12345677" value="<?php echo $row['s_phone']; ?>" required><br>
                      </div>

                      <div class="pl-lg-4">
                        <label class="form-control-label" for="input-address">Full Address</label>
                        <textarea id="address" name="address" class="form-control form-control-alternative" style="width: 50%;" placeholder="Home Address" type="text" required><?php echo $row['s_address'];?></textarea>

                  </div>
                
                <hr class="my-4">
                <!-- Description -->
                <h3 class="heading-small text-muted mb-4">About me</h3>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Description</label>
                    <textarea rows="4" id="desc" name="desc" class="form-control form-control-alternative" style="width: 50%;" placeholder="A few words about you ..." type="text" required><?php echo $row['s_description'];?></textarea>
                  </div>
                </div>
                </div>
                <div class="bottom">
    
                    <td colspan="3">		
                        <button type="submit"  name="editProfile" value="Update" class="editbtn"> <span class="edit-btn-text">Update Profile</span></button>
                    </td>
                                
                <div class="clear"></div>
                </div>
              </form>
              
            </div>
            </div>
</section>

    </body>
</html>