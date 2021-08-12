<?php
session_start();
include("headerBef.php");
    include("connection.php");
    // $roomdisplay = display($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pilton Hotel</title>
	<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <main>
    <?php

if (isset($_GET['wrongp'])){
    
echo '<p>seller. login failed!</p>';
}
?>
        <section class="header">
            <div class="text-box">
		<h1 style="color: white;">Pilton Hotel</h1>
		<br>
		<p>Hello, Welcome to Pilton Hotel</p>
        </div>
        </section>

        <div class="card-header py-3" style="text-align: center; background-color: white;">
            <h4 class="m-0 font-weight-bold text-primary" style="position:center;">Pilton's Rooms
            </h4>
        </div>
    <section class="card-flex-container">
            <?php

                $con = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($con, 'piltonhotel');
                
                $query = " select * from room_types";
                $result = mysqli_query($con, $query);

                while($roomdisplay = mysqli_fetch_array($result)){
                ?>            
                <div class="card">
                    <div class="card-img">
                        <?php echo '<img src="data:image;base64,'. base64_encode($roomdisplay['room_pic']) .'" alt="room pic" style="width:100%" >'; ?>
                        <img src="" alt="" style="width:100%">
                    </div>
                    <div class="card-info">
                        <h1><?php echo $roomdisplay['room_type']; ?></h1>
                        <p class="price">RM <?php echo $roomdisplay['price']; ?></p>
                        <p><?php echo $roomdisplay['room_desc'] ?></p>
                    </div>
                    <button><a href="login.php" style="text-decoration: none; color: #e0fff4;">Book Now</a></button>
                </div>            
                <?php
                } ?>
            </section>
    <div id=wrapper>
    <div class="container-fluid">
    <div class="shadow mb-4">
        <div class="card-header py-3" style="text-align: center;">
            <h4 class="m-0 font-weight-bold text-primary" style="position:center;">Pilton's Activities
            </h4>
        </div>
    
        <div class="card-body">

            <div class="table-responsive">

            <?php
                //retrieve data from database
                $connection = mysqli_connect("localhost", "root", "", "piltonhotel") or die(mysqli_error($connection));

                $query = "SELECT * FROM contents";
                $query_run = mysqli_query($connection, $query);

            ?>

                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0" >
                    <thead>
                        <tr>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 40%;">Description</th>
                            <th style="width: 9.5%;">Picture</th>
                            <th style="width: 8%;">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //repeat each row of data
                            $target_dir = "Admin 1\Hotel_Booking_Management_System/admin/webimg/";
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                while($row = mysqli_fetch_array($query_run))
                                {
                                    ?>
                                <tr>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Description']; ?></td>
                                    <td><?php echo "<img src=" . "'" . $target_dir . "/" . $row['Picture'] . "'" . "style='width:150px;height:150px'/>"; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
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
</div>





    </main>
</body>
<footer class="sticky-footer bg-white" style="margin:50px;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Pilton Hotel 2001</span>
            </div>
        </div>
    </footer>
</html>