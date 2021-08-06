<?php


include('dbh.inc.php');

$sql="INSERT INTO payments (m_order_no, card_no, card_name, exp_month, exp_year, payment_date) 
VALUES ('$_POST[orderno]','$_POST[ccnum]', '$_POST[cname]', '$_POST[expmonth]', '$_POST[expyear]','$_POST[date]')";

if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
 
  }
  header("location: \PiltonHotel\Piltonhotel\PiltonHolten\userProfile.php?payment=success");
  echo "1 record added";

 mysqli_close($conn);



