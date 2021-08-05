<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "piltonhotel");

//add seller query
if(isset($_POST['addbtn']))
{

    
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $PhoneNo = $_POST['PhoneNo'];
    $desc = $_POST['Description'];
    $birthdate = date('Y-m-d', strtotime($_POST['BirthDate']));
    $address = $_POST['Address'];
    $pass = $_POST['Password'];
    $regdate = date('Y-m-d', strtotime($_POST['RegDate']));



    $query = "INSERT INTO seller_acc (s_name, s_username, s_description, s_email, s_phone, s_birthdate, s_address, s_password, s_regis_date) VALUES ('$name', '$username', '$desc', '$email', '$PhoneNo', '$birthdate', '$address', '$pass', '$regdate')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        $_SESSION['Success'] = "Seller added";
        header('Location: index.php?page=Sellers');
    }
    else 
    {
        $_SESSION['Status'] = "Seller not added";
        header('Location: index.php?page=Sellers');
    }

}


//update content query
if(isset($_POST['updatebtn']))
{

    $id = $_POST['edit_id'];
    $name = $_POST['Name'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $PhoneNo = $_POST['PhoneNo'];
    $desc = $_POST['Description'];
    $birthdate = date('Y-m-d', strtotime($_POST['BirthDate']));
    $address = $_POST['Address'];
    $pass = $_POST['Password'];
    $regdate = date('Y-m-d', strtotime($_POST['RegDate']));

    $query = "UPDATE seller_acc SET s_name='$name', s_username='$username', s_description='$desc', s_email='$email', s_phone='$PhoneNo', s_birthdate='$birthdate', s_address='$address', s_password='$pass', s_regis_date ='$regdate' WHERE s_id='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    
    if ($query_run)
    {
        $_SESSION['Success'] = "Seller updated";
        header('Location: index.php?page=Sellers');
    }
    else 
    {
        $_SESSION['Status'] = "Seller not updated";
        header('Location: index.php?page=Sellers');
    }

}

//delete content query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM seller_acc WHERE s_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Seller Deleted";
        header('Location: index.php?page=Sellers');
    }
    else 
    {
        $_SESSION['Status'] = "Seller is NOT Deleted";
        header('Location: index.php?page=Sellers');
    }

}







?>