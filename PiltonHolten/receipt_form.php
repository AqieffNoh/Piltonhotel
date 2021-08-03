<?php
$dbhost = "localhost";
$dbuser = "upandrunning";
$dbpass = "super";
$dbname = "up_and_running";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){ // "!" means not, if not connected...

    die("failed to connect.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Generator</title>
</head>
<body>
    Select Receipt:
    <form method="get" action="receipt_db">
        <select name="receipt_id" id="receipt_id">

        
        </select>

    </form>
</body>
</html>