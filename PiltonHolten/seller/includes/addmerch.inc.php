<?php

   include('dbh.inc.php');

$fname = strtotime(date('Y-m-d H:i')).'_'.$_FILES['picture']['name'];
$sql="INSERT INTO merch (s_id, category_ID, merch_name, merch_desc, quantity, price, picture) 
VALUES ('$_POST[sellerID]', '$_POST[cate]', '$_POST[name]', '$_POST[desc]','$_POST[quantity]',  '$_POST[price]', '$fname')";

if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
  if(!empty($_FILES['picture']['tmp_name'])){
  	move_uploaded_file($_FILES['picture']['tmp_name'], '../images/'.$fname);
  }
  header("location: ../managemerch.php");
  echo "1 record added";

 mysqli_close($conn);