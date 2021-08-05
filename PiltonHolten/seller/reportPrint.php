<?php
  session_start();
    include "includes/dbh.inc.php";
?>
<main>

<style>
.header{
    margin-top: 20px;
    text-align: center ;
  }
.tablePrint {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    margin-top: 100px;
    margin-left: 120px;
    width: 80%;
  }
  
.tablePrint td, .tablePrint th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
.tablePrint tr:nth-child(even){background-color: #f2f2f2;}
  
.tablePrint tr:hover {background-color: #ddd;}
  
.tablePrint th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
  }

.href{
  margin-top: 20px;
    margin-left: 44.4%;
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

.btn{
    margin-top: 20px;
    margin-left: 45%;
    display: block;
    background: #62b86e;
    border-radius: 5px;
    width: 115px;
    height: 25px;
    cursor: pointer;
    font-weight: bold;
  }
</style>

<title>PHP Print</title>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" media="print">


    <h1 class="header">Merch Order Report</h1>
      <table class="tablePrint" cellspacing="45">
        <thead>
          <tr>
          <th>No</th>
            <th>Merch ID</th>
            <th>Order Number</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Order Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sn=1;
          $check=$_SESSION["s_id"];
          $user_qry="SELECT * from merch_order WHERE s_id='$check'";
          $user_res=mysqli_query($conn, $user_qry);
          while($user_data=mysqli_fetch_assoc($user_res))
          {
          ?>
          <tr>
          <td><?php echo $sn; ?></td>
            <td><?php echo $user_data['merch_id']; ?></td>
            <td><?php echo $user_data['m_order_no']; ?></td>
            <td><?php echo $user_data['quantity']; ?></td>
            <td><?php echo $user_data['amount']; ?></td>
            <td><?php echo $user_data['date']; ?></td>
          </tr>
          <?php
          $sn++;
          }
          ?>
        </tbody>
      </table>
      <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>
      <div class="href">
        <a href="report.php">Back</a>
      </div>
    </div>
  </div>
</div>

        </main>