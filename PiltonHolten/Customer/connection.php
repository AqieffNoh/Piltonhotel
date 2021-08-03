<?php

$dbhost = "localhost";
$dbuser = "upandrunning";
$dbpass = "super";
$dbname = "up_and_running";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){ // "!" means not, if not connected...

    die("failed to connect.");
}
?>