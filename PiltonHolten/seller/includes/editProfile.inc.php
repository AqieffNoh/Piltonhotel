<?php
include 'dbh.inc.php';

if (isset($_POST['editProfile'])){
$s_id=$_POST['sellerID'];

$birthdate = $_POST['birthdate'];
$phoneNo = $_POST['phoneNo'];
$address = $_POST['address'];
$desc = $_POST['desc'];


$query="UPDATE seller_acc SET s_birthdate='$birthdate', s_phone='$phoneNo', s_address='$address', s_description='$desc'  WHERE s_id ='$s_id'";

$rows=mysqli_query($conn,$query)or die(mysqli_error($conn));

?>

<script type="text/javascript">
            alert("Update Successfull.");
            window.location = "../sellerprofile.php";
</script>

<?php
// header("location: ../sellerprofile.php?msg=profileEdited");
// exit();

mysqli_close($conn);
}
?>



