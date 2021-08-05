<?php
  session_start();
    include "includes/dbh.inc.php";
?>
<main>

<meta charset="utf-8" />
<title>Merch Invoice Printing</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<style>
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

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

            @page
            {
            size:A4;
            margin: 0;
            }
            #print-btn
            {
            display: none;
            visibility: none;
            }

            .btn{
                margin-top: 20px;
                margin-left: 45%;
                display: block;
                background: #62b86e;
                border-radius: 5px;
                width: 115px;
                height: 25px;
                cursor: pointer;
                font-weight: bold;
            }
		</style>

    <?php 
    if(isset($_POST['generate'])){
        $m_order=$_POST['m_order'];
    }

    $sql= mysqli_query($conn, "SELECT * FROM merch_order WHERE m_order_no='$m_order'");
    $row=mysqli_fetch_array($sql);
    ?>

		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="images/Pilton.png.jpeg" style="width: 90%; max-width: 200px" />
								</td>

								<td>
									Order Number: <?php echo $row['m_order_no']?>
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
									Pilton Hotel.<br />
									Jalan Nountun, Inanam,<br />
									Kota Kinabalu, Sabah, 88450
								</td>

								<td>
									Customer ID: <?php echo $row['CustID']?><br />
									Payment Date: <?php echo $row['date']?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>Card #</td>
				</tr>

				<tr class="heading">
					<td>Merchandise ID</td>

					<td>Quantity</td>
				</tr>

				<tr class="item">
					<td><?php echo $row['merch_id']?></td>

					<td><?php echo $row['quantity']?></td>
				</tr>

				</tr>

				<tr class="total">
					<td></td>

					<td>Total: RM<?php echo $row['amount']?></td>
				</tr>
			</table>
            <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
            </div>
        
      
</main>