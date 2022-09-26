   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
//date_default_timezone_set('Asia/Manila');
require_once'dbcon.php';
function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}

//approved
if (isset($_GET['order_id'])) {
	$id = $_GET['order_id'];
	$sql_approve = $dbconnnect->query("SELECT * FROM order_table WHERE order_id ='$id'");
	$row = $sql_approve->fetch_assoc();
	
	$item = $row['order_id'];
	$order_quan = $row['quantitty'];
	$p_id = $row['product_id'];
	$email = $row['cust_email'];
	$cust = $row['cust_name'];
	$val = "Approved";
	$start = $row['start_date'];
	$return = $row['return_date'];
	$pay = $row['payment'];
	$user_id = $row['user_id'];
	$price = $row['order_price'];
	$product_name = $row['product_name'];
	$time = $row['order_time'];
	$seller_id = $row['seller_id'];
	$deposit = $row['deposit'];
	$total = $row['total'];

	$sql = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$p_id' AND shop_id = '$seller_id' ");
	$row = $sql->fetch_assoc();
	$stock = $row['stocks'];

	$remain = $stock - $order_quan;

	if ($remain < 0) {
		myAlert("Your out of stock you can't approve this order", "SellerRent.php");
	}
	else{

			$com = $dbconnnect->query("SELECT userimage,country,region,province,city,barangay,postal_code,phone FROM user WHERE user_id = '$user_id'");
			$user_info = $com->fetch_assoc();
			$mobile = $user_info['phone'];
			$city = $user_info['city'];
			$barangay = $user_info['barangay'];
			$province = $user_info['province'];
			$region = $user_info['region'];
			$image = $user_info['userimage'];


			

			$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$item'");
			if ($update) {

				echo".";
					echo"<script>Swal.fire({
							  position: 'center',
							  icon: 'success',
							  title: 'Approved Sucessfully',
							  showConfirmButton: false,
							  timer: 1500
							}).then(function() {
						    window.location = 'SellerRent.php';
						});</script>";

				//send email
				$to = $email;
				$subject = "ARKIMORMA RECEIPT";
				$message = "<html>
					<head>
					<title>Receipt</title>
					</head>
					<body>
					<h2>Your Order  ".$product_name."</h2>
					<p>Hi: ".$cust."</p>
					<p>We received your ".$product_name." you’ll be paying for this via " .$pay. ".<br> We’re getting your order ready and will let you know once it’s okay.<br> We wish you enjoy renting with us and see you!</p>
					

					<a href='http://localhost/ark/seller/SellerReceipt.php?Receipt=".$cust."&mobile=".$mobile."&email=".$email."&city=".$city."&barangay=".$barangay."&province=".$province."&region=".$region."&start=".$start."&return=".$return."&product_name=".$product_name."&ordertime=".$time."&price=".$price."&quantity=".$order_quan."&deposit=".$deposit."&total=".$total."'>Download Receipt</a>

					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);
			//	myAlert("Approved Successfully", "SellerRent.php");
				echo ".";
				?>
				<script>
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Approved Successfully',
					  showConfirmButton: false,
					  timer: 1500
					}).then(function() {
							    window.location = 'SellerRent.php';
							});
				</script>

				<?php

			


				//quantity minus
				$call = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$p_id'");
				$quan = $call->fetch_assoc();
				$stock = $quan['stocks'] - $order_quan;
				
				$quantity_upadate = $dbconnnect->query("UPDATE product SET stocks = '$stock' WHERE product_id = '$p_id'");
			}
			else{
				echo "Failed";
			}
	}

}

