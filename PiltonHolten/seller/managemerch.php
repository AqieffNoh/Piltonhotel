<?php
    include ("includes/dbh.inc.php");
    include "header.php";
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

<div class="header">
</div>

<!-- addmerch -->
<section>
<div id="addproduct" class="addproduct">

		 <table>
			<form class="register active"  action="includes/addmerch.inc.php" method="POST" enctype="multipart/form-data" id="myForm">

			
            <div name="s_ID" style="display: none;">
                <label name="s_ID">seller ID</label>
                <textarea name=sellerID>
                <?php
                    // include_once 'includes/dbh.inc.php';
                    // session_start();
                    $check=$_SESSION["s_id"];
                    $session=mysqli_query($conn, "SELECT s_id FROM seller_acc where s_id='$check' ");
                    while($res= mysqli_fetch_assoc($session))
                    {
                    echo $res['s_id'];
                    }
                ?> 
                </textarea>
          </div>  

          <th colspan="2"><h2>ADD MERCHANDISE:</h2> </th> 
    <tr>

        <td>  
            <label> Merch Name: </label>
            <input type="text"  name="name"  id="model"  required> 
            <span id="pass-info"> <span>                         
        </td>

        <td> 
            <label> Price:</label>
            <input type="text"  name="price"  id="price"  style="text-align: right"  required>
            <span id="pass-info"> </span>    
        </td>
    </tr>

    <tr>
        

        <td>
            <label> Quantity:</label>
            <input type="text" name="quantity" id="type"  required>
            <span id="pass-info"> </span>  
        </td>
    
        <td>   
        <label>Category:</label>
            <?php
            include 'includes/dbh.inc.php';
            $name= mysqli_query($conn,"SELECT * FROM merch_category");

            echo '<select  name="cate"  id="ml" class="ed">';
            echo '<option selected="selected">Select</option>';
            while($res= mysqli_fetch_assoc($name))
            {

            echo '<option value="'.$res['category_ID'].'">';
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
        <textarea rows = "3" cols = "60" name = "desc" placeholder="Enter merchandise details here..."></textarea>
        <span id="pass-info"> </span>
        </td>
    </tr>
                   
    <tr>
        <td>   
        <label> Picture:</label>
        <input type="file" name="picture" id="picture"  required>
        <!-- <span class="error">This is an error</span> -->
        </td>
    </tr>

    <div class="bottom">
        <td colspan="3">	
		<button name="save" id="savebtn" title="Click to Save"  class="a-btn" > <span class="a-btn-text" onclick="saveMerch()"> Add Product</span></</button>
		<div class="clear"></div>
		</div>
        </td>
            </form>
	    </table>

        <script type="text/javascript">
            function saveMerch() {
                alert("1 Product have successfully added!");}
		</script> 
</section>

<div class="header">
</div>

<!-- view and edit merch -->
<section>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM merch where s_id='$check'");
    ?>

<h1 class="h1">Merchandise List</h1>
    <div id="tab1" class="tab_content">
    <table class="tablesorter" cellspacing="45"> 

            <thead>
                </tr>
                <th> Check </th> 
                <th> Merch Name </th>			  
                <th> Category </th>
                <th> Price </th>				
                <th> Quantity </th>				
                <th> Description </th>				
                <th> Picture </th>
                <th> Actions </th>
                </tr>
            </thead>
            <tbody>
           
</tbody>

<?php while($row = mysqli_fetch_array($result))
    {?>

    <tr>
        <td><input type="checkbox"></td>
        <td><?php echo $row['merch_name']; ?></td>
        <td><?php echo $row['category_ID']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?Php echo $row['quantity']; ?></td>
        <td><?php echo $row['merch_desc']; ?></td>
        <td> <img src="images/<?php echo $row['picture']; ?> " width="70" height="70"></td>
        <td> <a href="merchUpdate.php?update=<?php echo $row['merch_id']; ?>"  onClick="edit(this);" title="empEdit" >  <i class="fas fa-edit" title="Edit"></i> </a>
        <a href="includes/merchDelete.inc.php?delete=<?php echo $row['merch_id']; ?>" onClick="del(this);" title="Delete" class="delbutton">
        <i class="fas fa-trash-alt" title=delete></i></a></td>
    </tr>

  <?php }mysqli_close($conn);?>


  <!-- message for delete merch -->
  <script src="js/jquery.js"></script>
  <script type="text/javascript">
        $(function() {

        $(".delbutton").click(function(){

        //Save the link in a variable called element
        var element = $(this);

        if(confirm("Are you sure to delete this product?"))
                {

                $.ajax({
                type: "GET",
                url: "/includes/merchDelete.inc.php",
                data: info,
                success: function(){
                } });
                $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
                .animate({ opacity: "hide" }, "slow");

        }

        return false;

        });

        });
</script>
</tbody>
</table>  
 </div> 

 
</section>

    </main>

<?php
    include_once "footer.php";
?>