<?php 
require_once'dbcon.php';
if (!isset($_GET['order_id'])) {
	header("location:SellerRent.php");
}

function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}

	

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Payment Proof</title>
 	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 </head>

<style type="text/css">
	img{
		
		padding: 20px;
	}
	h3{
		text-align: center;
	}
	.container{
		display: flex;
		margin: auto;
		background: whitesmoke;
		margin-bottom: 50px;
	}
	.info{
		padding: 60px;
		font-size: 20px;
	}

	img{
		height: 50vh;
		width: auto;
	}

</style>

 <body>
 	<?php include('../includes/seller-navigation.php'); ?>
 	<h3>Proof of Payment</h3>7
 	<br><br>
 	<?php 
 	//proof of payment
	if (isset($_GET['order_id'])) {
		$id = $_GET['order_id'];
		$sql = $dbconnnect->query("SELECT product_name,total,order_time,account_name,account_email,proof FROM order_table WHERE order_id = '$id'");
		$proof = $sql->fetch_assoc();
		$dir = "../assets/Payment_proof/";

		?>
		<div class="container">

			<img src="<?php echo$dir.$proof['proof']; ?>">

			<div class="info">
				<b>Account Name: </b> <?php echo$proof['account_name']; ?> <br>
				<b>Account Email: </b> <?php echo$proof['account_email']; ?><br><br>
				
				<b>Item: </b> <?php echo$proof['product_name']; ?><br><br>

				<b  style="color:#FA502B; font-weight: bold;">Price: </b><span style="color:#FA502B; font-weight: bold;"> <?php $price = $proof['total']; $price = asDollars($price); echo$price; ?></span><br><br>
				<b style="color:red;">Paid</b>
				<br>

				<b>Time Paid: </b> <?php $time = $proof['order_time']; $timestamp = strtotime($time);$new_date = date('F d Y | H:i:sa' , $timestamp);  echo$new_date; ?><br>
				



			</div>

		</div>

		<?php
	}
 	 ?>
 <button style="
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		  margin-left: 47%;
		" onclick="window.print()">Print</button>
 </body>
 </html>