<?php
// session_start();
    include "connection.php";
    include_once "header.php";
    include "functions.php";
    
?>

<main>
<link rel="stylesheet" type="text/css" href="styles.css" >

<style>

h3{
    text-align: center;
}

.row{
    text-align: center;
    display: block;
}

.row input[type=text]{
  width: 200px;
}

.editbtn{
    background-color: #2b7a78;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 10px;
    margin-left: 45%;
}

.editbtn:hover{
    color: white;
    border-radius: 10px;

}

.editbtn a{
    color: black;
}

.label{
  margin: 0 auto;
  padding: 20px;
}

.divider{
    height: 5px;
    width: 100%;
    background-color: #2b7a78;
    background-position: center;
    background-size: contain;
    position: relative;
}

.tablesorter {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
.tablesorter td, .merch-order th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
.tablesorter tr:nth-child(even){background-color: #f2f2f2;}
  
.tablesorter tr:hover {background-color: #ddd;}
  
.tablesorter th {
    padding-left: 20px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #287A78;
    color: white;
  }

.tablesorter td button {
    padding: 10px;
    margin-left: 40px;
    border-radius: 5px;
    border: 1px white;
    text-align: center;
    background-color: rgb(149, 207, 170);
    display: block;
    cursor: pointer;
  }

  .tablesorter td button:hover{
    background-color: #095a56fa;
    border-radius: 5px;
    color: white;
}

.h1{
  text-align:center;
  margin-top: 20px;
  font-size:35px;
}


</style>

<div class="divider">
</div>
	
<section>

<?php
  // include 'includes/dbh.inc.php';
    
    $user_data = check_login($con);
    $custid=$user_data['CustID'];
    $fname=$user_data['fname'];
    $lname=$user_data['lname'];

    $query=mysqli_query($con,"SELECT * FROM customer WHERE CustID='$custid'") or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
  ?>

<div class="col-xl-8 order-xl-1">
          

          <!-- user profile form -->
          <form class="userProfile" action="" method="POST" enctype="multipart/form-data" id="displayProfile">

          <div name="c_ID" style="display: none;"z>
                <label name="c_ID">Customer ID</label>
                <textarea name=customerID>
                <?php
                  $user_data=['CustID'];
                ?> 
                </textarea>

          </div>  

                <div class="col-8">
                  <h3 id="head" class="mb-0">My account</h3>
                </div>
                
            <div class="card-body">
                <h3 id="head" class="heading-small text-muted mb-4">User information</h3>
                      
                  <div class="row">
                        <label class="label" for="input-full-name">Full Name : 
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $fname?> <?php echo $lname?>" readonly> 
                    </div>

                </div>

                <!-- Address -->
                <h3 id="head" class="heading-small text-muted mb-4">Contact Information</h3>
               
                  
                <div class="row">
                        <label class="label" for="input-email">Email Address : 
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="123@example.com" value="<?php echo $row['email']; ?>" readonly></label>
                      </div>

                      <div class="row">
                        <label class="label" for="input-email">Phone Number : 
                        <input type="phone" id="input-phone" class="form-control form-control-alternative" placeholder="011-12345677" value="<?php echo $row['phone']; ?>" readonly></label>
                      </div>
                      <button class="editbtn"><a href="u_profileEdit.php" title="Edit your profile">Edit Profile</a></button>
                  </div>
                </div>
                </div>
              </form>
            </div>
</section>

<div class="divider"></div>

<!-- booked_id	cust_id	room_id	roomtype_id	checkin	checkout	days_stayed	price	payment_id	 -->


<section>
    <?php

    $user_data = check_login($con);
    $custid1=$user_data['CustID'];

    $sql1 = mysqli_query($con, "SELECT * FROM booked_room_service JOIN room_types on room_types.roomtype_id = booked_room_service.roomtype_id where cust_id = '$custid1'") or die("Query error : " . mysqli_error($con));
    ?>
<h3 id="head" class="mb-0">My Room Bookings</h3>

<div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="45"> 

            <thead>
                </tr>
                <th> Booked ID </th> 
                <th> Room Type </th>
                <th> Room ID </th>		
                <th> Room View </th>		  
                <th> Check In Date </th>
                <th> Check Out Date </th>				
                <th> Price </th>				
                			
                </tr>
            </thead>
            <tbody>
           


<?php while($row1 = mysqli_fetch_array($sql1)) {?>

    <tr>
        <td><?php echo $row1['booked_id']; ?></td>
        <td><?php echo $row1['room_type']; ?></td>
        <td><?php echo $row1['room_id']; ?></td>
        <td> <?php echo '<img src="data:image;base64,'. base64_encode($row1['room_pic']) .'" alt="room pic" style="width:100%" >'; ?></td>
            <!-- <img src="" alt="" style="width:100%"> -->
        <td><?php echo $row1['checkin']; ?></td>
        <td><?Php echo $row1['checkout']; ?></td>
        <td><?php echo $row1['total_price']; ?></td>        
    </tr>

</div>
<?php
    }
    ?>
    </tbody>
    </table>
</section>


<div class="divider"></div>

<section>
    <?php
    $sql = mysqli_query($con,"SELECT merch_order.merch_id, CustID, m_order_no, merch_order.quantity, amount, date, status, merch_name, picture FROM merch_order JOIN merch ON merch.merch_id=merch_order.merch_id WHERE CustID='$custid'") or die("Query error : " . mysqli_error($con));
    ?>
<h3 id="head" class="mb-0">My Merch Order</h3>

<div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="45"> 

            <thead>
                </tr>
                <th> Order Number </th> 
                <th> Merch Name </th>	
                <th> Picture </th>		  
                <th> Quantity </th>
                <th> Total Amount </th>				
                <th> Purchase Date </th>				
                <th> Status </th>	
                <th> Invoice </th>				
                </tr>
            </thead>
            <tbody>

<?php while($row = mysqli_fetch_array($sql)) {?>
<form action="m_invoicePrint.php" method="POST">
    <tr>
        <td><input name="m_order" type="text" value="<?php echo $row['m_order_no']; ?>" readonly></td>
        <td><?php echo $row['merch_name']; ?></td>
        <td> <img src="seller/images/<?php echo $row['picture']; ?> " width="70" height="70"></td>
        <td><?php echo $row['quantity']; ?></td>
        <td><?Php echo $row['amount']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><p><?php echo $row['status']; ?></p></td>
        <td><button name="generate" class="btn btn-primary" >Generate invoice</button></td>
    </tr>
    </form>
</div>
<?php  } ?>
</tbody>
</table>
</section>


</main>

<?php
   
    include_once "footer.php";
?>
