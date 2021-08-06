<!-- Delete Customer Modal -->
<div class="modal fade" id="deletecustomermodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <h5 style="text-align: center;">Are you sure you want to delete this customer?</h5>
      <form action="customercode.php" method="post">
      <div class="modal-footer">
        <input type="hidden" name="delete_id" id="delete_id" value="delete_id">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletebtn" class="btn btn-danger">Confirm</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Customer Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Customer
            <a href="customer_add.php" class="btn btn-primary" style = "float: right;">Add Customer</a>
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

                $query = "SELECT * FROM customer";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-bordered" id="customertable" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Customer ID</th>
                            <th style="width: 10%;">First Name</th>
                            <th style="width: 10%;">Last Name</th>
                            <th style="width: 10%;">E-mail</th>
                            <th style="width: 10%;">Phone Number</th>
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
                                    <td><?php echo $row['CustID']; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']?></td>
                                    <td><?php echo $row['email']?></td>
                                    <td><?php echo $row['phone']?></td>
                                    <td>
                                        <form action="customer_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['CustID']; ?>">
                                            <button type="submit" name="editbtn" class="btn btn-success">EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger deletecustomerbtn">Delete</button>
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