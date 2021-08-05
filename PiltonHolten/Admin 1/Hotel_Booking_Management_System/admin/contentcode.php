<?php
session_start();
$connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");

//add content query
if(isset($_POST['addbtn']))
{
    //the path to store the uploaded image
    $target = "webimg/".basename($_FILES['image']['name']);

    
    $name = $_POST['Name'];
    $desc = $_POST['Description'];
    $image = $_FILES['image']['name'];
    $date = date('Y-m-d', strtotime($_POST['Date']));



    $query = "INSERT INTO contents (Name, Description, Picture, Date) VALUES ('$name', '$desc', '$image', '$date')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $_SESSION['Success'] = "Content added";
        header('Location: index.php?page=content');
    }
    else 
    {
        $_SESSION['Status'] = "Content not added";
        header('Location: index.php?page=content');
    }

}


//update content query
if(isset($_POST['updatebtn']))
{
    if($_FILES["image"]["error"] == 4) {
        //means there is no file uploaded

        $id = $_POST['edit_id'];
        $name = $_POST['edit_Name'];
        $desc = $_POST['edit_Desc'];
        $date = date('Y-m-d', strtotime($_POST['edit_Date']));;

        $query = "UPDATE contents SET Name='$name', Description='$desc', Date='$date' WHERE ContentID='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            $_SESSION['Success'] = "Content updated";
            header('Location: index.php?page=content');
        }
        else 
        {
            $_SESSION['Status'] = "Content not updated";
            header('Location: index.php?page=content');
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

        $query = "UPDATE contents SET Name='$name', Description='$desc', Picture='$image', Date='$date' WHERE ContentID='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $_SESSION['Success'] = "Content updated";
            header('Location: index.php?page=content');
        }
        else 
        {
            $_SESSION['Status'] = "Content not updated";
            header('Location: index.php?page=content');
        }
    }


}

//delete content query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM contents WHERE ContentID='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Content Deleted";
        header('Location: index.php?page=content');
    }
    else 
    {
        $_SESSION['Status'] = "Content is NOT Deleted";
        header('Location: index.php?page=content');
    }

}







?>