<?php
include('dbh.inc.php');

$check=$_SESSION["s_id"];
$session=mysqli_query($conn, "SELECT s_name, s_id FROM seller_acc where s_id='$check' ");
$row=mysqli_fetch_array($session);
$login_session=$row["s_name"];
$_session=$row["s_id"];
if(!isset($login_session))
{
echo "You Failed !!";
//  header('Location: index.php');
}