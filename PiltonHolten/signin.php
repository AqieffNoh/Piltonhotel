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
                $query = "insert into customer (just_id, fname, lname, email, password, phone) values ('$just_id', '$fname', '$lname', '$email', '$password', '$phone')";
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Roboto&display=swap" rel="stylesheet">
    
</head>
<body>
<div class="center">
    <h1>Hey there!</h1>
    <h2>Come on, join Pilton Family!</h2>
    
      <form class="cust_signin"  method="POST">
          
          <label for="cust_fname">First Name:   
          <input id="cust_fname" name="cust_fname" type="text" required placeholder="Your first name here."></label>
              
          <label for="cust_lname">Last Name:   
          <input id="cust_lname" name="cust_lname" type="text" required placeholder="Your last name here."></label>
              
          <label for="cust_email">Email Address: 
          <input id="cust_email" name="cust_email" type="email" required placeholder="your@email.com"></label>
              
          <label for="cust_password">Password:   
          <input id="cust_password" name="cust_password" type="password" required placeholder="Make it difficult."></label>

          <label for="cust_repass">Retype Password: 
          <input id="cust_repass" name="cust_repass" type="password" required placeholder="Match it with password."></label>
              
          <label for="cust_phone">Phone No.:   
          <input id="cust_phone" name="cust_phone" type="tel" required placeholder="01200000000"></label>
          
          <button id="log" type="submit">Join Us!</button>
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
        margin-top: 90px;
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
      padding: 13px;
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

    .center{
        background-color: #ebfefa;
        color: #3a7a87;
        margin: 0 auto;
        width: 40%;
        border: 5px solid #ebfefa;
        border-radius: 20px;
        padding: 10PX 10px 20px 10px;
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