//Departed process
if (isset($_GET['depart'])) {
	$Order_id = $_GET['depart'];
	$sql_depart = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$Order_id'");
	$row = $sql_depart->fetch_assoc();

	$Order_quantity = $row['quantitty'];
	//$Product_id = $_GET['p_id'];
	$email = $row['cust_email'];
	$Customer_name = $row['cust_name'];
	$Start_date = $row['start_date'];
	$Return_date = $row['return_date'];
	$Product_name = $row['product_name'];
	$val = "Departed";

	$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$Order_id'");

	if ($update) {
		//email
		echo".";
		echo"<script>Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Departed Sucessfully',
				  showConfirmButton: false,
				  timer: 1500
				}).then(function() {
			    window.location = 'SellerRent.php';
			});</script>";


		$to = $email;
		$subject = "ARKIMORMA RENTING GOWN";
		$message = "<html>
			<head>
			<title>For Pick up</title>
			</head>
			<body>
			<h2For Pick up</h2>
			<h2>Your Order ".$Product_name."</h2>
			<p>Hi: ".$Customer_name."</p>
			<p>A item from your Order ".$Product_name." is now Departed. <br>Check your delivery details in your account.</p>

			
			

			</body>
			</html>";
		$headers = "From: arkimorma@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		mail($to, $subject, $message, $headers);
		//myAlert("Departed Successfully", "SellerRent.php");
		echo ".";
				?>
				<script>
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Departed Successfully',
					  showConfirmButton: false,
					  timer: 1500
					}).then(function() {
							    window.location = 'SellerRent.php';
							});
				</script>

				<?php

	}
}


//rent process
if (isset($_GET['rent'])) {
	$Order_id = $_GET['rent'];
	$sql_rent = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$Order_id'");
	$row = $sql_rent->fetch_assoc();

	$Order_quantity = $row['quantitty'];
	//$Product_id = $_GET['p_id'];
	$email = $row['cust_email'];
	$Customer_name = $row['cust_name'];
	$Start_date = $row['start_date'];
	$Return_date = $row['return_date'];
	$Product_name = $row['product_name'];
	$or_receive = 1;

	$update = $dbconnnect->query("UPDATE order_table SET or_receive = '$or_receive' WHERE order_id = '$Order_id'");
	if ($update) {

		echo".";
		echo"<script>Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Email Send',
				  showConfirmButton: false,
				  timer: 1500
				}).then(function() {
			    window.location = 'SellerRent.php';
			});</script>";


		//email

		$to = $email;
		$subject = "ARKIMORMA - ";
		$message = "<html>
			<head>
			<title>Hi: ".$Customer_name."</title>
			</head>
			<body>
			<h2>Your Order ".$Product_name." has been pick up</h2>
			<p>Hi: ".$Customer_name."</p>
			<p>We’re happy to let you know that item/s from your order has been delivered.<br>
			Thank you for renting with us.</p>


			<a href='http://localhost/ark/seller/SellerOrderReceive.php?order_id=$Order_id'><button>Order Receive</Button></a>

			</body>
			</html>";
		$headers = "From: arkimorma@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		mail($to, $subject, $message, $headers);
	
		

			echo ".";
				?>
				<script>
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  text: "You've send an email to the user, wait till user order received",
					  showConfirmButton: false,
					  timer: 2000
					}).then(function() {
							    window.location = 'SellerRent.php';
							});
				</script>

				<?php
	}

		

}



//return process 
if (isset($_GET['return'])) {
	$Order_id = $_GET['return'];
	$sql_return = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$Order_id'");
	$row = $sql_return->fetch_assoc();


	$Order_quantity = $row['quantitty'];
	$Product_id = $row['product_id'];
	$email = $row['cust_email'];
	$Customer_name = $row['cust_name'];
	$Start_date = $row['start_date'];
	$Return_date = $row['return_date'];
	$Product_name = $row['product_name'];
	$price = $row['order_price'];
	$deposit = $row['deposit'];
	$shop_id = $row['seller_id'];
	$status = $row['status'];
	$val = "Complete";
	$date = date('Y-m-d');

	//$total = $price + $deposit;
	if ($status == "Not Return") {
		$Order_id = $Order_id;
		
		$update = $dbconnnect->query("UPDATE order_table SET earn = '$price'+'$deposit',order_complete = '$date' WHERE order_id = '$Order_id'");
		//quantity plus
				$call = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$Product_id'");
				$quan = $call->fetch_assoc();
				$stock = $quan['stocks'] + $Order_quantity;
				
				$quantity_upadate = $dbconnnect->query("UPDATE product SET stocks = '$stock' WHERE product_id = '$Product_id'");
		echo".";
		echo"<script>Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Return Sucessfully',
				  showConfirmButton: false,
				  timer: 1500
				}).then(function() {
			    window.location = 'SellerRent.php';
			});</script>";
	}
	else{
	

			//insert to commission
			$percentage = 10;
			$add = $percentage / 100;
			$fee = $add * $price;

			$pay = $dbconnnect->query("INSERT INTO payment(order_id,order_price,shop_id,percentage,fee)VALUES('$Order_id','$price','$shop_id','$percentage','$fee')");
			
			$update = $dbconnnect->query("UPDATE order_table SET status ='$val' , order_complete = '$date' , earn = '$price' WHERE order_id = '$Order_id'");
			if ($update) {
					//email
				$to = $email;
				$subject = "ARKIMORMA - THANKYOU FOR RENTING";
				$message = "<html>
					<head>
					<title>Hi: ".$Customer_name."</title>
					</head>
					<body>
					<h2>THANK YOU FOR RENTING </h2>
					<p>Hi: ".$Customer_name."</p>
					<p>We are so grateful for the pleasure of serving you and hope we met your expectations. <br>
					Thank you for renting with us.</p>


				
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);

				echo ".";
				?>
				<script>
					Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Return Successfully',
					  showConfirmButton: false,
					  timer: 1500
					}).then(function() {
							    window.location = 'SellerRent.php';
							});
				</script>

				<?php

				//quantity plus
				$call = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$Product_id'");
				$quan = $call->fetch_assoc();
				$stock = $quan['stocks'] + $Order_quantity;
				
				$quantity_upadate = $dbconnnect->query("UPDATE product SET stocks = '$stock' WHERE product_id = '$Product_id'");

			}
	}
}


