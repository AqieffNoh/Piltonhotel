<head>
<title>Rooms</title>
</head>


<!-- Add Room Modal -->
<div class="modal fade" id="addroommodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="roomcode.php" method="post">
      <div class="modal-body">

        <div class="form-group">
            <label>Room ID</label>
            <input type="number" name="roomID" class="form-control" placeholder="Enter Room ID">
        </div>
        <div class="form-group">
            <label>Room Type</label>
            <input type="number" name="roomtypeID" class="form-control" placeholder="Enter Room Type">
            <h6>Room type is limited to: <br> 1-Deluxe <br> 2-Double Deluxe</h6>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="addbtn" class="btn btn-primary">Add Room</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Delete Room Modal -->
<div class="modal fade" id="deleteroommodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Room</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <h5 style="text-align: center;">Are you sure you want to delete this room?</h5>
      <form action="roomcode.php" method="post">
      <div class="modal-footer">
        <input type="hidden" name="delete_id" id="delete_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletebtn" class="btn btn-danger">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>


<!-- Room Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Rooms
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addroommodal" style = "float: right;">
                Add Room
                </button>
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
                $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

                $query = "SELECT * FROM hotel_rooms";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 10%;">Room ID</th>
                            <th style="width: 9.5%;">Room Type</th>
                            <th style="width: 5%;"></th>
                            <th style="width: 5%;"></th>
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
                                    <td><?php echo $row['room_id']; ?></td>
                                    <td><?php echo $row['roomtype_id']; ?></td>
                                    <td>
                                        <form action="room_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['room_id']; ?>">
                                            <button type="submit" name="editbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deleteroombtn">Delete</button>
                                    </td>
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