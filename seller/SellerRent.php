 <?php include('../includes/seller-navigation.php'); ?>
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Orders</title>

	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
require_once'dbcon.php';
	$selid = $_SESSION['id'];


function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}
function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}
























//refund 

if (isset($_POST['refund'])) {
	$refund_id = $_POST['order_id'];
	$image = $_FILES['proof']['name'];
	$target = "../assets/Payment_proof/" .basename($_FILES['proof']['name']);
	if (move_uploaded_file($_FILES['proof']['tmp_name'], $target)) {
				$msg = "Image upload";
				}
			else{
				$msg = "Error";
				}

	

	  echo".";
    echo"

    <script>
       Swal.fire({
          title: 'Are you sure?',

          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
            }).then((result) => {
              if (result.isConfirmed) {


                 window.location='../includes/UserOrderDel.php?refund=".$refund_id."&image=".$image."';
              }
            })
                </script>

    ";
}


//approved
if (isset($_GET['Approved'])) {
	$order_id = $_GET['Approved'];

	echo ".";
	?>
<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
         confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Approve'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?order_id=<?php echo$order_id; ?>";
			  }
			})
</script>




	<?php

}

//Departed process
if (isset($_GET['Departed'])) {
	$Order_id = $_GET['Departed'];


	echo ".";
	?>
<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Depart'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?depart=<?php echo$Order_id; ?>";
			  }
			})
</script>

<?php

}

//rent process
if (isset($_GET['rent'])) {
	$Order_id = $_GET['rent'];
	echo ".";
	?> 
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Rent'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?rent=<?php echo$Order_id; ?>";
			  }
			})
</script>
	<?php
}

//return process 
if (isset($_GET['return'])) {
	$Order_id = $_GET['return'];
	echo ".";
	?>
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Return'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?return=<?php echo$Order_id; ?>";
			  }
			})
</script>


	<?php
	
}

//pending -> decline
	if (isset($_GET['decline'])) {
		$order_id = $_GET['decline'];
	echo ".";
	?>
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Order Cancel'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?decline=<?php echo$order_id; ?>";
			  }
			})
</script>
	<?php
	}


	//approve -> seller cancel
	if (isset($_GET['id'])) {
		$order_id = $_GET['id'];

		echo ".";
	?>
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Order Cancel'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?order_cancel=<?php echo$order_id; ?>";
			  }
			})
</script>
	<?php
	
	}

	//late return -> penalty
	if (isset($_GET['Penalty'])) {
		$order_id = $_GET['Penalty'];
			echo ".";
	?>
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Return'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?Penalty=<?php echo$order_id; ?>";
			  }
			})
</script>
	<?php
	}

	

//late return
	if (isset($_GET['late_return'])) {
		$order_id = $_GET['late_return'];
			echo ".";
	?>
	<script>
	  Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Return'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="SellerRentProcess.php?late_return=<?php echo$order_id; ?>";
			  }
			})
</script>
	<?php
	}


 ?>
<!DOCTYPE html>
<html>
<head>


</head>

<style type="text/css">
	.shop-category-container{
		float: left;
	}
		#stage_icon img{
		height: 30px;
		width: 30px;
	}
	#stages li{
		padding: 10px;
	}
</style>
    
<body>
       

