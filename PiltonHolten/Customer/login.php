<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $email = $_POST['cust_email'];
        $password = $_POST['cust_password'];

        //read from database
        if (!is_numeric($email)) {
            
            $query = "select * from cust_acc where email = '$email' and password = '$password'";
            $result = mysqli_query($con, $query);

            if ($result) {
                if($result && mysqli_num_rows($result) > 0){
                
                    $user_data = mysqli_fetch_assoc($result);
    
                    if($user_data['password'] === $password){
                        
                        $_SESSION['just_id'] = $user_data['just_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Login failed. Please try again.";          
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Pilton Hotel Login</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="logo" href="logo.png">
    
</head>
<body>
    <pre>
    <h1>Hey there!</h1>
    <h2>Welcome, please login to Pilton Hotel.</h2>
    <form class="cust_login"  method="POST">
        <label for="cust_email">Email: </label>
        <input type="email" name="cust_email" id="cust_email" required placeholder="Your@email.com">

        <label for="cust_password">Password: </label>
        <input type="password" name="cust_password" id="cust_password" required placeholder="Your password here">

        <button id="log" name = "loginbtn" type="submit">To Pilton!</button>
<br>
        <a href="signin.php">New to Pilton Hotel? Join us!</a>
    </form>
    
    </pre> 
</body>

</html>
