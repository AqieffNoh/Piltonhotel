<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "piltonhotel");

//add content query
if(isset($_POST['addbtn']))
{


    $name = $_POST['Name'];
    $desc = $_POST['Description'];
    $price = $_POST['Price'];



    $query = "INSERT INTO add_ons (Name, Description, Price) VALUES ('$name', '$desc', '$price')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        $_SESSION['Success'] = "Add-On added";
        header('Location: index.php?page=AddOn');
    }
    else 
    {
        $_SESSION['Status'] = "Add-On not added";
        header('Location: index.php?page=AddOn');
    }

}


//update content query
if(isset($_POST['updatebtn']))
{

    $id = $_POST['edit_id'];
    $name = $_POST['edit_Name'];
    $desc = $_POST['edit_Desc'];
    $price = $_POST['edit_Price'];

    $query = "UPDATE add_ons SET Name='$name', Description='$desc', Price='$price' WHERE AddOnID='$id' ";
    $query_run = mysqli_query($connection, $query);
    
    
    if ($query_run)
    {
        $_SESSION['Success'] = "Add-On updated";
        header('Location: index.php?page=AddOn');
    }
    else 
    {
        $_SESSION['Status'] = "Add-On not updated";
        header('Location: index.php?page=AddOn');
    }

}

//delete content query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM add_ons WHERE AddOnID='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Add-On Deleted";
        header('Location: index.php?page=AddOn');
    }
    else 
    {
        $_SESSION['Status'] = "Add-On is NOT Deleted";
        header('Location: index.php?page=AddOn');
    }

}







?>