<?php
include "connection.php";
// include "login.php";

function check_login($conn){

    if (isset($_SESSION['cust_id'])){   //check if "$_SESSION['just_id']" this value is set or not

        $id = $_SESSION['cust_id'];
        $query = "SELECT * FROM cust_acc WHERE cust_id = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);   //assoc means associative array
            return $user_data;
        }
    }else{
        //if statement false(user_id not there, and not in db), redirect to login
        header("Location: login.php");
        die;
    }
    
}

function random_num($length){
    $text = "";
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) { 
        # code...

        $text .= rand(0,9);
    }

    return $text;
}

function display($conn){     //dunno if this function still works onot
    $query = "select * from test_room";
    $result = mysqli_query($conn, $query);
    $roomdisplay = mysqli_fetch_array($result);
    return $roomdisplay;

}


?>