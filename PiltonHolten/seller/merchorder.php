<?php
    include_once "header.php";
    include_once 'includes/dbh.inc.php';

?>

<main>

<style>
    .merch-order {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
.merch-order td, .merch-order th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
.merch-order tr:nth-child(even){background-color: #f2f2f2;}
  
.merch-order tr:hover {background-color: #ddd;}
  
.merch-order th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }

.merch-order td button {
    padding: 10px;
    margin-left: 40px;
    border-radius: 5px;
    border: 1px white;
    text-align: center;
    background-color: rgb(149, 207, 170);
    display: block;
    cursor: pointer;
  }

  .merch-order td button:hover{
    background-color: #095a56fa;
    border-radius: 5px;
    color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

.h1{
  font-size:35px;
}

</style>

<section class="header"></section>


<!-- view merch order -->
<section>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM merch_order ");

    ?>

<h1 class="h1">Merchandise Orders</h1>
		<table class="merch-order">

            <!-- <thead>  <th Colspan="5" >  MERCHANDISE ORDERS </th></thead> -->
                <thead>
                </tr>		  
                <th>   Merch order number   </th>
                <th>   Details   </th>				
                <th>   Total Amount   </th>				
                <th>   Date   </th>				
                <th>   Status   </th>
                </tr>
            </thead>
            <tbody>
           
</tbody>

<tbody>
<?php while($row = mysqli_fetch_array($result))
    {?>

    <tr>
        <td class="text-center"><?php echo $row['m_order_no']; ?></td>
        <td class="text-center">
        Customer ID: <br><?php echo $row['CustID'] ?><br>
        Merch ID: <br><?php echo $row['merch_id'] ?><br>
        Quantity: <br><?php echo $row['quantity'] ?><br>

        </td>
        <td class="text-center">RM <?Php echo $row['amount']; ?></td>
        <td class="text-center"><?php echo $row['date']; ?></td>
        <td class="text-center">Current Status: <?php echo $row['status'];?>
          <button type="button" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Update Status</button></td>
    </tr>

  
    </tbody>
    </table>

    <div id="id01" class="modal">
    
  <form class="modal-content animate" action="includes/updateStatus.inc.php" method="POST">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <div class="container">
    <div name="orderNo" style="display: none;">
    <textarea  name="no"><?php echo $row['m_order_no']; ?> </textarea>
    </div>
      <h1>Status</h1>
      <select name="status">
                <option selected="true" disabled="true"  value="status ">ORDER STATUS...</option>
                <option value="Pending Confirmation">PendingConfirmation</option>
                <option value="Confirmed Order">ConfirmedOrder</option>
                <option value="Delivered">Delivered</option></select>

                <button name="updateStatus" type="submit">Update</button>
        

    </div>
  </form>
</div>
<?php }?>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</main>	


<?php
    include_once "footer.php";
?>
