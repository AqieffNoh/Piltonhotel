<?php

$serverName ="localhost";
$dBUsername ="root";
$dBPassword ="";
$dBName ="piltonhotel";

//connection to the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

//if the connection failed
if (!$conn) {
    die("connection failed:". mysqli_connect_error());
}