<?php
    session_start();
    include ("includes/dbh.inc.php");
    include ("includes/merchUpdate.inc.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <title>Merchandise Page</title>
    <link rel="stylesheet" type="text/css" href="style.css" >
    <link rel="stylesheet" href=https://pro.fontawesome.com/releases/v5.10.0/css/all.css>
</head>

<body>

<section class="topmenu">
    <nav>
        <a href="index.php"><img name="logo" src="images/s_logo.png"></a>
        <div class="nav-links">
            <ul>
                <!-- <li><a href="">HOME</a></li> -->
                <li id="this"><a href="managemerch.php">MANAGE MERCHANDISE</a></li>
                <li><a href="merchorder.php">ORDER</a></li>
                <li ><a href="report.php">REPORT</a></li>
                <!-- <li><a href="merchpage.php">MERCHANDISE</a></li> -->
            </ul>
        </div>


<!-- pop up for the user icon -->
        <div class="user-dd" >
            <button class="userdropdown"><i class="fas fa-user"></i></button>

            <div class="user-dropdown-con">
                <!-- <p> Welcome! </p> -->
                <a href="sellerprofile.php">Profile</a>
                <a href="includes/s_logout.inc.php">Log out</a>
            

            </div>
        </div>
</section>

<div class="header">
</div>

<section id="main" class="column">

    <?php
    $update=$_GET['update'];
    $result = mysqli_query($conn,"SELECT * FROM merch where merch_id ='$update'");
    ?>
    <?php if($row = mysqli_fetch_array($result))
      {?> 
      
        
        <div id="form_wrapper" class="form_wrapper">
        
        <table>
            <form class="register active" action="includes/merchUpdate.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    
            <th colspan="3"><h2>UPDATE MERCHANDISE:</h2> </th> 
                            
            <input type="hidden" id="ID" name="ID" value="<?php echo $row['merch_id'];?>"  placeholder="ID" required>
            <!-- <span class="error">This is an error</span> -->
        
       <tr>
        <td>  
          <label> Merch Name: </label>
            
            <input type="text" id="name" name="name" value="<?php echo $row['merch_name'];?>"  placeholder="Merchandise Name" required>
            <!-- <span class="error">This is an error</span> -->
        </td>

        <td>  
            <label>Price:</label>
      
            <input type="text" id="price" name="price" value="<?php echo $row['price'];?>"  placeholder="Price" required>
        <!-- <span class="error">This is an error</span> -->
        </td>
      </tr>

      <tr>
        <td>   
            <label> Quantity: </label>

            <input type="text" id="quantity" name="quantity" value="<?php echo $row['quantity'];?>" placeholder="Quantity" required>
        <!-- <span class="error">This is an error</span> -->
        </td>

        <td>   
        <label> Category Name: </label>
    
            <!-- <input type="text" id="cname" name="cname" value="<?php echo $row['category_ID'];?>" placeholder="User name" required> -->
            <?php
            include('includes/dbh.inc.php');
            $name= mysqli_query($conn,"SELECT * FROM merch_category");
    
            echo '<select  name="cname"  id="ml" class="ed">';
            echo '<option selected="selected">Select</option>';
            while($res= mysqli_fetch_assoc($name))
            {
            
            echo '<option value="'.$res['category_ID'].'" '.($row['category_ID'] == $res['category_ID'] ? "selected" : '').'>';
            echo $res['category_name'];
            echo'</option>';
            }
            echo'</select>';
            ?>
            <!-- <span class="error">This is an error</span> -->
        </td>
       </tr>
       
       <tr>
         <td>   
    
            <label>Description:</label>
            <textarea name="desc" id="desc" cols="25" rows="3" placeholder="Merch description" required><?php echo $row['merch_desc'];?></textarea>
            <!-- <span class="error">This is an error</span> -->
         </td>
       </tr>
       
       
        <tr>
          <td>   
    
            <label> Picture:</label>
            <input type="file" name="picture" id="picture"  value="<?php echo $row['picture'];?>" required><br>
            <label>Merch picture:</label>
            <img src="images/<?php echo $row['picture']; ?> " width="60" height="60">
            <!-- <span class="error">This is an error</span> -->
    
          </td>
       </tr>
    
                <div class="bottom">
    
                    <td colspan="3">		
                        <button type="submit"  name="updateMerch" value="Update" class="a-btn"> <span class="a-btn-text">Update Product</span></button>
                    </td>
                                
                <div class="clear"></div>
                </div>
    
        </form>
                        
        </table>
        </div>
             <?php }?>
    
        
            
            <article class="module width_3_quarter">
            
            
            </article><!-- end of content manager article -->
            
        </section>
              </div>
       </div>

</body>
</html>