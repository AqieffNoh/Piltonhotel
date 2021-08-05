<head>
<title>Add Ons</title>
</head>


<!-- Add Add-On Modal -->
<div class="modal fade" id="addaddonmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Add-On</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="addoncode.php" method="post">
      <div class="modal-body">

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" placeholder="Enter Name" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="Description" cols = "40" rows="4" class="form-control" placeholder="Enter Description" required></textarea>
        </div>
        <div class="form-group">
        <label>Price</label>
            <input type="number" name="Price" class="form-control" step=".01" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="addbtn" class="btn btn-primary">Add Add-On</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Delete Add-On Modal -->
<div class="modal fade" id="deleteaddonmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Add-on</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <h5 style="text-align: center;">Are you sure you want to delete the add-on?</h5>
      <form action="addoncode.php" method="post">
      <div class="modal-footer">
        <input type="hidden" name="delete_id" id="delete_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletebtn" class="btn btn-danger">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Add-On Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Add-Ons
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addaddonmodal" style = "float: right;">
                Add Add-On
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

                $query = "SELECT * FROM add_ons";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 30%;">Description</th>
                            <th style="width: 9.5%;">Price (RM)</th>
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
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo $row['Price']; ?></td>
                                    <td>
                                        <?php echo "<p style='opacity: 0;'>" .$row['AddOnID']."</p>"; ?>
                                        <form action="addon_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['AddOnID']; ?>">
                                            <button type="submit" name="editbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo "<p style='opacity: 0;'>" .$row['AddOnID']."</p>"; ?>
                                        <button type="button" class="btn btn-danger deleteaddonbtn">Delete</button>
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