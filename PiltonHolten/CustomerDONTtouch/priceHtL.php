<?php
    include ("includes/dbh.inc.php");
    include_once "header.php";
?>


<main>
<link rel="stylesheet" type="text/css" href="merchpage.css" >
<link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
<section class="merchhead">
<div class="text-box">
    <h1>Find Out More Interesting Stuff</h1>
    <p>Get yourself and your family a few memorable gift<br>Which able to recall back those days satying with Pilton</p>  
    <a href="register.php" class="regis-seller-btn">Join us become a seller !</a> 
</div>
</section>

<div class="merchlist">
<?php
include "searchBar.php";
?>
</div>

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

        <h1>Back</h1>
        <a class="active" href="merchpage.php">All items</a>
</ul>
</div>
</section>



<div><br>
<h2 style="text-align:center">Price: High - Low</h2>


<?php

        $sql = mysqli_query($conn, "SELECT * FROM merch ORDER BY price DESC");

                while ($row =mysqli_fetch_array($sql)){
?>

<div class="card">
                    <img src="seller/images/<?php echo $row['picture'];?>" alt="Merch Image" width='100%' height='250px'>
                    <h1><?php echo $row['merch_name']; ?></h1>
                    <p class="price">RM <?php echo ($row['price']); ?></p>
                    <p><button><a href="product.php?product=<?php echo $row['merch_name']; ?>" style="color: white;">Details</a></button></p>
                    <input type="hidden" name="Product_ID" value=<?php echo $row['merch_id'];?> >
                    <input type="hidden" name="type" value="add" >
                    <input type="hidden" name="return_url" value="'.$current_url.'" >
                </div>  

<?php
                }
            
            ?>

</div>
    </div>
</section>

</main>