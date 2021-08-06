<?php
    include "header.php";
    include "includes/dbh.inc.php";
?>

<main>

<style>
    /*----------------------------------------------------------------------------------------Checkout form*/
.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 auto ;
  width: 600px;
  height: 706px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;

}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 10px;
  width: 700px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.row ~ label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #2b7a78;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 10px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #095a5644;
    color: black;
    border-radius: 10px;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }

}
.cartha input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.cartha input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.cartha input[type=submit]:hover {
  background-color: #45a049;
}

.cartha {
  border-radius: 5px;
  background-color: rgb(159, 194, 171);
  padding: 20px;
  margin-left:350px;
  margin-right:250px;
  text-align: center;
}

.cartha button {
  background-color: #04AA6D;
  color: white;
  border-radius: 10px;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

.cartha button:hover {
  opacity: 0.8;
}
</style>

<?php

  $orderno = $_GET['orderno'];

  $sql = mysqli_query($conn, "SELECT merch.merch_id, merch_order.merch_id, merch.merch_name, m_order_no, merch_order.quantity, amount FROM merch_order JOIN merch ON merch.merch_id=merch_order.merch_id WHERE m_order_no = $orderno") or die( mysqli_error($conn));

  while($row = mysqli_fetch_array($sql)){
?>


<div class="cartha">
  <h1>Confirmation</h1>
  <label for="">Merch Order Number:</label><br>
  <input type="text" name="orderno" value="<?php echo $row['m_order_no'] ;?>" readonly><br>
  <label for="">Merch Name:</label><br>
  <input type="text" value="<?php echo $row['merch_name'] ;?>" readonly><br>
  <label for="">Quantity:</label><br>
  <input type="text" value="<?php echo $row['quantity'] ;?>" readonly><br>
  <label for="">Total Price:</label><br>
  <input type="text" value="<?php echo $row['amount'] ;?>" readonly>

</div>




<div class="row-checkout">
    <div class="col-75">
        <div class="container">
            <form action="includes/m_checkout.inc.php" method="POST">
                <div class="row">                    
                    <div class="col-50">
                      <h3>Payment</h3>
                      <label for="fname">Accepted Cards</label>
                      <div class="icon-container">
                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                      </div>
                      <input type="hidden" name="orderno" value="<?php echo $row['m_order_no'] ;?>" >
                      <label for="date">Date</label>
                      <input type="text" id="date" name="date" value="<?php  $orgDate = "17-07-2012";   $newDate = date("Y-m-d", strtotime($orgDate));  echo "$newDate" ;?>" readonly>
                      <label for="cname">Name on Card</label>
                      <input type="text" id="cname" name="cname" placeholder="John More Doe">
                      <label for="ccnum">Credit card number</label>
                      <input type="text" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444">
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="01">

                  <div class="row">
                    <div class="col-50">
                      <label for="expyear">Exp Year</label>
                      <input type="text" id="expyear" name="expyear" placeholder="2018">
                    </div>
                    <div class="col-50">
                      <label for="cvv">CVV</label>
                      <input type="text" id="cvv" name="cvv" placeholder="352">
                    </div>
                  </div>
                </div>

              </div>
              <button type="submit" >Pay now</button>
              <!-- <input type="submit" value="Continue and Pay" name="payment" class="btn"> -->
            </form>
        </div>
    </div>
</div>


<?php } ?>


</main>