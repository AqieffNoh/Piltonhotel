<?php

// function emptyInputSignup($name, $birthd, $desc, $email, $phone, $requestdate) {
//     $result;
//     if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($birthd) || empty($requestdate)) {
//         $result = true;
//     }
//         else {
//         $result = false;  
//     }
//     return $result;
// }

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
        else {
        $result = false;  
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM seller_request WHERE s_email=?;";
    //prepare statement
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssiii", $name, $email, $desc, $phone, $birthd, $requestdate);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

        mysqli_stmt_close();

}

function sendrequest($conn, $name, $birthd, $desc, $email, $phone, $requestdate) {
        $sql = "INSERT INTO seller_request (s_name, s_email, request_desc, s_phone, s_birthdate, s_request_date) VALUES (?, ?, ?, ?, ?, ?);";
        //prepare statement
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sissii", $name, $birthd, $desc, $email, $phone, $requestdate);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close();
       
        header("Location: ../register.php?error=none");
}




//     //if not fail, start passing data
//     mysqli_stmt_bind_param($stmt, "s", $email);
//     mysqli_stmt_execute($stmt);

//     $result = mysqli_stmt_get_result($stmt);

//     if (mysqli_fetch_assoc($resultData)) {

//     }
//     else {
//         $result = false;
//         return $result;
//     }
// }


//for seller login

function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;  
    }
    return $result;
}

function loginSeller($conn, $email, $pwd) {
        $sql = "SELECT * FROM seller_acc WHERE s_email=? AND s_password=?;";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $hash = password_hash($pwd, PASSWORD_DEFAULT);
                $checkPwd = password_verify($pwd, $hash);
                if ($checkPwd === false) {
                    header("location: ../index.php?error=loginfailed");
                    exit();
                }
                else if ($pwdCheck === true){
                    session_start();
                    $_SESSION["s_id"] = $row["s_id"];
                    $_SESSION["s_email"] = $row["s_email"];
                    $_SESSION["s_name"] = $row["s_name"];
                    header("Location: ../seller/index.php?login=success");
                    exit();
                }
            }
        }
}