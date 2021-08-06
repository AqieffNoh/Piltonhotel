
<!-- Bookings Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Bookings
            <a href="booking_add.php" class="btn btn-primary" style = "float: right;">Add Bookings</a>
            </h4>
            <p>Status : 1=Pending, 2=Checked In, 3=Checked Out, 4=Cancelled</p>
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

                $query = "SELECT * FROM booked_room_service";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-bordered" id="bookingstable" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%;"></th>
                            <th style="width: 10%;">Booking ID</th>
                            <th style="width: 10%;">Customer ID</th>
                            <th style="width: 10%;">Check In</th>
                            <th style="width: 10%;">Check Out</th>
                            <th style="width: 5%;">Status</th>
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
                                    <td>
                                        <form action="booking_view.php" method="post">
                                            <input type="hidden" name="view_id" value="<?php echo $row['booked_id']; ?>">
                                            <button type="submit" name="viewbtn" class="btn btn-primary">VIEW</button>
                                        </form>
                                    </td>
                                    <td><?php echo $row['booked_id']; ?></td>
                                    <td><?php echo $row['cust_id']; ?></td>
                                    <td><?php echo $row['checkin']?></td>
                                    <td><?php echo $row['checkout']?></td>
                                    <td><?php echo $row['status']?></td>
                                    <td>
                                        <form action="booking_edit.php" method="post">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['booked_id']; ?>">
                                            <button type="submit" name="editbtn" class="btn btn-success">EDIT</button>
                                        </form>
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