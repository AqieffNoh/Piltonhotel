<?php
    include_once "header.php";
    include_once "includes/dbh.inc.php";
?>

<main>
<style>
    .display {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
.display td, .display th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
.display tr:nth-child(even){background-color: #f2f2f2;}
  
.display tr:hover {background-color: #ddd;}
  
.display th {
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
  </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <h1>Merch Order Report</h1>
<table id="table-id" class="display" cellspacing="45">
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
          $user_qry="SELECT * from merch_order";
          $user_res=mysqli_query($conn,$user_qry);
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

      <div class="href">
        <a href="reportPrint.php" class="btn btn-primary">Generate</a>
      </div>
      </div>
  </div>
</div>



</main>	







<?php
    include_once "footer.php";
?>


