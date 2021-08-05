<?php

include "dbh.inc.php";

if (isset($_POST['updateStatus'])) {
    $number = $_POST['no'];

    $status =$_POST['status'];

    $sql = mysqli_query($conn, "UPDATE merch_order SET status='$status' WHERE m_order_no='$number'");



mysqli_close($conn);

header("location: ../merchorder.php?stat=succesfull");
exit();
}