<!---    User Email Notification       ---->
				<?php 
				if (isset($_GET['update'])) {
						$check = $dbconnnect->query("SELECT * FROM order_table");
						while($row = mysqli_fetch_assoc($check)){
							$start_date = strtotime($row['start_date']);
							$end_date = strtotime($row['return_date']);
							$today = strtotime(date('Y-m-d'));
							$Returndiff = round(($end_date-$today)/60/60/24);

							$Penalty = round(($today-$end_date)/60/60/24);



					//Penalty not return	
					if ($Penalty == 7 && $row['status'] == "Penalty" ) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$earn = $row['deposit'] + $row['order_price'];

						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];
						$stats = "Not Return";
						$today = date('Y-m-d');

						$user_id = $row['user_id'];

						$user_sql = $dbconnnect->query("SELECT * FROM user WHERE user_id = '$user_id'");
						$user = $user_sql->fetch_assoc();

						$vio = $user['violation'];
						$total_vio = $vio + 1;

						



						$update = $dbconnnect->query("UPDATE order_table SET status = '$stats' , order_complete = '$today' , earn = '$earn' WHERE order_id = '$Order_id' ");

							if ($update) {
								$violation = $dbconnnect->query("UPDATE user SET violation = '$total_vio' WHERE user_id = '$user_id'");
								//email
								$to = $email;
								$subject = "ARKIMORMA RENTING GOWN";
								$message = "<html>
									<head>
									<title>7 Days Penalty</title>
									</head>
									<body>
									<h2OverPenalty</h2>
									<h2>Your Order # ".$Order_id." ".$Product_name."</h2>
									<p>Hi: ".$Customer_name."</p>
									<p>You are no longer reclaiming the deposit you provide, this will serve as a payment for not returning the item on the exact date. Thank you.</p>

									
									

									</body>
									</html>";
								$headers = "From: arkimorma@gmail.com \r\n";
								$headers .= "MIME-Version: 1.0"."\r\n";
								$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

								mail($to, $subject, $message, $headers); 
						}

					}// end penalty 7 days

					if ($Penalty == 1 && $row['status'] == "Penalty" && $row['penalty_no'] == 0) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 1;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no' WHERE order_id = '$Order_id' ");

							

					}// end penalty 1 days
					if ($Penalty == 2 && $row['status'] == "Penalty" && $row['penalty_no'] == 1) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 2;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no' WHERE order_id = '$Order_id' ");

							

					}// end penalty 2 days
					if ($Penalty == 3 && $row['status'] == "Penalty" && $row['penalty_no'] == 2) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 3;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no' WHERE order_id = '$Order_id' ");

							

					}// end penalty 3 days
					if ($Penalty == 4 && $row['status'] == "Penalty" && $row['penalty_no'] == 3) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 4;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no' WHERE order_id = '$Order_id' ");

							

					}// end penalty 4 days
					if ($Penalty == 5 && $row['status'] == "Penalty" && $row['penalty_no'] == 4) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 5;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no'WHERE order_id = '$Order_id' ");

							

					}// end penalty 5 days
					if ($Penalty == 6 && $row['status'] == "Penalty" && $row['penalty_no'] == 5) {

						$email = $row['cust_email'];
						$Order_id = $row['order_id'];
						$Product_name = $row['product_name'];
						$Customer_name = $row['cust_name'];

						$percentage = 14;
						$deposit = $row['deposit'];
						$deduct = $row['depo_deduct'];

						$divide = $percentage / 100;
						$penalty = $deduct + $divide * $deposit;
						$penal_no = 6;
						
					
						$today = date('Y-m-d');

						$update = $dbconnnect->query("UPDATE order_table SET depo_deduct = '$penalty' , penalty_no = '$penal_no' WHERE order_id = '$Order_id' ");

							

					}// end penalty 6 days
					


						

							
						
					
					if ($Returndiff == 0 || $Returndiff == 1 || $Returndiff == -1) {
						$order_id = $row['order_id'];
						$cust = $row['cust_name'];
						$product =$row['product_name'];
						$email = $row['cust_email'];
						$return = $row['return_date'];

					if ($Returndiff == 0 && $row['status'] == "Rent") {
						$val = 'Due';
						$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$order_id' AND status = 'Rent'");
						if ($update) {
							//email
								$to = $email;
									$subject = "ARKIMORMA - Due";
									$message = "<html>
										<head>
										<title>Due</title>
										</head>
										<body>
										<h2>Your Order ".$product."</h2>
										<p>Hi: ".$cust."</p>	
										<p>This notice is to inform you that the item ".$product." you rent is due today,
											please return it today to avoid penalty.</p>

										
										
										<p>Thank you for your cooperation regarding this matter.</p>
										</body>
										</html>";
									$headers = "From: arkimorma@gmail.com \r\n";
									$headers .= "MIME-Version: 1.0"."\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

									mail($to, $subject, $message, $headers);   
								
							}
					}
						

					if($Returndiff == -1 && $row['status'] == "Due"){

							?>
							
							<?php

									$val = "Penalty";
									$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$order_id' AND status = 'Due'");

									if ($update) {
										//email
											$to = $email;
												$subject = "ARKIMORMA - Penalty";
												$message = "<html>
													<head>
													<title>Penalty</title>
													</head>
													<body>
													<h2>Your Order # ".$order_id." ".$product."</h2>
													<p>Hi: ".$cust."</p>
													<p>This notice is to inform you that the item ".$order_id." you rent is already over due,
														which is the exact returning date is ".$return.".</p>

													<p>Please return it within 7 Days. Thank you!</p>
													
													<p>Thank you for your cooperation regarding this matter.</p>
													</body>
													</html>";
												$headers = "From: arkimorma@gmail.com \r\n";
												$headers .= "MIME-Version: 1.0"."\r\n";
												$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

												mail($to, $subject, $message, $headers);   
											
										}
							}
						}

					}
			}

		?>
