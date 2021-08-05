<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "up_and_running";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){ // "!" means not, if not connected...

    die("failed to connect.");
}      

$serverName ="localhost";
$dBUsername ="root";
$dBPassword ="";
$dBName ="seller";

//connection to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

//if the connection failed
if (!$conn) {
    die("connection failed:". mysqli_connect_error());
}
?>