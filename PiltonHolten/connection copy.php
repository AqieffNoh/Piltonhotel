<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "piltonhotel";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){ // "!" means not, if not connected...

    die("failed to connect.");
}
?>