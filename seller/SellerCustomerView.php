
<?php 

require_once'dbcon.php';
if (isset($_GET['cust_id'])) {
	$cust_id = $_GET['cust_id'];
	$sql = $dbconnnect->query("SELECT * FROM user WHERE user_id = '$cust_id'");
	$row = $sql->fetch_assoc();
}

if (isset($_GET['chat'])) {
	$cust_id = $_GET['chat'];
	$shop_id = $_GET['shop'];
	$username = $_GET['username'];

	$check_exist = $dbconnnect->query("SELECT * FROM user_con WHERE user_id = '$cust_id' AND username = '$username' AND shop_id = '$shop_id'");
	$exist = mysqli_num_rows($check_exist);
	if ($exist == 0) {
		$insert = $dbconnnect->query("INSERT INTO user_con(user_id,username,shop_id)VALUES('$cust_id','$username','$shop_id')");

		?>
		 	<script>window.location="SellerChatIndex.php";</script>
		 <?php
	
	}
	else{
		?>
		 	<script>window.location="SellerChatIndex.php";</script>
		 <?php
			

	}

	
}

include('../includes/seller-navigation.php'); 
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo$row['username']; ?> | Information</title>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
    

</head>
<style type="text/css">
	.userimage img{
		width: 250px;
		height: auto;
		margin-left: 410px;
		margin-top: -100px;
	}
	.btn{
		margin-top: 20px;
		margin-bottom: 20px;
	}
	#btnchat{
		margin-left: 490px;

	}
	.wrapper{
		background: #DEDEDE;
		padding: 30px;
		margin-top: 100px;
		border-radius: 10px;

	}
	.content{
		padding: 30px;
		font-size: 20px;
		font-family: sans-serif;
		display: flex;
		margin-left: 200px;

	}
	.overview{
		font-family: sans-serif;
		display: flex;
	}
	.wrapper2{
		margin-top: 30px;
		background: #DEDEDE;
		padding: 30px;
		font-family: sans-serif;
		margin-bottom: 50px;
	}
</style>
<body>
	<?php 

	$selid = $_SESSION['id'];
	?>

	<div class="container">
		<div class="wrapper">
			<div class="userimage">
				<?php 
					if ($row['userimage'] == "") {
						echo'<img src="../assets/userImage/default_image.png">';
					}
					else{
						echo'<img src="../assets/userImage/'.$row["userimage"].'">';
					}


				 ?>
				

			</div>

			<div class="btn">
				<a href="SellerCustomerView.php?chat=<?php echo$cust_id ?>&shop=<?php echo$selid ?>&username=<?php echo$row['username']; ?>" class="btn btn-primary" id="btnchat">Chat</a>
			</div>

			<div class="overview">
				<?php 
				$sql_rent = $dbconnnect->query("SELECT * FROM order_table WHERE user_id = '$cust_id' AND status = 'Complete'");
				$Rent_made = mysqli_num_rows($sql_rent); ?>
				<div style="margin-left: 300px; text-align: center;">
					<p><span style="font-size:40px;"><?php echo$Rent_made ?></span><br>
					<b>Rent Made</b></p>
				</div>

				<?php 
				$sql_rent = $dbconnnect->query("SELECT * FROM order_table WHERE user_id = '$cust_id' AND status = 'Not Return'");
				$Rent_nreturn = mysqli_num_rows($sql_rent); ?>
				<div style="margin-left: 300px; text-align: center;">
					<p><span style="font-size:40px;"><?php echo$Rent_nreturn ?></span><br>
					<b>Not Return</b></p>
				</div>
			</div>
		</div>



		<div class="wrapper2">
			<h2>Basic Information</h2>
			<div class="content">
				
				<div style="">
					<p><b>Username: </b></p><?php echo$row['username']; ?>
					<p><b>Phone: </b></p><?php echo$row['phone']; ?>
				</div>
				<div style="margin-left: 300px;">
					<p><b>Email: </b></p><?php echo$row['email']; ?>
					<p><b>Address: </b></p><?php echo$row['barangay']." ".$row['city']." ".$row['province']." ".$row['region']; ?>
				</div>
			</div>
		</div>

		


		
	</div>

</body>
</html>