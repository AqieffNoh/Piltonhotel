<?php
// session_start();
include "connection.php";
include_once "header.php";
include "functions.php";

?>

<main>
<link rel="stylesheet" type="text/css" href="styles.css" >

<style>

h3{
    text-align: center;
}

.row{
    text-align: center;
    display: block;
}

.row~label{
  padding: 100px;
}

.label{
  margin: 0 auto;
  padding: 20px;
}


.row input[type=text]{
  width: 200px;
}

.editbtn{
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
    border-radius: 10px;
    margin-left: 45%;
}

.editbtn:hover{
    color: white;
    border-radius: 10px;

}

.editbtn a{
    color: black;
}


.divider{
    height: 5px;
    width: 100%;
    background-color: #2b7a78;
    background-position: center;
    background-size: contain;
    position: relative;
}

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
    padding-left: 20px;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #287A78;
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

<div class="divider">
</div>
	
<section>

<?php
  // include 'includes/dbh.inc.php';

    $user_data = check_login($con);
    $custid=$user_data['CustID'];
    $fname=$user_data['fname'];
    $lname=$user_data['lname'];

    $query=mysqli_query($con,"SELECT * FROM customer WHERE CustID='$custid'") or die(mysqli_error($con));
    $row=mysqli_fetch_array($query);
  ?>

<div class="col-xl-8 order-xl-1">
          

          <!-- user profile form -->
          <form class="userProfile" action="u_profileEdit.php" method="POST" enctype="multipart/form-data" id="displayProfile">

          <div name="customerID" style="display: none;">
                <label name="customerID">Customer ID</label>
                <textarea name=customerID>
                <?php
                  $user_data=['CustID'];
                ?> 
                </textarea>

          </div>  

                <div class="col-8">
                  <h3 id="head" class="mb-0">My account</h3>
                </div>
                
            <div class="card-body">
                <h3 id="head" class="heading-small text-muted mb-4">User information</h3>
                      
                  <div class="row">
                        <label class="label" for="firstname">First Name : 
                        <input type="text" id="firstname" name="firstname" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $fname?>" readonly> </label>
                        <label class="form-control-label" for="lastname">Last Name : 
                        <input type="text" id="lastname" name="lastname" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $lname?>" readonly></label>
                    </div>

                </div>

                <!-- Address -->
                <h3 id="head" class="heading-small text-muted mb-4">Contact Information</h3>
               
                <div class="row">
                        <label class="label" for="email">Email Address : 
                        <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="123@example.com" value="<?php echo $row['email']; ?>" > </label>
                      </div>

                      <div class="row">
                        <label class="label" for="email">Phone Number : 
                        <input type="phone" id="phone" name="phone" class="form-control form-control-alternative" placeholder="011-12345677" value="<?php echo $row['phone']; ?>" > </label>
                      </div>

                      <button type="submit" class="editbtn" name="update">Update</a></button>
                  </div>
                </div>
                </div>
              </form>
            </div>
</section>

<?php
if (isset($_POST['update'])){

$phone = $_POST['phone'];
$email = $_POST['email'];


$query="UPDATE customer SET email='$email', phone='$phone'  WHERE CustID ='$custid'";

$rows=mysqli_query($con,$query)or die(mysqli_error($con));

?>

<script type="text/javascript">
            alert("Update Successfull.");
            window.location = "userProfile.php";
</script>

<?php
// header("location: ../sellerprofile.php?msg=profileEdited");
// exit();

mysqli_close($con);
}
?>



</main>