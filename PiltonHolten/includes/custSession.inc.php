<?php
	include 'dbh.inc.php';
	session_start();

	if(isset($_SESSION['s_id'])){
		header('location: seller/index.php');
	}

	if(isset($_SESSION['Cust_ID'])){

		try{
			$stmt = $conn->prepare("SELECT * FROM customer WHERE Cust_ID=:id");
			$stmt->execute(['id'=>$_SESSION['Cust_ID']]);
			$user = $stmt->fetch();
		}
		catch(Exception $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		mysqli_close($conn);
	}