<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "piltonhotel");

//add room query
if(isset($_POST['addbtn']))
{

    
    $roomid = $_POST['roomID'];
    $roomtypeid = $_POST['roomtypeID'];

    $query = "INSERT INTO hotel_rooms (room_id, roomtype_id) VALUES ('$roomid', '$roomtypeid')";
    $query_run= mysqli_query($connection, $query);


    if ($query_run)
    {
        $_SESSION['Success'] = "Room added";
        header('Location: index.php?page=hotelrooms');
    }
    else 
    {
        $_SESSION['Status'] = "room not added";
        header('Location: index.php?page=hotelrooms');
    }

}


//update room query
if(isset($_POST['updatebtn']))
{       
        

        $roomid = $_POST['roomID'];
        $roomtypeid = $_POST['roomtypeID'];


        $query = "UPDATE hotel_rooms SET room_id='$roomid', roomtype_id='$roomtypeid' WHERE room_id='$roomid' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            $_SESSION['Success'] = "Room updated";
            header('Location: index.php?page=hotelrooms');
        }
        else 
        {
            $_SESSION['Status'] = "Room not updated";
            header('Location: index.php?page=hotelrooms');
        }
}

//update room type query
if(isset($_POST['editroomtypebtn']))
{
        //the path to store the uploaded image
        $target = "webimg/".basename($_FILES['image']['name']);

        $id = $_POST['edit_id'];
        $desc = $_POST['edit_Desc'];
        $image = $_FILES['image']['name'];

        $query = "UPDATE room_types SET Description='$desc', Picture='$image' WHERE RoomTypeID='$id' ";
        $query_run = mysqli_query($connection, $query);
        
        
        if ($query_run)
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $_SESSION['Success'] = "Room type updated";
            header('Location: room_types.php');
        }
        else 
        {
            $_SESSION['Status'] = "Room type not updated";
            header('Location: room_types.php');
        }
}

//delete room query
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM hotel_rooms WHERE room_id='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run)
    {
        $_SESSION['Success'] = "Room Deleted";
        header('Location: index.php?page=hotelrooms');
    }
    else 
    {
        $_SESSION['Status'] = "Content is NOT Deleted";
        header('Location: index.php?page=hotelrooms');
    }

}







?>