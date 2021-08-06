<?php
    include "header.php";
    include "includes/session.inc.php";
    // $check=$_SESSION["s_id"];
    // if(isset($_POST['login_submit'])) {
    // // $name = $_POST['id'];      
    // $_SESSION['s_id'] = $name;
    // }
?>

<main>
    <section>
        <h1>Welcome to Pilton Merchandise Seller Center: 
    <?php echo "". "<font color='##fa5400'><i><b>".$login_session ."</b></i></font>" ;?> </h1>
</section>

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
  text-align:center;
  margin-top: 20px;
  font-size:35px;
}

.tag{
    font-size:20px;
    margin-right: 10px;
    float: right;
    display: block;
    width: 115px;
    height: 25px;
    background: #62b86e;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    
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
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
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
</style>

<section class="header"></section>


<!-- view merch order -->
<section>
    <?php
    $check=$_SESSION["s_id"];
    $result = mysqli_query($conn,"SELECT * FROM merch_order WHERE s_id='$check'");

    ?>

<h1 class="h1">Merchandise Orders <a class="tag" href="merchorder.php">GO ></a></h1>

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
        <td class="text-center">Current Status: <?php echo $row['status'];?></td>
    </tr>

    <?php }?>
    </tbody>
    </table>



<!-- view and edit merch -->
<section>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM merch where s_id='$check'");
    ?>

<h1 class="h1">Merchandise List <a class="tag" href="managemerch.php">GO ></a></h1> 

    <div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="45"> 


            <thead>
                </tr>
                <th> Merch Name </th>			  
                <th> Category </th>
                <th> Price </th>				
                <th> Quantity </th>				
                <th> Description </th>				
                <th> Picture </th>
                </tr>
            </thead>
            <tbody>
           
</tbody>

<?php while($row = mysqli_fetch_array($result))
    {?>

    <tr>
        <td><?php echo $row['merch_name']; ?></td>
        <td><?php echo $row['category_ID']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?Php echo $row['quantity']; ?></td>
        <td><?php echo $row['merch_desc']; ?></td>
        <td> <img src="images/<?php echo $row['picture']; ?> " width="70" height="70"></td>
    </tr>

  <?php }mysqli_close($conn);?>

</tbody>
</table>  
 </div> 

 
</section>

</main>

<?php
    include_once "footer.php";
?>




