<?php
    include "header.php";
    include "includes/dbh.inc.php";

    
?>

<main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
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

.h1{
  text-align:center;
  margin-top: 20px;
  font-size:35px;
}

.a-btn {
  background-color: #2b7a78;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:10px;
  margin-left: 1250px;
}

.a-btn:hover{
    background-color: #095a5644;
    color: black;
    border-radius: 10px;

}
</style>

<div class="viewcart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["cart_session"]))
    {
	    $total = 0;
		
		echo '<form name="cart" method="POST" action="merchCheckout.php">';
		echo '<table class="tablesorter"cellspacing="0">';
			  echo   '<thead>';
		  echo '<tr>';
		  echo '<td>Product:</td>';
		  echo '<td>Quantity:</td>';
      // echo '<td>New Quantity:</td>';
		 echo ' <td>Description:</td>';
		  echo '<td>Price:</td>';
		  echo '<td>Action:</td>';
		  echo '</tr>';
		  echo '</thead>';
		  
    $date_now = date('d-m-y');
		$cart_items = 0;
		foreach ($_SESSION["cart_session"] as $cart_itm)
        {
       $Product_ID  = $cart_itm["code"];
		   $results = $conn->query("SELECT merch_name, merch_desc, price FROM merch  WHERE merch_id='$Product_ID'"); 
          if ($results) { 
		  
	        
			
          //fetch results set as object and output HTML
          while($obj = $results->fetch_object())
        {
			
      
		  echo '<tr class="cart-itm">';
			echo '<td name="name"><h3>'.$obj->merch_name.' </h3></td> ';
      echo '<td class="amount">Qty :<input type="number" name="product_qty" value="'.$cart_itm["TiradaProductTiga"].'" size="2"  onChange="updatePrice(this)"  maxlength="5" readonly/></td>';
      echo '<td>'.$obj->merch_desc.'</td>';
		  echo '<td class="cost" name="cost" style="color:green"><b>RM'.$obj->price.'</b></td>';
			echo '<td><span class="remove-check"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">Remove</a></span></td>';
            echo '</tr>';
			$subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
			$total = ($total + $subtotal);


			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->merch_name.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$Product_ID.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->merch_desc.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["TiradaProductTiga"].'"/>';
			$cart_items ++;
			      		    }}}

    
		echo '<span class="midigta"><a  class="a-btn" href="merchpage.php"><span class="a-btn-text">Continue Shopping</span></a></span>';
		echo '<span class="check-out-txt">';

    	echo '</table>';
		echo '<span> <h4 class="total" name="total">Total Payable: <big style="color:green">RM'.$total.'</big> </h4></span> ';
		
		// echo '<button type="submit" name="cart" > Proceed to Payment</button>';
		echo '</span>';
		echo '</form>'; 

   }else{        
		echo '<span class="wacwayn"><i>Your Cart is empty</i></span>';
	}
	
    ?>
    </div><br><br><br>

    <div class="row-checkout">
    <div class="col-75">
        <div class="container">
            <form action="m_checkout.inc.php" method="POST">
                <div class="row">                    
                    <div class="col-50">
                      <h3>Payment</h3>
                      <input value=<?php echo $user_data['cust_id']; ?>><br>
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
                    <label for="date">Date</label>
                    <input type="text"   name="date" value=<?php echo $date_now ?>>
                  </div>
                </div>

              </div>
              <input type="submit" value="Continue and Pay" name="payment" class="btn">
            </form>
        </div>
    </div>
</div>


<!-- <script>
  function updatePrice(obj) {
	var quantity = $(obj).val();
	var code = $(obj).data('code');
	queryString = 'action=edit&code=' + code + '&quantity=' + quantity;
	$.ajax({
		type : 'post',
		url : "ajax/handle-cart-ep.php",
		data : queryString,
		success : function(data) {
			$("#total").text(data);
		}
	});
}
</script> -->
</main>

