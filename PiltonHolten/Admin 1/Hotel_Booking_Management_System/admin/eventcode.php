<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "piltonhotel");

//add event query
if(isset($_POST['addbtn']))
{
    //the path to store the uploaded image
    $target = "webimg/".basename($_FILES['image']['name']);

    
    $name = $_POST['Name'];
    $desc = $_POST['Description'];
    $image = $_FILES['image']['name'];
    $date = date('Y-m-d', strtotime($_POST['Date']));



    $query = "INSERT INTO events (Name, Description, Picture, Date) VALUES ('$name', '$desc', '$image', '$date')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $_SESSION['Success'] = "Event added";
        header('Location: index.php?page=events');
    }
    else 
    {
        $_SESSION['Status'] = "Event not added";
        header('Location: index.php?page=events');
    }

}


//update event query
if(isset($_POST['updatebtn']))
{
    if($_FILES["image"]["error"] == 4) {
        //means there is no file uploaded

        $id = $_POST['edit_id'];
        $name = $_POST['edit_Name'];
        $desc = $_POST['edit_Desc'];
        $date = date('Y-m-d', strtotime($_POST['edit_Date']));;

        $query = "UPDATE events SET Name='$name', Description='$desc', Date='$date' WHERE EventID='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            $_SESSION['Success'] = "Event updated";
            header('Location: index.php?page=events');
        }
        else 
        {
            $_SESSION['Status'] = "Event not updated";
            header('Location: index.php?page=events');
        }
    }
    else {
        //the path to store the uploaded image
        $target = "webimg/".basename($_FILES['image']['name']);

        $id = $_POST['edit_id'];
        $name = $_POST['edit_Name'];
        $desc = $_POST['edit_Desc'];
        $image = $_FILES['image']['name'];
        $date = date('Y-m-d', strtotime($_POST['edit_Date']));;

        $query = "UPDATE events SET Name='$name', Description='$desc', Picture='$image', Date='$date' WHERE EventID='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $_SESSION['Success'] = "Event updated";
            header('Location: index.php?page=events');
        }
        else 
        {
            $_SESSION['Status'] = "Event not updated";
            header('Location: index.php?page=events');
        }
    }
}

//delete content query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM events WHERE EventID='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Event Deleted";
        header('Location: index.php?page=events');
    }
    else 
    {
        $_SESSION['Status'] = "Event is NOT Deleted";
        header('Location: index.php?page=events');
    }

}







?>