//pending -> decline
	if (isset($_GET['decline'])) {
		$order_id = $_GET['decline'];
		$sql_decline = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$order_id'");
		$row = $sql_decline->fetch_assoc();


		$cust = $row['cust_name'];
		$email = $row['cust_email'];
		$product = $row['product_name'];
		
	
		$decline = $dbconnnect->query("DELETE FROM order_table WHERE order_id = '$order_id' ");

		if ($decline) {
				//send email
					$to = $email;
					$subject = "DECLINE";
					$message = "<html>
						<head>
						<title>Receipt</title>
						</head>
						<body>
						<h2>Cancelled</h2>
						<p>Hi: ".$cust."</p>
						<p>The seller has been canceled your order ".$product." for some reason.</p>
						
						</body>
						</html>";
					$headers = "From: arkimorma@gmail.com \r\n";
					$headers .= "MIME-Version: 1.0"."\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

					mail($to, $subject, $message, $headers);

					echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Cancel Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php
	
				}

	}



	//approve -> seller cancel
	if (isset($_GET['order_cancel'])) {
		$order_id = $_GET['order_cancel'];
		$sql_order_cancel = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$order_id'");
		$row = $sql_order_cancel->fetch_assoc();




		$cust = $row['cust_name'];
		$product = $row['product_name'];
		$email = $row['cust_email'];
		$val = "Cancelled";
		$p_id = $row['product_id'];
		$order_quan = $row['quantitty'];

		$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$order_id'");
		if ($update) {
			//email
				$to = $email;
					$subject = "CANCELLED";
					$message = "<html>
						<head>
						<title>Receipt</title>
						</head>
						<body>
						<h2>Cancelled</h2>
						<p>Hi: ".$cust."</p>
					
						<p>The seller has been canceled your order ".$product." for some reason.</p>
						
						</body>
						</html>";
					$headers = "From: arkimorma@gmail.com \r\n";
					$headers .= "MIME-Version: 1.0"."\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

					mail($to, $subject, $message, $headers);

						echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Cancel Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php




			//quantity plus
		$call = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$p_id'");
		$quan = $call->fetch_assoc();
		$stock = $quan['stocks'] + $order_quan;
		
		$quantity_upadate = $dbconnnect->query("UPDATE product SET stocks = '$stock' WHERE product_id = '$p_id'");
		}
	}