<div class="container">
<br><br><br>
<div class="shop-category-container container" style="margin-left: 13%;">
	<!---- sort tab ---->
	<ul>
		<?php
			if(isset($_GET['sort'])) {
				$sort = $_GET['sort'];
			} else {
				$sort = '';
			}
		?>

		<?php 
			$sql = "SELECT status FROM order_table WHERE status = 'Pending' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_p = mysqli_num_rows($result); ?>
		<li><a href="SellerRent.php?sort=Pending" class="btn <?php echo ($sort == 'Pending') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/pending.png"></span><br>Pending <span class="badge badge-info"><?php 
		if ($badge_p > 0) {
			echo$badge_p;
		} ?></span></a></li>

		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Approved' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_a = mysqli_num_rows($result); ?>

		<li><a href="SellerRent.php?sort=Approved" class="btn <?php echo ($sort == 'Approved') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/approve.png"></span><br>Approved <span class="badge badge-info"><?php 
		if ($badge_a > 0) {
			echo$badge_a;
		} ?></span></a></li>

		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Departed' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_d = mysqli_num_rows($result); ?>

		<li><a href="SellerRent.php?sort=Departed" class="btn <?php echo ($sort == 'Departed') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/depart.png"></span><br>Departed <span class="badge badge-info"><?php 
		if ($badge_d > 0) {
			echo$badge_d;
		} ?></span></a></li>


		<?php 	
			$sql = "SELECT status FROM order_table WHERE seller_id = '$selid' AND status = 'Rent' ";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_r = mysqli_num_rows($result); ?>


		<li><a href="SellerRent.php?sort=Rent" class="btn <?php echo ($sort == 'Rent') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/rent.png"></span><br>Rent <span class="badge badge-info"><?php 
		if ($badge_r > 0) {
			echo$badge_r;
		} ?></span></a></li>


		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Due' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_due = mysqli_num_rows($result); ?> 


		<li><a href="SellerRent.php?sort=Due" class="btn <?php echo ($sort == 'Due') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/due.png"></span><br>Due <span class="badge badge-info"><?php 
		if ($badge_due > 0) {
			echo$badge_due;
		} ?></span></a></li>
	

		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Penalty' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_Penalty = mysqli_num_rows($result); ?> 


		<li><a href="SellerRent.php?sort=Penalty" class="btn <?php echo ($sort == 'Penalty') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/penalty.png"></span><br>Penalty <span class="badge badge-info"><?php 
		if ($badge_Penalty > 0) {
			echo$badge_Penalty;
		} ?></span></a></li>
			

		
		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Complete' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_c = mysqli_num_rows($result); ?> 

		<li><a href="SellerRent.php?sort=Complete" class="btn <?php echo ($sort == 'Complete') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/rate.png"></span><br>Complete <span class="badge badge-info"><?php 
		if ($badge_c > 0) {
			echo$badge_c;
		} ?></span></a></li>

		<!---  request cancel  -->
		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Approved' AND seller_id = '$selid' AND cancel_req = '1'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_can_req = mysqli_num_rows($result); ?> 


		<li><a href="SellerRent.php?sort=Cancel Request" class="btn <?php echo ($sort == 'Cancel Request') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/cancel.png"></span><br>Cancel Request <span class="badge badge-info"><?php 
		if ($badge_can_req > 0) {
			echo$badge_can_req;
		} ?></span></a>
		</li>



		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Cancelled' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_Cancelled = mysqli_num_rows($result); ?> 


		<li><a href="SellerRent.php?sort=Cancelled" class="btn <?php echo ($sort == 'Cancelled') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/cancel.png"></span><br>Cancelled <span class="badge badge-info"><?php 
		if ($badge_Cancelled > 0) {
			echo$badge_Cancelled;
		} ?></span></a>
		</li>

		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Not Return' AND seller_id = '$selid'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_notreturn = mysqli_num_rows($result); ?> 

		<li><a href="SellerRent.php?sort=Not Return" class="btn <?php echo ($sort == 'Not Return') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/return.png"></span><br>Not Return <span class="badge badge-info"><?php 
		if ($badge_notreturn > 0) {
			echo$badge_notreturn;
		} ?></span></a></li>

		
	</ul>
	
