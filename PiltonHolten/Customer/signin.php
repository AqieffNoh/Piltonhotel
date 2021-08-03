<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $fname = $_POST['cust_fname'];
        $lname = $_POST['cust_lname'];
        $email = $_POST['cust_email'];
        $password = $_POST['cust_password'];
        $retype_pass = $_POST['cust_repass'];
        $phone = $_POST['cust_phone'];


        if ( $retype_pass == $password) {
            if(!is_numeric($fname) && !is_numeric($lname) && is_numeric($phone)){
                // save to database
                $just_id = random_num(20);    //need this, if want to produce random num for customer_id, 20 is maximum length
                $query = "insert into cust_acc (just_id, fname, lname, email, password, phone) values ('$just_id', '$fname', '$lname', '$email', '$password', '$phone')";
                //to save the query
                mysqli_query($con, $query);
    
                header("Location: login.php");
                die;
    
            }else{
                echo "Please enter valid information.";
            }
        }else {
            echo "Please ensure password and retyped password match.";
        }
        

    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Pilton Hotel Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="logo" href="logo.png">
    
</head>
<body>
    <pre>
    <h1>Hey there!</h1>
    <h2>Come on, join Pilton Family!</h2>
    <form class="cust_signin"  method="POST">
        
        <label for="cust_fname">First Name: </label>
        <input id="cust_fname" name="cust_fname" type="text" required placeholder="Your first name here.">
            
        <label for="cust_lname">Last Name: </label>
        <input id="cust_lname" name="cust_lname" type="text" required placeholder="Your last name here.">
            
        <label for="cust_email">Email Address: </label>
        <input id="cust_email" name="cust_email" type="email" required placeholder="your@email.com">
            
        <label for="cust_password">Password: </label>
        <input id="cust_password" name="cust_password" type="password" required placeholder="Make it difficult.">

        <label for="cust_repass">Retype Password: </label>
        <input id="cust_repass" name="cust_repass" type="password" required placeholder="Match it with password.">
            
        <label for="cust_phone">Phone No.: </label>
        <input id="cust_phone" name="cust_phone" type="tel" required>
        
        <button id="log" type="submit">Join Us!</button>
    </form>
    </pre>

    
</body>
</html>

<!--

<body class="text-center">
    
<main class="form-signin">
  <form>
    <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


    
  </body>

-->