<?php include("dbh.inc.php");

$delete=$_GET['delete'];
if(empty($delete)){
echo "you don't select any record";

}else{
$query="DELETE FROM merch WHERE merch_id=".$delete."";
$result=mysqli_query($conn,$query);
header("location: ../managemerch.php?msg= 1 merch has been deleted.");
exit();
mysqli_close($conn);
}