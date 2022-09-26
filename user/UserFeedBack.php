<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
require_once'dbcon.php';
function myAlert($msg, $url) {
	 echo '<script language="javascript">alert("'.$msg.'");</script>';
	 echo "<script>document.location = '$url'</script>";
}
if (isset($_GET['shop_id'])) {
	$shop_id = $_GET['shop_id'];
	$user_id = $_GET['user_id'];
	$order_id = $_GET['order_id'];
	$username = $_GET['username'];
	$product = $_GET['product'];
}

if (isset($_POST['submit'])) {
	$shop_id = $_POST['shop_id'];
	$user_id = $_POST['user_id'];
	$star = $_POST['crating'];
	$feedback_mess = $_POST['feedback_mess'];
	$order_id = $_POST['order_id'];
	$username = $_POST['username'];
	$product = $_POST['product'];
	$Email = $_POST['email'];

	
	$com = $dbconnnect->query("INSERT INTO feedback_table(shop_id,user_id,rate,product,comment,username)VALUES('$shop_id','$user_id','$star','$product','$feedback_mess','$username')");
	

	if ($com) {
		//update order_table
		$sql = $dbconnnect->query("UPDATE order_table SET rate = '$star' WHERE order_id = '$order_id'");
		//email
		$to = $Email;
		$subject = "ARKIMORMA FEEDBACK";
		$message = "<html>
			<head>
			<title>FEEDBACK</title>
			</head>
			<body>
			<h2Feedback</h2>
			<h2>Comment to ".$username." ".$product."</h2>
			<h3>Rating. ".$star."</h3>	
			<pre>".$feedback_mess."</pre>

			
			

			</body>
			</html>";
		$headers = "From: arkimorma@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		mail($to, $subject, $message, $headers);
		//myAlert("Thank you for providing feedback","UserArkimormaShop.php");

		echo".";
		echo"<script>Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Thankyou for Feedback',
				  showConfirmButton: false,
				  timer: 1500
				}).then(function() {
			    window.location = 'UserArkimormaShop.php';
			});</script>";



	}else{
		echo "Failed";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rate Shop</title>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/checkout-style.css">
</head>
<style type="text/css">
.rate-area {
	 float:left;
	 border-style: none;
}

.rate-area:not(:checked) > input {
	 position:absolute;
	 top:-9999px;
	 clip:rect(0,0,0,0);
}

.rate-area:not(:checked) > label {
	 float: right;
	 width: .80em;
	 overflow: hidden;
	 white-space: nowrap;
	 cursor: pointer;
	 font-size: 40px;
	 line-height: 32px;
	 color: lightgrey;
	 margin-bottom: 10px !important;
}

.rate-area:not(:checked) > label:before {
	 content: '★';
}

.rate-area > input:checked ~ label {
	 color: orange;
	 text-shadow: none;
}

.rate-area:not(:checked) > label:hover,
.rate-area:not(:checked) > label:hover ~ label {
	 color: orange;
	 
}

.rate-area > input:checked + label:hover,
.rate-area > input:checked + label:hover ~ label,
.rate-area > input:checked ~ label:hover,
.rate-area > input:checked ~ label:hover ~ label,
.rate-area > label:hover ~ input:checked ~ label {
	 color: orange;
	 text-shadow: none;
	 
}

.rate-area > label:active {
	 position:relative;
	 top:0px;
	 left:0px; 
}

</style>
<body style="padding-top: 60px;">
	<?php 
	$com = $dbconnnect->query("SELECT shop_name,email,phone,country,region,province,city,barangay,postal_code,image,email FROM sellers WHERE shop_id = '$shop_id'");
	$row = $com->fetch_assoc();


	 ?>
	 <?php include('../includes/user-navigation.php'); ?>
	 <br>
	 <br>
	 <br>
	 <div class="container">
		<div class="row">
			<div class="col-xs-6">
				<img src="../assets/SellerAccountImages/<?php echo$row['image']; ?>" width="100%">
			</div>

			<div class="col-xs-6">
				<div class="form-group">
					<h3 class="text-left"><?php echo$row['shop_name'] ?></h3>
				</div>
				<div class="form-group">
					<h5 class="text-left">E-mail Address: <?php echo$row['email'] ?></h5>
				</div>
				<div class="form-group">
					<h5 class="text-left">Contact: <?php echo$row['phone'] ?></h5>
				</div>
				<div class="form-group">
					<h5 class="text-left">Address: <?php echo$row['barangay'] ?> <?php echo$row['city'] ?> <?php echo$row['province'] ?> <?php echo$row['region'] ?></h5>
				</div>

				<br>
				
				<form method="POST" action="UserFeedBack.php">
					<h4 class="text-left">Rate</h4>
					<h5>Are you satisfied?</h5>
					<div class="form-group">
						<input type="hidden" name="product" value="<?php echo$product?>">
						<input type="hidden" name="username" value="<?php echo$username?>">
						<input type="hidden" name="order_id" value="<?php echo$order_id?>">
						<input type="hidden" name="shop_id" value="<?php echo$shop_id ?>">
						<input type="hidden" name="user_id" value="<?php echo$user_id ?>">
						<input type="hidden" name="email" value="<?php echo$row['email']?>">

						<ul class="rate-area">
							<input type="radio" id="5-star" name="crating" value="5">
							<label for="5-star" title="Amazing">5 stars</label>
							<input type="radio" id="4-star" name="crating" value="4">
							<label for="4-star" title="Good">4 stars</label>
							<input type="radio" id="3-star" name="crating" value="3">
							<label for="3-star" title="Average">3 stars</label>
							<input type="radio" id="2-star" name="crating" value="2">
							<label for="2-star" title="Not Good">2 stars</label>
							<input type="radio" id="1-star" required="" name="crating" value="1" aria-required="true">
							<label for="1-star" title="Bad">1 star</label>
						</ul>
					</div>

					<div class="form-group">
						<textarea  name="feedback_mess" placeholder="Leave us comment" class="form-control" rows="5"  style="resize: none;"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
					</div>

					
				</form>
			</div>
		</div>
	</div>
<br><br><br><br><br>
	<?php include('../includes/footer.php'); ?>

	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
</body>
</html>