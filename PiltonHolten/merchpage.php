<?php
    include ("includes/dbh.inc.php");
    include_once "header.php";
?>

<main>
<style>
    main{

box-sizing: border-box;

}

*, *::before, *::after{

  box-sizing: border-box;

}

*{
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif ;
  box-sizing: border-box;
}


.merchhead{
  height: 400px;
  width: 100%;
  background-image: linear-gradient(rgba(88, 92, 91, 0.7),rgba(36, 37, 39, 0.7)), url(images/souvenirs.png);
  background-position: center;
  background-size: cover;
  position: relative;
}

/* for seller registration button on the header */
.regis-seller-btn{
  display: inline-block;
  text-decoration: none;
  color: white;
  border: 1px solid white;
  border-radius: 20px;
  padding: 12px 34px;
  font-size: 14px;
  background: transparent;
  position: relative;
  cursor: pointer;
}

.regis-seller-btn:hover{
  border: 1px solid #2b7a78;
  background: #2b7a78;
  transition: 0.4s;
}


/* listing of merch */
.merchlist{
  /* margin-right: 10px; */
  padding: 1px 16px;
  height: 100%;
  padding-top: 10px;
  padding-left: 50px;
  width: 100%;
  margin: auto;
  text-align: center;
  display: flex;
  flex-wrap: wrap;
}



.sidebar {
  float: center;
  width: 100%;
  height: 100%;
  padding: 20px 0;
  margin: 0;
  display: inline;
  text-align: center;
}


.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #136d68;
  display: block;
}

.sidebar a:hover {
  color: #3aafa9;
}



@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

.card-flex-container{
/* display: inline-block; */
  display: flex;
  flex-flow: row wrap;
  align-items: center;
  justify-content: center;
  width: 1000px;
  margin: 0 auto;
  gap: 5px;
  clear:both;
}

/* .card-flex-container::after {
  content: "";
  clear: both;
  display: table;
} */

.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
max-width: 300px;
/* width: 300px; */
float: left;
  width: 33.33%;
  padding: 5px;
height: 539;
/* margin-left: 100px; */
margin: 35px;
text-align: center;
font-family: arial;
}

.card-img{
max-width: 300px;
max-height: 300px;
margin: none;
}

.card img{
  width: 100%;
}

.card p:last-of-type{ /*------------just added----------------*/
padding: 0 5% 10px;
}

.card-info > h1{
  height: 80px;
  margin: 0;
}

.price {
color: grey;
font-size: 22px;
margin: 0;
padding-top: 0%;
padding-bottom: 0%;
}

.card button {
border: none;
outline: 0;
padding: 12px;
color: white;
background-color: #000;
text-align: center;
cursor: pointer;
width: 100%;
font-size: 18px;
}

.card button:hover {
opacity: 0.7;
}

</style>

<link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>

<section class="merchhead">
<div class="text-box">
    <h1>Find Out More Interesting Stuff</h1>
    <p>Get yourself and your family a few memorable gift<br>Which able to recall back those days satying with Pilton</p>  
    <a href="register.php" class="regis-seller-btn">Join us become a seller !</a> 
</div>
</section>

<!-- <section class="merchlist"> -->
<div class="merchlist">
<?php
include "searchBar.php";
?>
</div> 

<section class="wholeside" style="background-color:#DEF2F1;">
<div class="sidebar">
<h1>Categories</h1>
  
        <?php
        $sql = mysqli_query($conn, "SELECT * FROM merch_category");
        ?>

        <ul class="nav-nav-list">

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
        
</ul>
</div>
</section> 

<section>
<div>
    <br>
        <h2 style="text-align:center">Merchandise <br>All Items</h2>


        
    <?php
	      $result = mysqli_query($conn,"SELECT * FROM merch ORDER BY merch_id ASC");
          if ($result) { 
          
              //fetch results set as object and output HTML
              while($row = mysqli_fetch_array($result))
              {

    ?>
      <!-- <div class="card-flex-container"> -->
                <div class="card">
                    <div class="card-img">
                    <img src="seller/images/<?php echo $row['picture'];?>" alt="Merch Image"  height='250px'>
                    </div>
                    <div class="card-info">
                    <h1 style="font-size:20px;"><?php echo $row['merch_name']; ?></h1>
                    <p class="price">RM <?php echo ($row['price']); ?></p>
                    <button ><a href="product.php?product=<?php echo $row['merch_name']; ?>" style="color: white;">Details</a></button>
                    <input type="hidden" name="Product_ID" value=<?php echo $row['merch_id'];?> >
                    <input type="hidden" name="type" value="add" >
                    <input type="hidden" name="return_url" value="'.$current_url.'" >
                    </div>
                </div>  
                </div>
              <!-- </div> -->
    <?php
              }
          }
    ?>
          
        </div>       

        </section>
</main>


