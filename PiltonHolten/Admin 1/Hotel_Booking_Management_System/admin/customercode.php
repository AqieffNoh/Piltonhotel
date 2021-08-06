<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "piltonhotel");

//add customer query
if(isset($_POST['addbtn']))
{

    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['Email'];
    $PhoneNo = $_POST['PhoneNo'];
    $pass = $_POST['Password'];



    $query = "INSERT INTO customer (fname, lname, email, phone, password) VALUES ('$fname', '$lname', '$email', '$PhoneNo', '$pass')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        $_SESSION['Success'] = "Customer added";
        header('Location: index.php?page=customer');
    }
    else 
    {
        $_SESSION['Status'] = "Customer not added";
        header('Location: index.php?page=customer');
    }

}


//update customer query
if(isset($_POST['updatebtn']))
{

    $id = $_POST['edit_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['Email'];
    $PhoneNo = $_POST['PhoneNo'];
    $pass = $_POST['Password'];

    $query = "UPDATE customer SET fname='$fname', lname='$lname', email='$email', phone='$PhoneNo', password='$pass' WHERE CustID='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    
    if ($query_run)
    {
        $_SESSION['Success'] = "Customer updated";
        header('Location: index.php?page=customer');
    }
    else 
    {
        $_SESSION['Status'] = "Customer not updated";
        header('Location: index.php?page=customer');
    }

}

//delete customer query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM customer WHERE CustID='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Customer Deleted";
        header('Location: index.php?page=customer');
    }
    else 
    {
        $_SESSION['Status'] = "Customer is NOT Deleted";
        header('Location: index.php?page=customer');
    }

}







?>