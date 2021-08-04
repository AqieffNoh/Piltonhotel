<?php
    include "header.php";
    include "includes/dbh.inc.php";
?>

<main>

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
</style>

<div class="viewcart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["cart_session"]))
    {
	    $total = 0;
		
		echo '<form method="post" action="cart_update.php">';
		echo '<table class="tablesorter"cellspacing="0">';
			  echo   '<thead>';
		  echo '<tr>';
		  echo '<td>Check:</td>';
		  echo '<td>Product:</td>';
		  echo '<td>Quantity:</td>';
		 echo ' <td>Description:</td>';
		  echo '<td>Price:</td>';
		  echo '<td>Action:</td>';
		  echo '</tr>';
		  echo '</thead>';
		  
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
            echo '<td><input type="checkbox"></td>';
			echo '<td><h3>'.$obj->merch_name.' (Code :'.$Product_ID.')</h3></td> ';
            echo '<td class="p-qty">Qty :<input type="text" name="product_qty" value="'.$cart_itm["TiradaProductTiga"].'" size="2"   maxlength="5" /></td>';
            echo '<td>'.$obj->merch_desc.'</td>';
		    echo '<td class="p-price" style="color:green"><b>RM'.$obj->price.'</b></td>';
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

    
		echo '<span class="midigta"><a  class="a-btn" href="products.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Continue Shopping</span></a></span>';
		echo '<span class="check-out-txt">';

    	echo '</table>';
		echo '<span> <h4 class="pricewayn">Total Payable: <big style="color:green">RM'.$total.'</big> </h4></span> ';
		
		echo '<span class="midigta"> <a  class="a-btn" href="Somstore checkout/process.php"> <span class="a-btn-text"> Proceed to Payment:</span></a></span>';
		echo '</span>';
		echo '</form>'; 

   }else{        
		echo '<span class="wacwayn"><i>Your Cart is empty</i></span>';
	}
	
    ?>
    </div><br><br><br>



</main>