<?php

    include "header.php";
    include "connection.php";
    include "functions.php";

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

<div class="viewcart">
<?php
  $user_data = check_login($con);
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["cart_session"]))
    {
	    $total = 0;
		
		echo '<form name="cart" method="POST" action="proceedPayment.php">';
		echo '<table class="tablesorter"cellspacing="0">';
    ?>

    <input style="display: none;" name="custid" value=<?php echo $user_data['CustID']; ?>>

    <input style="display: none;" type="text" id="m_order_no" name="m_order_no" value="<?php echo rand(10000,50000);?>" readonly>
    
    <input style="display: none;" type="text" id="date" name="date" value="<?php  $orgDate = "17-07-2012";   $newDate = date("Y-m-d", strtotime($orgDate));  
    echo "$newDate" ;?>" readonly>
    <h1>My Cart</h1>
    <p>*Please note that you can only purchase 1 product at once</p>
    <?php
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
		  
    $date_now = date('YYYY-MM-DD');
		$cart_items = 0;
		foreach ($_SESSION["cart_session"] as $cart_itm)
        {
       $Product_ID  = $cart_itm["code"];
		   $results = $con->query("SELECT s_id, merch_name, merch_desc, price FROM merch  WHERE merch_id='$Product_ID'"); 
          if ($results) { 

          //fetch results set as object and output HTML
          while($obj = $results->fetch_object())
        {
			
      
		  echo '<tr class="cart-itm">';
			echo '<td name="name"><h3>'.$obj->merch_name.' </h3></td> ';
      echo '<td class="amount">Qty :<input type="number" name="product_qty" value="'.$cart_itm["TiradaProductTiga"].'" size="2" maxlength="5" readonly/></td>';
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

      echo '<input style="display: none;" type="text" name="s_id" value='.$obj->s_id.'>';
      echo '<input style="display: none;" type="text" name="merch_id" value='.$Product_ID.'>';
      echo '<input style="display: none;" type="text" name="totalprice" value='.$total.'>';
			      		    }}}

    
		echo '<span class="midigta"><a  class="a-btn" href="merchpage.php"><span class="a-btn-text">Continue Shopping</span></a></span>';
		echo '<span class="check-out-txt">';

    	echo '</table>';
		echo '<span> <h4 class="total" >Total Payable: <big style="color:green">RM'.$total.'</big> </h4></span> ';

    ?>

		<?php
		echo '<button class="a-btn" type="submit" name="cart" > Proceed to Payment</button>';
		echo '</span>';
		echo '</form>'; 

   }else{        
		echo '<span class="wacwayn"><i>Your Cart is empty</i></span>';
	}
    ?>
    </div><br><br><br>



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

<?php
   
    include_once "footer.php";
?>
