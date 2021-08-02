<?php 
  include "dbh.inc.php";

 if (isset($_POST['save_profile'])) {
    // for the database
    $s_id = stripslashes($_POST['sellerID']);
    $profileImageName = strtotime(date('Y-m-d H:i')).'_'.$_FILES['profileImage']['name'];

    $sql="UPDATE seller_acc SET profilePic= '$profileImageName' WHERE s_id='$s_id'";

    if (!mysqli_query($conn,$sql))
    {
    die('Error: ' . mysqli_error($conn));
    header("location: ../sellerprofile.php?error=failed");
    }
    if(!empty($_FILES['profileImage']['tmp_name'])){
      move_uploaded_file($_FILES['profileImage']['tmp_name'], '../images/'.$profileImageName);
    }
    header("location: ../sellerprofile.php?profile=Uploaded");
    echo "1 record added";
  
   mysqli_close($conn);




    // For image upload
    // $target_dir = "images/";
    // $target_file = $target_dir . basename($profileImageName);

    // VALIDATION
    // validate image size. Size is calculated in Bytes
    // if($_FILES['profileImage']['size'] > 200000) {
    //   $msg = "Image size should not be greated than 200Kb";
    //   $msg_class = "alert-danger";
    // }
    // // check if file exists
    // if(file_exists($target_file)) {
    //   $msg = "File already exists";
    //   $msg_class = "alert-danger";
    // }
    // // Upload image only if no errors
    // if (empty($error)) {
      // if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        // $sql = "INSERT INTO seller_acc (profilePic) VALUES ('$profileImageName') WHERE s_id='$s_id'";

        // if(mysqli_query($conn, $sql)){
        //   header ("Location: ../sellerprofile.php?profile=Uploaded");
        //   // $msg = "Image uploaded and saved in the Database";
        //   // $msg_class = "alert-success";
        // } 
        // else {
        //   header ("Location: ../sellerprofile.php?error=datafailed");
        //   $error = "There was an error connecting the database";
        // $msg = "alert-danger";
        // }
      //  } else {
      //   header ("Location: ../sellerprofile.php?error=uploadfailed");
      //   $error = "There was an error uploading the file";
      //   $msg = "alert-danger";
      // }
    }
  // }

