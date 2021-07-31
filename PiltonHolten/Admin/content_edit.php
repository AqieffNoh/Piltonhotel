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
                $target_dir = "webimg/";

                if(isset($_POST['editbtn']))
                {
                    $id = $_POST['edit_id'];
                
                    $query = "SELECT * FROM contents WHERE ContentID='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row)
                    {
                    ?>  
                        <form action="contentcode.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <input type="hidden" name="edit_id" value="<?php echo $row['ContentID'] ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="edit_Name" value="<?php echo $row['Name'] ?>" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="edit_Desc" cols = "40" rows="4" class="form-control" placeholder="Enter Description"><?php echo $row['Description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" name="image" class="form-control">
                                <h6>Current Picture: </h6>
                                <?php echo "<img src=" . "'" . $target_dir . "/" . $row['Picture'] . "'" . "style='width:150px;height:150px'/>"; ?>
                            </div>
                            <div class="form-group">
                            <label>Date</label>
                                <input type="date" name="edit_Date" value="<?php echo $row['Date'] ?>" class="form-control">
                            </div>
                            <br>
                            <a href="content.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>

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