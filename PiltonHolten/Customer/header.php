<?php
    // session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title>Landing Page</title>
        <link rel="stylesheet" type="text/css" href="nav.css" >
        <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
    </head>

    <body>

    <header>
        <section class="topmenu">
        <nav>

            <a href="index.php"><img name="logo" src="images/Pilton.png.jpeg"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="">ROOMS</a></li>
                    <li><a href="">TRAVEL</a></li>
                    <li><a href="">ABOUT US</a></li>
                    <li><a href="merchpage.php">MERCHANDISE</a></li>
                </ul>
            </div>

            <!-- pop up for the user icon -->
            <div class="user-dd" >
                <button class="userdropdown"><i class="fas fa-user"></i></button>
                <div class="user-dropdown-con">
                    <p>User</p>
                    <a href="">Log in</a>
                    <a href="">Sign up</a>
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

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
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