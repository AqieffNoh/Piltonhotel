<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "piltonhotel";


//connection to the database
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//if the connection failed
if (!$con) {
    die("connection failed:". mysqli_connect_error());
}



?>

