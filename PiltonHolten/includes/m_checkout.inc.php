<?php

include "dbh.inc.php";

if(isset($_POST['payment'])){

    $m_oderno = $_POST['m_order_no'];
    $name = $_POST['cname'];
    $cardno = $_POST['ccnum'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
}



