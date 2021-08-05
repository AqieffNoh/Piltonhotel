<?php
    include "header.php";

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
</style>

<?php
if(isset($_POST['cart']));

$mname = $_POST['name'];
$mqty = $_POST['product_qty'];
$mprice = $_POST['cost'];
$mid = $_POST['iteam_code'];
$total = $_POST['total'];
$pdate = $_POST['date'];


 echo $user_data['fname'];
?>
<div>
<h1><?php echo $mname ?></h1>
<h1><?php echo $mqty ?></h1>
<h1><?php echo $mprice ?></h1>
<h1><?php echo $total ?></h1>
<h1><?php echo $pdate ?></h1>



<div class="row-checkout">
    <div class="col-75">
        <div class="container">
            <form action="m_checkout.inc.php" method="POST">
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
                      <label for="m_order_no">Merch order no</label>
                      <input type="text" id="m_order_no" name="m_order_no" value="<?php echo rand(10000,50000);?>" readonly>
                      <label for="cname">Name on Card</label>
                      <input type="text" id="cname" name="cname" placeholder="John More Doe">
                      <label for="ccnum">Credit card number</label>
                      <input type="text" id="ccnum" name="ccnum" placeholder="1111-2222-3333-4444">
                      <label for="expmonth">Exp Month</label>
                      <input type="text" id="expmonth" name="expmonth" placeholder="September">

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
              <input type="submit" value="Continue and Pay" name="payment" class="btn">
            </form>
        </div>
    </div>
</div>





</main>