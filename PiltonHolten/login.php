<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $email = $_POST['cust_email'];
        $password = $_POST['cust_password'];

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "piltonhotel";

        //connection to the database
        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        //read from database
        if (!is_numeric($email)) {
            
            $query = "select * from customer where email = '$email' and password = '$password'";
            $result = mysqli_query($con, $query);

            if ($result) {
                if($result && mysqli_num_rows($result) > 0){
                
                    $user_data = mysqli_fetch_assoc($result);
    
                    if($user_data['password'] === $password){
                        
                        $_SESSION['CustID'] = $user_data['CustID'];
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Roboto&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="center">
    <h1>Hey there!</h1>
    <h2>Welcome, please login to Pilton Hotel.</h2>
    <form class="cust_login"  method="POST">
        <label for="cust_email">Email:   
        <input type="email" name="cust_email" id="cust_email" required placeholder="Your@email.com"></label>

        <label for="cust_password">Password:   
        <input type="password" name="cust_password" id="cust_password" required placeholder="Your password here"></label>

        <button id="log" name = "loginbtn" type="submit">To Pilton!</button>
<br>
        <a href="signin.php">New to Pilton Hotel? Join us!</a>
    </form>
    </div>
    
</body>

</html>
<style>
html{
    box-sizing: border-box;
    }

    *, *::before, *::after{
    box-sizing: border-box;
    }

    body{
        margin-top: 170px;
        background-color: #fdfff2;
        text-align: center;
    }

h1{
  font-family: 'Permanent Marker', cursive;
  font-size: 80px;
  margin: 0 ;
}

h2{
  font-family: 'Roboto', sans-serif;
  margin-top: 0;
  font-size: 18px;
}

    label{
      display: block;
      padding: 15px;
    }

    input{
      background-color: #fdfff2;
        color: #3a7a87;
        padding: 5px;
        border-radius: 5px;
        border: 0.5px;        
    }

    button{
      display: block;  
      background-color: #fdfff2;
        color: #3a7a87;
        padding: 5px 150px;
        border: 0.5px;
        border-radius: 10px;
        margin: 0 auto;
        font-size: large;
        font-family: 'Times New Roman', Times, serif;
    }
    button:hover{
      background-color: #628a92;
        color: #fdfff2;
    }

    a{
        text-decoration: none;
        padding: 15px;
        color: #3a7a87;
        font-size: 16px;
        margin: 5px;
    }
    a:hover{
        text-decoration-line: underline;
    }

    .center{
        background-color: #ebfefa;
        color: #3a7a87;
        margin: 0 auto;
        width: 40%;
        border: 5px solid #ebfefa;
        border-radius: 20px;
        padding: 10PX;
    }

    .center label:last-of-type{
        margin-bottom: 20px;
    }

/*---Cornflower
#86c8ee
Black
#181a1d

Shamrock
#55d4a2
Tropical Rain Forest
#204718

brown
#854f3e
light mint
#ebfefa

White
#fdfff2

White #e0fff4
Pine Green #3a7a87--*/

</style>