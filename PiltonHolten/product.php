<?php
    include ("includes/dbh.inc.php");
    include_once "header.php";

    // session_start();
// require_once ('./php/component.php');

?>


<main>
<link rel="stylesheet" type="text/css" href="merchpage.css" >
<link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

<section style="background-color:#DEF2F1">
<div class="sidebar">
<h1>Categories</h1>
  
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM merch_category");
        ?>

        <ul class="nav nav-list">

        <?php while($row = mysqli_fetch_assoc($sql)){ ?>
            
        
            <li>
                <a class="active" href="category.php?category=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
            </li>
        <?php } ?>

        <h1>Price Range</h1>
        <li>
            <a class="searchByprice" href="priceLtH.php">Price low to high</a>
        </li>
        <li>
            <a class="searchByprice" href="priceHtL.php">Price high to low</a>
        </li>

        <a class="active" href="merchpage.php">All items</a>
</ul>
</div>
</section>

<?php

if( isset($_GET['product']) ) {

    $merch = $_GET['product'];


        $stmt = mysqli_query($conn, "SELECT merch_id, merch.s_id, s_name, category_name, merch_name, merch_desc, picture, price FROM merch INNER JOIN seller_acc ON seller_acc.s_id=merch.s_id INNER JOIN merch_category ON merch_category.category_ID=merch.category_ID WHERE merch_name= '$merch'");

        while ($product = mysqli_fetch_array($stmt)) {

            ?>

            <!-- Main content -->
            <section class="content">
              <div class="row">
                  <div class="col-sm-9">
                      <div class="callout" id="callout" style="display:none">
                          <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                          <span class="message"></span>
                      </div>
                      <div class="row">
                          <div class="col-sm-6">
                              <img src="<?php echo (!empty($product['picture'])) ? 'seller/images/'.$product['picture'] : 'images/noimage.png'; ?>" width="250" height="250" class="zoom" data-magnify-src="seller/images/large-<?php echo $product['picture']; ?>">
                              <br><br>
                              <form class="form-inline" id="productForm" method="POST">
                                  <div class="form-group">
                                      <div class="input-group col-sm-5">
                                          
                                          <input type="hidden" value="<?php echo $product['merch_id']; ?>" name="merch_id">
                                          <input type="hidden" value="<?php echo $product['s_id']; ?>" name="s_id">
                                          <button type="submit" name="add" class="btn btn-primary btn-lg btn-flat"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div class="col-sm-6">
                              <h1 class="page-header"><?php echo $product['merch_name']; ?></h1>
                              <h3><b>&#36; <?php echo number_format($product['price'], 2); ?></b></h3>
                              <p><b>Category:</b> <a href="category.php?category=<?php echo $product['category_name']; ?>"><?php echo $product['category_name']; ?></a></p>
                              <p><b>Seller:</b> <a href="sellerMerch.php?seller=<?php echo $product['s_name']; ?>"><?php echo $product['s_name']; ?></a></p>
                              <p><b>Description:</b></p>
                              <p><?php echo $product['merch_desc']; ?></p>
                          </div>
                      </div>
                  </div>
              </div>
            </section>

<?php

// mysqli_close($conn);
            }
        }
?>


<?php
if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "merch_id");

        if(in_array($_POST['merch_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'merch_id' => $_POST['merch_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'merch_id' => $_POST['merch_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php include 'includes/scripts.inc.php'; ?>
<!-- <script>
$(function(){
	$('#add').click(function(e){
		e.preventDefault();
		var quantity = $('#quantity').val();
		quantity++;
		$('#quantity').val(quantity);
	});
	$('#minus').click(function(e){s
		e.preventDefault();
		var quantity = $('#quantity').val();
		if(quantity > 1){
			quantity--;
		}
		$('#quantity').val(quantity);
	});

});
</script> -->


</main>