</div>
</div>
 <br>
<div class="container">

<h2 style="text-align:center;font-family: 'Lobster', cursive;
font-size: 50px;
color: black;"><?php echo $sort ?></h2>
<?php 
if ($sort == 'Penalty') {
		?>
		<div style="text-align: center;">
		<i id="notes" style="color: #00819B; "><b>NOTICE: </b>If the renter didn't return within 7 days of penalty. the renter will no longer reclaim the deposit. </i>
		</div>

<?php
}
 ?>
 </div>
<br><br>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>Image</th>
					<th>Item</th>
					<th>Quantity</th>
					
					<th>Item Price</th>
					<th>Deposit</th>
					<th>Total</th>
					<th>Payment Method</th>
					<th>Customer</th>
					<th>Email</th>
					<th>Address</th>
					<th>Start Date</th>
					<th>Return Date</th>
					<?php if ($sort == 'Complete'): ?>
						<th>Order Complete</th>
					<?php endif ?>
					

					<th>Status</th>
					<th></th>
				</tr>
			</thead>
		<?php 

	

		
		if ($sort == 'Cancel Request') {
			$sql = $dbconnnect->query("SELECT * FROM order_table WHERE status = 'Approved' AND seller_id = '$selid' AND cancel_req = '1'");
		}else{

		$sql = $dbconnnect->query("SELECT * FROM order_table WHERE seller_id = '$selid' AND status = '$sort' ORDER BY order_time DESC");
		}
		

		while($order = $sql->fetch_assoc()){  
			$start_date = strtotime($order['start_date']);
			$end_date = strtotime($order['return_date']);
			$today = strtotime(date('Y-m-d'));
			$Returndiff = round(($end_date-$today)/60/60/24);

			$Penalty = round(($today-$end_date)/60/60/24);

			
							 

		?>
		<tr>
					<td><img src="../assets/Multiple_product_image/<?php echo $order['image']; ?>" width="100px"></td>
					<td><?php echo $order['product_name']; ?></td>
					<td><?php echo $order['quantitty']; ?></td>

					<td><?php $price = $order['order_price']; $price = asDollars($price);  echo$price; ?></td>
					<td><?php $deposit = $order['deposit']; $deposit = asDollars($deposit);  echo$deposit; ?></td>
					<td><?php $total = $order['total']; $total = asDollars($total);  echo$total; ?></td>
					<td><?php echo$order['payment']; ?> |
						<?php if ($order['payment'] == 'Online Payment'): ?>
							<a href="SellerProofPayment.php?order_id=<?php echo $order['order_id'];?>" target="_blank">View Payment Proof</a>
						<?php endif ?>

					 </td>


					<td><a href="SellerCustomerView.php?cust_id=<?php echo$order['user_id']; ?>"><?php echo $order['cust_name']; ?></a></td>
					<td><?php echo $order['cust_email']; ?></td>
					<td><?php echo $order['cust_address']; ?></td>
					<td><?php $start = $order['start_date']; $timestamp = strtotime($start);$new_date = date('F d Y', $timestamp);  echo$new_date; ?></td>
					<td><?php $return = $order['return_date']; $timestamp = strtotime($return);$new_date = date('F d Y', $timestamp);  echo$new_date; ?></td>
					<?php if ($sort == 'Complete'): ?>
						<td><?php echo $order['order_complete']; ?></td>
					<?php endif ?>
					
					<td><?php echo $order['status']; ?></td>
<!---------  accept request --->
					<?php if ($sort == 'Cancel Request' && $order['payment'] == 'Online Payment'): ?>
						<td><a href="SellerRefund.php?accept_req=<?php echo$order['order_id']; ?>" target="_blank">Accept Request</a></td>
					<?php endif ?>

					<?php if ($sort == 'Cancel Request' && $order['payment'] == 'Cash on Delivery'): ?>
						<td><a href="SellerRent.php?decline=<?php echo$order['order_id']; ?>&cust=<?php echo$order['cust_name']; ?>&product=<?php echo$order['product_name']; ?>&email=<?php echo$order['cust_email']; ?>">Cancel</a></td>
					<?php endif ?>


					<td>
						<?php if ($sort == "Approved"): ?>

						<!----- Departed btn   ---->
						<a href="SellerRent.php?Departed=<?php echo$order['order_id']; ?>>">Departed</a>

						<!----- cancel btn in ->approved   ---->
							<a href="SellerRent.php?id=<?php echo$order['order_id']; ?>>">Cancel</a>
						
						<?php endif ?>

						<?php if ($sort == "Pending"): ?>

						<!----- approve btn in -> pending   ---->
							<a href="SellerRent.php?
							Approved=<?php echo$order['order_id']; ?>">Approved</a>

						<!----- cancel btn in ->pending   ---->
							<a href="SellerRent.php?decline=<?php echo$order['order_id']; ?>">Decline</a>

							
						<?php endif ?>

						<?php if ($sort == "Departed"): ?>

							<!----- rent btn -> Departed   ---->
						<a href="SellerRent.php?rent=<?php echo$order['order_id']; ?>>">Rent</a>
							
						<?php endif ?>

		<!---    btn Return ->rent      ---->

						<?php if ($order['earn'] == 0 AND($sort == "Rent" || $sort == "Due")): ?>
							<a href="SellerRent.php?return=<?php echo$order['order_id']; ?>">Return</a><?php endif ?>

						<?php if ($sort == "Penalty"): ?>
							<a href="SellerRent.php?Penalty=<?php echo$order['order_id']; ?>">Late Return</a>
						<?php endif ?>


						<?php if ($sort == "Not Return"): ?>
							<a href="SellerRent.php?late_return=<?php echo$order['order_id']; ?>">Late Return</a>
						<?php endif ?>


			<!---    Days Left       ---->

						<?php if ($sort == "Rent" ): ?>
							<br><b><?php echo$Returndiff?> Day Left</b>
						<?php endif ?>

						<?php if ($sort == "Penalty"): ?>
							<br><b><?php echo$Penalty?> Day Penalty</b>
						<?php endif ?>


		</tr>

		<?php } ?>
		</table>
	</div>
	<?php 

		//payment proof
		if (isset($_GET['order_id'])) {
			$id = $_GET['order_id'];
			$sql = $dbconnnect->query("SELECT proof FROM order_table WHERE order_id = '$id'");
			$pic = $sql->fetch_assoc();

	}
	?> 

		



<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>


</body>
</html>