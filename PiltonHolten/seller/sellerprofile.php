<?php
    include_once "header.php";

?>

<main>
<link rel="stylesheet" type="text/css" href="sellerprofile.css" >
<div class="divider">
</div>
	
<section>

<?php
  include 'includes/dbh.inc.php';

    $id=$_SESSION['s_id'];
    $query=mysqli_query($conn,"SELECT * FROM seller_acc WHERE s_id='$id'")or die(mysqli_error());
    $row=mysqli_fetch_array($query);
  ?>

<div class="col-xl-8 order-xl-1">
          
              <!-- profile picture -->
                <div>
                  <label for="profilePic">Profile Picture: </label>
                  <div class=profilePic>
                    <?php
                  if ($row["profilePic"] == NULL) {
                    echo "<img src=' images/profile.png' height='180' width='180'> "; ?>
                    <?php }else if ($row["profilePic"] !== NULL){ ?>
                    <img src="images/<?php echo $row['profilePic']; ?>" width="180" height="180">
                      <?php }else{ ?>
                        <p>not image exits</p>
                        <?php } ?>
                  </div>

                <button id="editPicbtn" title="Click to edit profile picture">Edit Profile Picture</button>

                <div id="myModal" class="modal">
                  <!-- Modal content -->
                  <form class="register active"  action="includes/editProfilePic.inc.php" method="POST" enctype="multipart/form-data" id="myForm">
                  <div class="modal-content">
                  <span class="close">&times;</span>
                
                    <input type='file' onchange="readURL(this);" name="profileImage" id="profileImage"/>
                    <img id="blah" src="#" alt="" />
                  
                    <button type="submit" name="save_profile" class="btn btn-primary btn-block">Save Profile Picture</button>
                  </div>
                </div>
            
          <!-- user profile form -->
          <form class="userProfile" action="" method="POST" enctype="multipart/form-data" id="displayProfile">

          <div name="s_ID" style="display: none;"z>
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

                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                
            <div class="card-body">
                <h3 class="heading-small text-muted mb-4">User information</h3>
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $row['s_username']; ?>" readonly>
                      </div>

                  <div class="row">
                        <label class="form-control-label" for="input-full-name">Full Name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $row['s_name']; ?>" readonly>
                    </div>

                    <div>
                        <label class="form-control-label" for="input-full-name">Date of Birth</label>
                        <input type="date" id="input-birthdate" class="form-control form-control-alternative"  value="<?php echo $row['s_birthdate']; ?>" readonly>
                    </div>

                </div>

                <!-- Address -->
                <h3 class="heading-small text-muted mb-4">Contact Information</h3>
               
                  
                <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="123@example.com" value="<?php echo $row['s_email']; ?>" readonly>
                      </div>

                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Phone Number</label>
                        <input type="phone" id="input-phone" class="form-control form-control-alternative" placeholder="011-12345677" value="<?php echo $row['s_phone']; ?>" readonly>
                      </div>

                      <div class="pl-lg-4">
                        <label class="form-control-label" for="input-address">Full Address</label>
                        <textarea id="input-address" class="form-control form-control-alternative" placeholder="Home Address" type="text" readonly><?php echo $row['s_address'];?></textarea>

                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h3 class="heading-small text-muted mb-4">About me</h3>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Description</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..." type="text" readonly><?php echo $row['s_description'];?></textarea>
                  </div>

                </div>
              </form>
              <a href="editProfile.php" title="Edit your profile">Edit Profile</a>
            </div>
</section>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("editPicbtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

      </main>

<?php
    include_once "footer.php";
?>