if (isset($_GET['Penalty'])) {
	$order_id = $_GET['Penalty'];
	$sql_order_cancel = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$order_id'");
	$row = $sql_order_cancel->fetch_assoc();


	$cust = $row['cust_name'];
	$product = $row['product_name'];
	$email = $row['cust_email'];
	$total = $row['total'];
	$date = date('Y-m-d');
	$email = $row['cust_email'];
	$Customer_name = $row['cust_name'];
	$price = $row['order_price'];
	$shop_id = $row['seller_id'];


	$depo_deduct = $row['depo_deduct'];

	

	$total_earn = $depo_deduct + $price;



	$update = $dbconnnect->query("UPDATE order_table SET deposit = '$depo_deduct' ,  status = 'Complete' , earn = '$total_earn',order_complete = '$date' WHERE order_id = '$order_id'");
	if ($update) {

		$sql_check = $dbconnnect->query("SELECT * FROM payment WHERE order_id = '$order_id'");
		$exist = mysqli_num_rows($sql_check);
		if ($exist <= 0) {
			
		//insert to commission
			$percentage = 10;
			$add = $percentage / 100;
			$fee = $add * $price;

			$pay = $dbconnnect->query("INSERT INTO payment(order_id,order_price,shop_id,percentage,fee)VALUES('$order_id','$price','$shop_id','$percentage','$fee')");

				//email
				$to = $email;
				$subject = "ARKIMORMA - THANKYOU FOR RENTING";
				$message = "<html>
					<head>
					<title>Hi: ".$Customer_name."</title>
					</head>
					<body>
					<h2>THANK YOU FOR RENTING </h2>
					<p>Hi: ".$Customer_name."</p>
					<p>We are so grateful for the pleasure of serving you and hope we met your expectations. <br>
					Thank you for renting with us.</p>


				
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);


				echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Return Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php



		}
	



		//email
				$to = $email;
				$subject = "ARKIMORMA - THANKYOU FOR RENTING";
				$message = "<html>
					<head>
					<title>Hi: ".$Customer_name."</title>
					</head>
					<body>
					<h2>THANK YOU FOR RENTING </h2>
					<p>Hi: ".$Customer_name."</p>
					<p>We are so grateful for the pleasure of serving you and hope we met your expectations. <br>
					Thank you for renting with us.</p>


				
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);


				echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Return Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php
					
	}

		


	

}








if (isset($_GET['late_return'])) {
	$order_id = $_GET['late_return'];
	$sql_order_cancel = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$order_id'");
	$row = $sql_order_cancel->fetch_assoc();


	$cust = $row['cust_name'];
	$product = $row['product_name'];
	$email = $row['cust_email'];
	$total = $row['total'];
	$date = date('Y-m-d');
	$email = $row['cust_email'];
	$Customer_name = $row['cust_name'];
	$price = $row['order_price'];
	$shop_id = $row['seller_id'];

	
	


	$update = $dbconnnect->query("UPDATE order_table SET no_depo = 1 , status = 'Complete' , earn = '$total',order_complete = '$date' WHERE order_id = '$order_id'");



	if ($update) {

		$sql_check = $dbconnnect->query("SELECT * FROM payment WHERE order_id = '$order_id'");
		$exist = mysqli_num_rows($sql_check);
		if ($exist <= 0) {
			
		//insert to commission
			$percentage = 10;
			$add = $percentage / 100;
			$fee = $add * $price;

			$pay = $dbconnnect->query("INSERT INTO payment(order_id,order_price,shop_id,percentage,fee)VALUES('$order_id','$price','$shop_id','$percentage','$fee')");

				//email
				$to = $email;
				$subject = "ARKIMORMA - THANKYOU FOR RENTING";
				$message = "<html>
					<head>
					<title>Hi: ".$Customer_name."</title>
					</head>
					<body>
					<h2>THANK YOU FOR RENTING </h2>
					<p>Hi: ".$Customer_name."</p>
					<p>We are so grateful for the pleasure of serving you and hope we met your expectations. <br>
					Thank you for renting with us.</p>


				
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);


				echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Return Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php



		}
	



		//email
				$to = $email;
				$subject = "ARKIMORMA - THANKYOU FOR RENTING";
				$message = "<html>
					<head>
					<title>Hi: ".$Customer_name."</title>
					</head>
					<body>
					<h2>THANK YOU FOR RENTING </h2>
					<p>Hi: ".$Customer_name."</p>
					<p>We are so grateful for the pleasure of serving you and hope we met your expectations. <br>
					Thank you for renting with us.</p>


				
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);


				echo ".";
					?>
					<script>
						Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Return Successfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
								    window.location = 'SellerRent.php';
								});
					</script>

					<?php
					
	}

		


	

}



 ?>