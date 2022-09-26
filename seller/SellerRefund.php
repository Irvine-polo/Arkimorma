
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Order Refund</title>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script src="https://www.paypal.com/sdk/js?client-id=AaEgvgkM2BGwlHPR-VaWFLdbGpeltImjrhXfQ3a8SlRnnFX5CLZcw7rBDGJolxmwjcD9ujCG1QlewoJQ"></script>
	 <?php include('../includes/seller-navigation.php'); ?>
 <?php 
 require_once'dbcon.php';
 if (isset($_GET['accept_req'])) {
 	$id = $_GET['accept_req'];
 	$sql_product = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$id'");
 	$product = $sql_product->fetch_assoc();
 }
function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}






if (isset($_POST['refund'])) {
	$target = "../assets/Payment_proof/" .basename($_FILES['proof']['name']);
	$image = $_FILES['proof']['name'];

	

	$refund_id = $_POST['order_id'];
	//$update = $dbconnnect->query("UPDATE order_table SET refund_proof = '$image' WHERE order_id = '$refund_id'");
if (move_uploaded_file($_FILES['proof']['tmp_name'], $target)) {
				$msg = "Image upload";
				}
			else{
				$msg = "Error";
				}

	header("location:../includes/UserOrderDel.php?refund=".$refund_id."&image=".$image."");
}
  ?>
<!DOCTYPE html>
<html>
<head>
	
</head>
<style type="text/css">
	img{
		height: 50vh;
		width: auto;
	}
	.container {
		text-align: center;
		margin-bottom: 60px;
		font-family: sans-serif;
	}
	#uploadpic{
		margin-left: 40%;
	}
</style>
<body>
	<div class="container" style="background: whitesmoke;">
		<h3>Payment Refund </h3>
		<br>	<br>	<br>
		<div>
			<img src="../assets/Multiple_product_image/<?php echo $product['image']; ?>" >
		</div>

		<div>
			
			<p><?php echo$product['product_name'] ?></p>
			<p>TO: <?php echo$product['cust_name'] ?></p>
			<p>Email: <?php echo$product['cust_email'] ?></p>
			<p><?php $price = $product['total']; $price = asDollars($price); echo$price; ?></p>
			<span id ="myspan"></span>
				<!---- paypal   ----->
				<?php 
		
				$total = $product['total'];
	
				?>
				<script>
					
					var	value =<?php echo"$total"; ?>;
							

							paypal.Buttons({
								createOrder: function(data, actions){
									
									return actions.order.create({
										purchase_units:[{
											amount:{
												value: value
											}
										}]
									})
								},
								onApprove: function(data, actions){
									console.log('Data:' +data);
									console.log('Action' +actions);
									return actions.order.capture().then(function(details){
										console.log(details);

									})
								}
							}).render('#paypal-button-container');
				</script>
				<form action="SellerRent.php" method="POST" enctype="multipart/form-data">
				<!--------------payment form  ------------------->
				<div id="payment_form" >
					
					<input type="hidden" name="order_id" value="<?php echo$id ?>">
						<b>Proof of payment:</b> <br><br> <input required id="uploadpic" type="file" name="proof" ><br><br>
					

						<div id="paypal-button-container"></div>
					
				</div>

				<input type="submit" name="refund" value="submit" class="btn btn-sm btn-primary">

			</form>

	

		</div>

	</div>

	
</body>
</html>