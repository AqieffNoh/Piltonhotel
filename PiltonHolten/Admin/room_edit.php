<head>
<title>Content Edit</title>
</head>
<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Content</h6>
        </div>
    
        <div class="card-body">
            <?php

                $connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");

                if(isset($_POST['editbtn']))
                {
                    $id = $_POST['edit_id'];
                
                    $query = "SELECT * FROM hotel_rooms WHERE roomID='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row)
                    {
                    ?>  
                        <form action="roomcode.php" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Room ID</label>
                                <input type="text" name="roomID" value="<?php echo $row['roomID']; ?>" class="form-control" placeholder="Enter Room ID">
                            </div>
                            <div class="form-group">
                                <label>Room Type</label>
                                <input type="text" name="roomtypeID" value="<?php echo $row['RoomType']; ?>" class="form-control" placeholder="Enter Room Type">
                                <h6>Room type is limited to: Single/Double/Suite</h6>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="Description" value="<?php echo $row['description']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label>Room Floor</label>
                                <input type="date" name="rFloor" value="<?php echo $row['rFloor']; ?>" class="form-control">
                            </div>
                        </div>
                            <a href="room_types.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="editbtn" class="btn btn-primary">Add Room</button>
                        </form>
                    <?php
                    }

                }
                    ?>

            
        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>