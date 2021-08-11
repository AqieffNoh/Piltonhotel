<?php

if(isset($_POST['login_submit'])) {
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    require_once 'dbh.inc.php';
    
    if(empty($email) || empty($pwd)) {
        header("Location: ../home.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM seller_acc WHERE s_email=? AND s_password=?;";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../home.php?error=sqlerror");
                exit();
            }
            else {

                mysqli_stmt_bind_param($stmt, "ss", $email, $pwd);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $hash = password_hash($pwd, PASSWORD_DEFAULT);
                        $checkPwd = password_verify($pwd, $hash);
                            if (!$checkPwd === true) {
                                header("Location: ../home.php?error=wrongpwd");
                                // die();
                                exit();
                            }
                            else if ($checkPwd === true) {
                                session_start();
                                $_SESSION["s_id"] = $row["s_id"];
                                $_SESSION["s_email"] = $row["s_email"];
                                $_SESSION["s_name"] = $row["s_name"];
                                header("Location: ../seller/index.php?login=success");
                                exit();
                            }
                            else {
                                header("Location: ../home.php?error=loginfailed");
                                exit();
                            }
                    }
                    else{
                        header("Location: ../home.php?wrongp");
                        echo "failed to login";
                        echo '<script>alert("Wrong Password")</script>';
                         exit();
                    }
            }
    }
}
else {
    header("Location: ../index.php?error=failed");
    exit();
}