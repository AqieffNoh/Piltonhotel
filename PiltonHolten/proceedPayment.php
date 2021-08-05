<?php


   include('includes/dbh.inc.php');

$sql="INSERT INTO merch_order (s_id, merch_id, CustID, m_order_no, quantity, amount, date) 
VALUES ('$_POST[s_id]', '$_POST[merch_id]', '$_POST[custid]', '$_POST[m_order_no]', '$_POST[product_qty]','$_POST[totalprice]',  '$_POST[date]')";

if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
 
  }
  header("location: \PiltonHotel\Piltonhotel\PiltonHolten\merchCheckout.php?orderno='$_POST[m_order_no]'");
  echo "1 record added";

 mysqli_close($conn);



