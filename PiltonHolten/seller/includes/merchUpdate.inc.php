<?php
include 'dbh.inc.php';

if (isset($_POST['updateMerch'])){
$id=$_POST['ID'];


$merchname=$_POST['name'];
$price   =$_POST['price'];
$quantity   =$_POST['quantity'];
$cate     =$_POST['cname'];
$desc   =$_POST['desc'];
$picture =$_FILES['picture']['name'];
$fname = strtotime(date('Y-m-d H:i')).'_'.$picture;

$query="UPDATE merch SET category_id ='$cate', merch_name ='$merchname', merch_desc='$desc' ,price ='$price' , quantity='$quantity' ,Picture='$fname'  WHERE merch_id =$id";
$rows=mysqli_query($conn,$query);
echo "successfully updated ".$rows;
 if(!empty($_FILES['picture']['tmp_name'])){
  	move_uploaded_file($_FILES['picture']['tmp_name'], '../images/'.$fname);
  }
mysqli_close($conn);

header("location: ../managemerch.php?msg=succesfullupdateonerecord");
exit();
}



