
<!-- Add Room Modal -->
<div class="modal fade" id="addroomtypemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Room Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="roomcode.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <div class="modal-body">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="Description" cols = "40" rows="4" class="form-control" placeholder="Enter Description"></textarea>
        </div>
        <div class="form-group">
            <label>Picture</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
        <label>Date</label>
            <input type="date" name="Date" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="addbtn" class="btn btn-primary">Add Content</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Delete Content Modal -->
<div class="modal fade" id="deletecontentmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Content</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <h5 style="text-align: center;">Are you sure you want to delete this content?</h5>
      <form action="contentcode.php" method="post">
      <div class="modal-footer">
        <input type="hidden" name="delete_id" id="delete_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletebtn" class="btn btn-danger">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Room Type Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Room Types
            </h4>
        </div>
    
        <div class="card-body">

            <?php

            //show session status
            if(isset($_SESSION['Success']) && $_SESSION['Success'] !='')
            {
                echo '<h2> '.$_SESSION['Success'].' </h2>';
                unset($_SESSION['Success']);
            }
            
            if(isset($_SESSION['Status']) && $_SESSION['Status'] !='')
            {
                echo '<h2> '.$_SESSION['Status'].' </h2>';
                unset($_SESSION['Status']);
            }
            ?>

            <div class="table-responsive">

            <?php
                //retrieve data from database
                $connection = mysqli_connect("localhost", "Aqieff", "test123", "piltonhotel");

                $query = "SELECT * FROM room_types";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 10%;">Room Type ID</th>
                            <th style="width: 10%;">Room Type</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 10%;">No. of People</th>
                            <th style="width: 10%;">Price (RM)</th>
                            <th style="width: 30%;">Picture</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //repeat each row of data
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                                    ?>
                                <tr>
                                    <td><?php echo $row['roomtype_id']; ?></td>
                                    <td><?php echo $row['room_type']; ?></td>
                                    <td><?php echo $row['room_desc']; ?></td>
                                    <td><?php echo $row['pax_no']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo '<img src="data:image;base64,'. base64_encode($row['room_pic']) .'" alt="room pic" style="width:150px;height:150px" >'; ?></td>
                                </tr>
                                    <?php
                                }
                            }
                            else{
                                echo "No Records Found";
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>