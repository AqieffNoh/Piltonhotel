<!-- Seller Request Table -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Seller Requests
        </div>
    
        <div class="card-body">
            <div class="table-responsive">

            <?php
                //retrieve data from database
                $connection = mysqli_connect("localhost", "root", "", "piltonhotel");

                $query = "SELECT * FROM seller_request";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-bordered" id="sellerreqtable" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 10%;">Request ID</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 10%;">Email</th>
                            <th style="width: 10%;">Description</th>
                            <th style="width: 5%;">Phone Number</th>
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
                                    <td><?php echo $row['request_id']; ?></td>
                                    <td><?php echo $row['s_name']; ?></td>
                                    <td><?php echo $row['s_email']?></td>
                                    <td><?php echo $row['request_desc']?></td>
                                    <td><?php echo $row['s_phone']?></td>
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