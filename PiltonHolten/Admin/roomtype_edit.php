<head>
<title>Room Type Edit</title>
</head>
<?php 
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>
<br>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Room Type</h6>
        </div>
    
        <div class="card-body">
            <?php

                $connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");
                $target_dir = "webimg/";

                if(isset($_POST['edittypebtn']))
                {
                    $id = $_POST['edit_id'];
                
                    $query = "SELECT * FROM room_types WHERE RoomTypeID='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row) 
                    {
                    ?>  
                        <form action="roomcode.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="edit_desc" value="<?php echo $row['Description']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" name="image" class="form-control">
                                <h6>Current Picture: </h6>
                                <?php echo "<img src=" . "'" . $target_dir . "/" . $row['Picture'] . "'" . "style='width:150px;height:150px'/>"; ?>
                            </div>
                            <div class="form-group">
                            <a href="room_types.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="editroomtypebtn" class="btn btn-primary">Update Room Type</button>
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