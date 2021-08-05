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
            $result = mysqli_query($conn, $query);

            if ($result) {
                if($result && mysqli_num_rows($result) > 0){
                
                    $user_data = mysqli_fetch_assoc($result);
    
                    if($user_data['password'] === $password){
                        
                        $_SESSION['just_id'] = $user_data['just_id'];
                        header("Location: home.php?login=Success");
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
        
</head>
<body>

<div class="log-form">
  <h2>Login to Pilton</h2>
  <form class="cust_login"  method="POST">
    <input type="email" name="cust_email" id="cust_email" required placeholder="Your@email.com">
    <input type="password" name="cust_password" id="cust_password" required placeholder="Your password here">
    <button class="btn" id="log" name = "loginbtn" type="submit">To Pilton!</button>   
    <a href="signin.php">New to Pilton Hotel? Join us!</a>
  </form>
</div>

    <!-- <pre>
    <h1>Hey there!</h1>
    <h2>Welcome, please login to Pilton Hotel.</h2>
    <form class="cust_login"  method="POST">
        <label for="cust_email">Email: </label>
        <input type="email" name="cust_email" id="cust_email" required placeholder="Your@email.com">

        <label for="cust_password">Password: </label>
        <input type="password" name="cust_password" id="cust_password" required placeholder="Your password here">

        <button class="btn" id="log" name = "loginbtn" type="submit">To Pilton!</button>
<br>
        <a href="signin.php">New to Pilton Hotel? Join us!</a>
    </form>
    
    </pre>  -->
</body>

</html>

<style>
html{
  box-sizing: border-box;
}

*, *::before, *::after{
    box-sizing: border-box;
}

@import url(https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:400,300,600);

body {
  font-family: 'open sans', helvetica, arial, sans;
    background-image:url(http://farm8.staticflickr.com/7064/6858179818_5d652f531c_h.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

@grey:#2a2a2a;
@blue:#1fb5bf;
.log-form {
  width: 40%;
  min-width: 320px;
  max-width: 475px;
  background: #fff;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
-moz-transform: translate(-50%,-50%);
-o-transform: translate(-50%,-50%);
-ms-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
  
  box-shadow: 0px 2px 5px rgba(0,0,0,.25);
  
  @media(max-width: 40em){
    width: 95%;
    position: relative;
    margin: 2.5% auto 0 auto;
    left: 0%;
  -webkit-transform: translate(0%,0%);
-moz-transform: translate(0%,0%);
-o-transform: translate(0%,0%);
-ms-transform: translate(0%,0%);
transform: translate(0%,0%);
  }
  
  form {
    display: block;
    width: 100%;
    padding: 2em;
  }
  
  h2 {
    width: 100%;
    color: lighten(@grey, 20%);
    font-family: 'open sans condensed';
    font-size: 1.35em;
    display: block;
    background:@grey;
    width: 100%;
    text-transform: uppercase;
    padding: .75em 1em .75em 1.5em;
    box-shadow:inset 0px 1px 1px fadeout(white, 95%);
    border: 1px solid darken(@grey, 5%);
    //text-shadow: 0px 1px 1px darken(@grey, 5%);
    margin: 0;
    font-weight: 200;
  }
  
  input {
    display: block;
    margin: auto auto;
    width: 100%;
    margin-bottom: 2em;
    padding: .5em 0;
    border: none;
    border-bottom: 1px solid #eaeaea;
    padding-bottom: 1.25em;
    color: #757575;
    &:focus {
      outline: none;
    }
  }
  
  .btn {
    display: inline-block;
    background: @blue;
    border: 1px solid darken(@blue, 5%);
    padding: .5em 2em;
    color: white;
    margin-right: .5em;
    box-shadow: inset 0px 1px 0px fadeout(white, 80%); 
    &:hover {
      background: lighten(@blue, 5%);
    }
    &:active {
      background: @blue; 
      box-shadow: inset 0px 1px 1px fadeout(black, 90%); 
    }
    &:focus {
      outline: none;
    }
  }
  
  .forgot {
    color: lighten(@blue, 10%);
    line-height: .5em;
    position: relative;
    top: 2.5em;
    text-decoration: none;
    font-size: .75em;
    margin:0;
    padding: 0;
    float: right;
    
    &:hover {
      color:darken(@blue, 5%);
    }
    &:active{ 
    }
  }
  
}
</style>