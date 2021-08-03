<?php

if(isset($_POST['login_submit'])) {
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    require_once 'dbh.inc.php';
    
    // require_once 'functions.inc.php';

//another
//     if (emptyInputLogin($email, $pwd) !== false) {
//         header("Location: ../index.php?error=emptyinput");
//         exit();
//     }

//     loginSeller($conn, $email, $pwd);
// }
//     else{
//         header("Location: ../index.php");
//         exit();
//     }


    if(empty($email) || empty($pwd)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM seller_acc WHERE s_email=?;";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else {

                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $hash = password_hash($pwd, PASSWORD_DEFAULT);
                        $checkPwd = password_verify($pwd, $hash);
                            if ($checkPwd === false) {
                                header("Location: ../index.php?error=wrongpwd");
                                exit();
                            }
                            else if ($checkPwd === true) {
                                session_start();
                                $_SESSION["s_id"] = $row["s_id"];
                                $_SESSION["s_email"] = $row["s_email"];
                                $_SESSION["s_name"] = $row["s_name"];
                                header("Location: C:\xampp\htdocs\PiltonHotel\Piltonhotel\PiltonHolten\seller\index.php?login=success");
                                exit();
                            }
                            else {
                                header("Location: ../index.php?error=loginfailed");
                                exit();
                            }
                    }
                    else{
                        header("Location: ../index.php?error=nouser");
                         exit();
                    }
            }
    }
}
else {
    header("Location: ../index.php?error=failed");
    exit();
}