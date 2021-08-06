<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);
$date_now = date('d-m-y');


if(isset($_POST['aftercheckout'])){

$checkoutcustid = $_SESSION['cookcuid'];
$checkroomtype_id = $_SESSION['cookrtid'];
$checkroom_id = $_SESSION['cookcrid'];
$checkin = $_SESSION['cookrci'];
$checkout = $_SESSION['cookrco'];
$pax_no = $_SESSION['cookrpn'];
$price = $_SESSION['cookpr'];

$payment_id = $_SESSION['cookpid'];
$totalprice = $_SESSION['cooktp'];

echo $checkoutcustid;

$query1 = "INSERT into booked_room_service (cust_id, room_id, roomtype_id, checkin, checkout, price, total_price, payment_id, status) values ('$checkoutcustid', '$checkroom_id', '$checkroomtype_id', '$checkin', '$checkout', '$price', '$totalprice', $payment_id , '1')";

$bookedinsert = mysqli_query($con, $query1) or die(mysqli_error($con));

    if($bookedinsert){
    header("Location: index.php");
        
    }

}
// header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Booking</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <h2>Are you sure about this booking?</h2>

    <img src="..\images\Pilton.png.jpeg" alt="Company logo" style="width: 100%; max-width: 300px" />
    <form action="aftercheckoutcode.php" method="POST">
    <br><br>
    <label for="">Customer ID</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookcuid']?>"></input>
    
    <br>
    <label for="">Room Type ID</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookrtid']?>"></input>
    
    <br>
    <label for="">Room ID</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookcrid']?>"></input>
    <br>
    <label for="">Check In Date</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookrci']?>"></input>
    <br>
    <label for="">Check Out Date</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookrco']?>"></input>
    <br>
    <label for="">Number of People</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookrpn']?>"></input>
    <br>
    <label for="">Price/night</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookpr']?>"></input>
    <br>
    <label for="">Total Price</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cooktp']?>"></input>
    <br>
    <label for="">Payment ID</label>
    <input type="text" name="checkoutcust_id" style=" display:;" readonly value="<?php echo $_SESSION['cookpid']?>"></input>
    <br>
    <br>
    <button type="submit" name="aftercheckout" onclick="window.print();" class="btn btn-primary" id="print-btn"><a href="thankyoupage.php">Yes</a></button>
    <!-- <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button> -->
    <a href="rooms.php"><button>No</button></a>
    </form>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="..\images\Pilton.png.jpeg" alt="Company logo" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Invoice #: 123<br />
									Created: January 1, 2015<br />
									Due: February 1, 2015
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, TX 12345
								</td>

								<td>
									Acme Corp.<br />
									John Doe<br />
									john@example.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Your Details</td>

					<td></td>
				</tr>

				<tr class="details">
					<td>Name</td>

					<td></td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Website design</td>

					<td>$300.00</td>
				</tr>

				<tr class="item">
					<td>Hosting (3 months)</td>

					<td>$75.00</td>
				</tr>

				<tr class="item last">
					<td>Domain name (1 year)</td>

					<td>$10.00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: <?php echo $_SESSION['cooktp']?></td>
				</tr>
			</table>
		</div>
	</body>
</html>
