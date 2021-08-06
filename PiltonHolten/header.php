

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Landing Page</title>
        <link rel="stylesheet" type="text/css" href="nav.css" >
        <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
        
        <style>
            /*** shopping cart **/
/* .shopping-cart{
	width: 30%;
	float: left;
	background: #FFF;
	padding: 10px;
} */

.shopping-cart a.a-btnjanan{
    display: block;
    padding: 10px;

}

.shopping-cart h2 {
	background: #F0F7F2;
	padding: 8px;
	margin: -10px -10px 5px;
	font: 18px "Trebuchet MS", Arial;
}

.shopping-cart h3,.view-cart h3 {
	font-size: 12px;
	margin: 0px;
	padding: 0px;
}
.shopping-cart ol{
	padding: 1px 0px 0px 15px;
}
.shopping-cart .cart-itm, .view-cart .cart-itm{
	border-bottom: 1px solid #DDD;
	font-size: 11px;
	font-family: arial;
	margin-bottom: 5px;
	padding-bottom: 5px;
}
.shopping-cart .remove-itm, .view-cart .remove-itm{
	font-size: 14px;
	float: right;
	background: #F2F8F7;
	padding: 4px;
	line-height: 8px;
	border-radius: 3px;
}


.shopping-cart .remove-itm, .viewcart .remove-itm{
	font-size: 14px;
	float: right;
	background: #fff;
	padding: 4px;
	line-height: 8px;
	border-radius: 3px;
}


.viewcart .remove-check{
	font-size: 17px;
	float: right;
	background: grey;
	padding: 3px;
	line-height: 8px;
	border-radius: 3px;
}

.shopping-cart .remove-itm:hover, .view-cart .remove-itm:hover{
	background: #C4C4C4;
}

 
.check-out-txt{
	float:right;
	margin-top: 1%;
}

.midigta{
	float:left;
}

/*** view cart **/
.view-cart {
	width: 100%;
	float: left;
	background: #FFF;
	padding: 10px;
}
.view-cart .p-price{
	float: right;
	margin-right: 10px;
	font-size: 12px;
	font-weight: bold;
}
.view-cart .product-info{width:60%;}

.shopping_cart{
	float:left;
	width: 202px;
	position:relative;
	margin-left:15px;
	padding: 0 0 0 46px;
	background: url(../images/header_cart.png) 0 0 no-repeat;
	z-index: 99;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	cursor:pointer;
}
.cart{
	height: 38px;
	padding: 0 0 0 10px;
	background: #EDEDED;
	border: 1px solid #CECECE;
	border-left: none;
	line-height: 36px;
	-webkit-border-radius: 0 2px 2px 0;
	border-radius: 0 2px 2px 0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.shopping_cart .cart .opencart {
	width: 7px;
	height: 5px;
	display: block;
	background: url(../images/header_arrow.png) 0 0 no-repeat;
	position: absolute;
	right: 11px;
	top: 16px;
}
.shopping_cart span.cart_title{
	font-size:13px;
	font-weight:bold;
	color: #4F4F4F;
}
.shopping_cart span.no_product{
	font-size:13px;
	font-weight:bold;
	color: #DD0F0E;
}
.wrapper-dropdown.active .dropdown{
	border-bottom: 1px solid rgba(0, 0, 0, 0.2);
	max-height: 400px;
	width: 95px;
	z-index: 1;
	background: #70389C;
}
        </style>
    </head>

    <body>

    <header>
        <section class="topmenu">
        <nav>

            <a href="index.php"><img name="logo" src="images/Pilton.png.jpeg"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="event.php">EVENT</a></li>
                    <li><a href="merchpage.php">MERCHANDISE</a></li>
                    <li><a href="aboutus.php">ABOUT US</a></li>
                </ul>
            </div>

            <!-- pop up for the user icon -->
            <div class="user-dd" >
                <button class="userdropdown"><i class="fas fa-user"></i></button>
                <div class="user-dropdown-con">
                    
                    <p>User</p>
                    <a href="userProfile.php">Account</a>
                    <a href="logout.php">Log out</a>
                    <p>Seller</p>

                    <button onclick="document.getElementById('id01').style.display='block'" style="width: auto;">Seller login</button>
                    
                    <div id="id01" class="modal">
                        <form class="modal-content animate" action="includes/s_login.inc.php" method="post">
                        <div class="sl-container">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
                            <h3> Seller Login</h3>
                        </div>
                    
                        <div class="sl-container">
                            <label for="email"><b>Email Address</b></label>
                            <input type="text" placeholder="Enter email address" name="email" required>
                    
                            <label for="pwd"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="pwd" required>
                            
                            <button type="submit" name="login_submit" id="loginbtn" href="">Login</button>

                        </div>
                    
                        <div class="sl-container" style="background-color:#f1f1f1">
                            <button1 type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button1>
                        </div>
                        </form>
                    </div>

                    <a href="register.php">Request as a seller</a>
                </div>
            </div>

            <div class="user-dd" >
                <button class="userdropdown"><i class="fas fa-cart-arrow-down"></i></button>
                <div class="user-dropdown-con">
            <div class="shopping-cart"  id="cart" id="right" >
            <dl id="acc">	
            <dt class="active">								
            <p class="shopping" >Shopping Cart</p>
            </dt>
            <dd class="active" style="display: block;">
            <?php
            //current URL of the Page. cart_update.php redirects back to this URL
                $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

            if(isset($_SESSION["cart_session"]))
            {
                $total = 0;
                echo '<ul>';
                foreach ($_SESSION["cart_session"] as $cart_itm){
                    
                    echo '<li class="cart-itm">';
                    echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
                    echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
                    echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
                    echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
                    echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>RM'.$cart_itm["Qiimaha"].'</big></strong></div>';
                    echo '</li>';
                    $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
                    $total = ($total + $subtotal); 
                }
                echo '</ul>';
                echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >RM'.$total.'</big></strong>';
                echo' <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
            }else{
                echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
            }
            ?>

            </dd>
            </dl>
            </div>
        </div>
        </div>
        </div>
        </nav>
    </section>

    
    <!-- <script>
        // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick= function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script> -->


    </header>