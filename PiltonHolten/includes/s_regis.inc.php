<?php
    

//did the user direct in the proper way
if (isset($_POST['s_regis_submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $phone = $_POST['phone'];
    $birthd = $_POST['birthd'];
    $requestdate = $_POST['r_date'];

    require_once 'dbh.inc.php';
    // require_once 'functions.inc.php';



 $sql = "INSERT INTO seller_request(s_name, s_email, request_desc, s_phone, s_birthdate, s_request_date) VALUES ('$name','$email','$desc','$phone','$birthd','$requestdate')";
    if (mysqli_query($conn, $sql)) {
        header ("Location: ../register.php?error=none");
	 } 
     else {
        header ("Location: ../register.php?error=failed");
	 }
	 mysqli_close($conn);

    }
    

    

//     // error handlers
//     // empty field
//     if (empty($name) || empty($uname) || empty($email) || empty($phone) || empty($address) || empty($pwd) || empty($pwd_repeat)) {
//         header("Location: ../register.php?error=emptyfield&name=".$name."&uname=".$uname."&birthd=".$birthd."&desc=".$desc."&add=".$address."&email=".$email."&phone=".$phone);
//         exit();
//     }
//     //both email n username
//     else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
//         header("Location: ../register.php?error=invalidemailuname&name=".$name."&birthd=".$birthd."&desc=".$desc."&add=".$address."&phone=".$phone);
//     }
//     //invalid email
//     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         header("Location: ../register.php?error=invalidemail&name=".$name."&uname=".$uname."&birthd=".$birthd."&desc=".$desc."&add=".$address."&phone=".$phone);
//         exit();
//     }
//     // //incorrect username
//     else if (!preg_match("/^[a-zA-Z0-9]*$/", $uname)) {
//         header("Location: ../register.php?error=invaliduname&name=".$name."&birthd=".$birthd."&desc=".$desc."&add=".$address."&phone=".$phone);
//         exit();
//     }
//     //pwd match or not
//     else if ($pwd !== $pwd_repeat) {
//         header("Location: ../register.php?error=passwordcheck&name=".$name."&uname=".$uname."&birthd=".$birthd."&desc=".$desc."&add=".$address."&email=".$email."&phone=".$phone);
//         exit();
//     }
//     //check whether username be used
//     else {

//         $sql = "SELECT s_username FROM seller_acc WHERE s_username=?";
//         $stmt = mysqli_stmt_init($conn);

//         if(!mysqli_stmt_prepare($stmt, $sql)) {
//             header("Location: ../register.php?error=sqlerror");
//             exit();
//         }
//         else{
//             mysqli_stmt_bind_param($stmt, "s", $uname);
//             mysqli_stmt_execute($stmt);
//             mysqli_stmt_store_result($stmt);
//             $resultCheck = mysqli_stmt_num_rows($stmt);
//             if ($resultCheck > 0){
//                 header("Location: ../register.php?error=usertaken&name=".$name."&birthd=".$birthd."&desc=".$desc."&add=".$address."&email=".$email."&phone=".$phone);
//             }
//             else{
// //update the seller_acc database
//                 $sql = "INSERT INTO seller_acc (s_name, s_username, s_description, s_email, s_phone, s_birthdate, s_address, s_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
//                 $stmt = mysqli_stmt_init($conn);
//                 if (!mysqli_stmt_prepare($stmt, $sql)) {
//                     header("Location: ../register.php?error=sqlerror");
//                     exit();
//                 }
//                 else {
//                     //bcrypt
//                     $hasedPWD = password_hash($pwd, PASSWORD_DEFAULT);

//                     mysqli_stmt_bind_param($stmt, "ssssiiss", $name, $uname, $desc, $email, $phone, $birthd, $address, $hasedPWD);
//                     mysqli_stmt_execute($stmt);
//                     header("Location: ../register.php?register=success");
//                     exit();
//                     }
//                 }
//             }
        
//         }
//         mysqli_stmt_close($stmt);
//         mysqli_close($conn);
//     }






// if (emptyInputSignup($name, $email, $desc, $phone, $birthd, $requestdate) !== false ) {
//     header("Location: ../register.php?error=emptyfield");
//     exit();
// }

// if (invalidEmail($email) !== false ) {
//     header("Location: ../register.php?error=invalidemail");
//     exit();
// }

// if (emailExists($conn, $email) !== false) {
//     header("Location: ../register.php?error=emailexists");
//     exit();
// }

// sendrequest($conn, $name, $birthd, $desc, $email, $phone, $requestdate);
// }
// else {
//     header("Location: ../register.php");
//     exit();
// }