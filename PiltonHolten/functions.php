<?php

function check_login($con){

    if (isset($_SESSION['CustID'])){   //check if "$_SESSION['just_id']" this value is set or not

        $id = $_SESSION['CustID'];
        $query = "select * from customer where CustID = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);   //assoc means associative array
            return $user_data;
        }
    }else{
        //if statement false(user_id not there, and not in db), redirect to login
        // echo"you r not login";
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

function display($con){
    $query = "select * from room_types";
    $result = mysqli_query($con, $query);
    $roomdisplay = mysqli_fetch_array($result);
    return $roomdisplay;


// function search($con){
//     $search = "select * from test_room where room_type = '$roomtype' and pax_no = '$pax_no'";
//     $result = mysqli_query($con, $search);
//     if ($result && mysqli_num_rows($result) > 0) {
//         $bookdeets = mysqli_fetch_assoc($result);
//         return $bookdeets;
//     }
}


?>

