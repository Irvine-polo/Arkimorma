<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
 include('../includes/user-navigation.php'); 
require_once'dbcon.php';

function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}
	function myAlert($msg, $url) {
	 echo '<script language="javascript">alert("'.$msg.'");</script>';
	 echo "<script>document.location = '$url'</script>";
}



 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Rent Form</title>
	 <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	 <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
	 <link rel="preconnect" href="https://fonts.googleapis.com">
	 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	 <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	 <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	 <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	 <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">

	<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<script src="https://www.paypal.com/sdk/js?client-id=AaEgvgkM2BGwlHPR-VaWFLdbGpeltImjrhXfQ3a8SlRnnFX5CLZcw7rBDGJolxmwjcD9ujCG1QlewoJQ"></script>
	 <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">


</head>
<style type="text/css">
	img{
		height:200px;
		width: 200px;
	}
	/*  btn Selecting size */

	.size_btn {
  list-style-type: none;
  margin: 25px 0 0 0;
  padding: 0;
}

.size_btn li {
	text-align: center;
  float: left;
  margin: 0 5px 0 0;
  width: 70px;
  height: 50px;
  position: relative;
  font-size: 13px;
}

.size_btn label,
.size_btn input {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.size_btn input[type="radio"] {
  opacity: 0.01;
  z-index: 100;
}

.size_btn input[type="radio"]:checked+label,
.Checked+label {
  background: grey;
  color: white;
}

.size_btn label {
  padding: 5px;
  border: 1px solid #CCC;
  cursor: pointer;
  z-index: 90;
}

.size_btn label:hover {
  background: #DDD;
}
</style>
<body>



	<script>

	

	//date pick
	$(document).ready(function(){
		var minDate = new Date();
			$("#Start").datepicker({
				showAnim: 'drop',
				numberOfMonth: 1,
				minDate: 2,
				maxDate: "1m",
				dateFormat:'yy-m-d ',
					onClose: function(selectedDate){
						$('#Return').datepicker("option","minDate",selectedDate);
				}
			});

		

			$("#Return").datepicker({
				showAnim: 'drop',
				numberOfMonth: 1,
				minDate: minDate,
				maxDate: "1m" ,
				dateFormat:'yy-m-d',
				onClose: function(selectedDate){
			//			$('#Start').datepicker("option","minDate",selectedDate);
				}
			});
	});



</script>

	
<?php

if (isset($_GET['rent'])) {
	$id = $_GET['rent'];
	$user_id = $_GET['user_id'];
	$product_id = $_GET['product_id'];
	$seller_id = $_GET['seller_id'];
	$quantity = $_GET['quantity'];

	$sql = $dbconnnect->query("SELECT stocks FROM product WHERE product_id = '$product_id' AND shop_id = '$seller_id'");
	$stock = $sql->fetch_assoc();
	$stocks = $stock['stocks'];

	$remain = $stocks - $quantity;
	if ($remain < 0) {
		//myAlert("Sorry This Product is Out of Stock, Try to less your quantity ", "UserAddToCart.php");

		echo ".";
		echo"<script>Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Product is Out of Stock, Try to less your quantity',
			  backdrop: `
					rgba(255,255,255, 0.9)
							    
				`
			
			}).then(function() {
			    window.location = 'UserAddToCart.php';
			});</script>";
	}
	

}

if (!isset($_GET['rent'])) {
	//header("location:ArkimormaHomepage.php");
}






//order process
	if (isset($_POST['placeorder'])) {
		$image = $_POST['product_image'];
		$c_id = $_POST['cart_id'];
		$p_id = $_POST['product_id'];
		$u_id = $_POST['user_id'];
		$s_id = $_POST['seller_id'];
		$pro_name = $_POST['product_name'];
		$size = $_POST['size'];
		$price = $_POST['price'];
		$deposit = $_POST['deposit'];
		$Total = $_POST['total'];


		$cust_name = $_POST['cust_name'];
		$cust_email = $_POST['cust_email'];
		$cust_address = $_POST['cust_address'];
		$cust_city = $_POST['cust_city'];
		$cust_province = $_POST['cust_province'];
		$cust_region = $_POST['cust_region'];
		$cust_postal_code = $_POST['cust_postal_code'];
		$status = $_POST['status'];
		$start = $_POST['start'];
		$return = $_POST['return'];
		$quantity = $_POST['quantity'];
		$payment = $_POST['payment'];
		$account_name = $_POST['AccountName'];
		$account_email = $_POST['AccountEmail'];
		$proof_payment = $_FILES['proof']['name'];
		$target = "../assets/Payment_proof/" .basename($_FILES['proof']['name']);
			

		

		

		if ($payment == "Online Payment") {
			
			

					if ($account_name == "" && $account_email == "") {
						//myAlert("Invalid payment. Please check your payment details before renting ", "UserAddToCart.php");

						echo'.';
						echo"<script>Swal.fire({
								  icon: 'error',
								  title: 'Oops...',
								  text: 'Check your payment information!',
								  backdrop: `
							    rgba(255,255,255, 0.9)
							    
									  `
								  
								}).then(function() {
								    window.location = 'UserAddToCart.php';
								});</script>";
					}
					else{
						$sql = "INSERT INTO order_table(product_id,user_id,seller_id,product_name,size,start_date,return_date,quantitty,payment,account_name,account_email,proof,order_price,deposit,total,cust_name,cust_email,cust_address,cust_city,cust_province,
			cust_region,cust_postal_code,status,image) VALUES('$p_id','$u_id','$s_id','$pro_name','$size','$start','$return','$quantity','$payment','$account_name','$account_email','$proof_payment','$price','$deposit','$Total','$cust_name','$cust_email','$cust_address','$cust_city','$cust_province','$cust_region','$cust_postal_code','$status','$image')";

		$result = mysqli_query($dbconnnect,$sql);

		if (move_uploaded_file($_FILES['proof']['tmp_name'], $target)) {
						$msg = "Image upload";
						}
					else{
						$msg = "Error";
						}

				if ($result) {
							//delete cart item
					$sql = $dbconnnect->query("DELETE FROM cart WHERE cart_id = '$c_id'");
							
						if ($sql) {
							?>
							<script>
								 window.location = 'usercartdel.php?cart_id=<?php echo$c_id ?>';
							</script>
						
							<?php


						//	header("location:../includes/UserOrderDel.php?cart_id=".$c_id."");
					}		

						
							
									
						}


					}
		}
		
		else{
//cod
	


		$sql = "INSERT INTO order_table(product_id,user_id,seller_id,product_name,size,start_date,return_date,quantitty,payment,order_price,deposit,total,cust_name,cust_email,cust_address,cust_city,cust_province,
			cust_region,cust_postal_code,status,image) VALUES('$p_id','$u_id','$s_id','$pro_name','$size','$start','$return','$quantity','$payment','$price','$deposit','$Total','$cust_name','$cust_email','$cust_address','$cust_city','$cust_province','$cust_region','$cust_postal_code','$status','$image')";

		$result = mysqli_query($dbconnnect,$sql);

		if ($result) {
			//delete cart item
			
			?>
			<script>
				 window.location = 'usercartdel.php?cart_id=<?php echo$c_id ?>';
			</script>

			<?php
						//	header("location:../includes/UserOrderDel.php?cart_id=".$c_id."");
						
		

		
		}
		

		}
		
	}





?>



<div class="container">
	<div class="row">
		<div class="col-xs-6">

			<?php  
			$sql = $dbconnnect->query("SELECT * FROM cart WHERE cart_id = '$id'");
			$myorder = $sql->fetch_assoc();
			?>
			<form method="POST" action="UserRentForm.php" enctype="multipart/form-data">
					<input type="hidden"  name="cart_id" value="<?php echo$myorder['cart_id']; ?>">
					<input type="hidden"  name="product_image" value="<?php echo$myorder['image']; ?>">
					<input type="hidden"  name="product_id" value="<?php echo$myorder['product_id']; ?>">
					<input type="hidden"  name="user_id" value="<?php echo$myorder['user_id']; ?>">
					<input type="hidden"  name="seller_id" value="<?php echo$myorder['seller_id']; ?>">
					<input type="hidden"  name="product_name" value="<?php echo$myorder['name']; ?>">
					<input type="hidden"  name="size" value="<?php echo$myorder['size']; ?>">
					<input type="hidden"  name="price" value="<?php echo$myorder['price']; ?>">
					<input type="hidden"  name="deposit" value="<?php echo$myorder['deposit']; ?>">
					<input type="hidden"  name="quantity" value="<?php echo$myorder['quantity']; ?>">

			<!------------  user details ---->
			<?php $sql = $dbconnnect->query("SELECT * FROM user WHERE user_id = '$user_id'"); $info = $sql->fetch_assoc();
			$address = $info['barangay']." ".$info['city']." ".$info['province']." ".$info['region'];
			$status = "Pending";
			 ?>
				<input type="hidden"  name="cust_name" value="<?php echo$info['username']; ?>">
				<input type="hidden"  name="cust_email" value="<?php echo$info['email']; ?>">
				<input type="hidden"  name="cust_address" value="<?php echo$address;?>">
				<input type="hidden"  name="cust_city" value="<?php echo$info['city'];?>">
				<input type="hidden"  name="cust_province" value="<?php echo$info['province'];?>">
				<input type="hidden"  name="cust_region" value="<?php echo$info['region'];?>">
				<input type="hidden"  name="cust_postal_code" value="<?php echo$info['postal_code'];?>">
				<input type="hidden"  name="status" value="<?php echo$status;?>">
				<div class="img img-thumbnail" style="width: 100%;">
					<img src="../assets/Multiple_product_image/<?php echo$myorder['image'];?>" style="width: 100%; height: auto;">
				</div>
				

		</div>
		<div class="col-xs-6">
			<!--------  order detail  ---->
		<br>
		<h2><a href="UserProductProfile.php?item_no=<?php echo$myorder['product_id']; ?>&shop_id=<?php echo$myorder['seller_id'] ?>"><?php echo$myorder['name'] ?></a></h2>
		<h4 class="text-left">Size: <?php echo$myorder['size'] ?></h4>
		<h4 class="text-left">Start Date: <input autocomplete="off" type="text"  id="Start" name="start" placeholder="yyyy/m/dd" required></h4>
		<h4 class="text-left">Return Date: <input autocomplete="off" type="text" id="Return" name="return" placeholder="yyyy/m/dd" required></h4>
		<h4 class="text-left">Quantity: <input type="text" name="quantity" value="<?php echo$myorder['quantity']; ?>"disabled ></h4>
		<h4 class="text-left">Payment</h4>
		<ul class="size_btn" >
		  <li>
				<input onclick="myFunction2()" value="Cash on Delivery" type="radio" id="cod" name="payment" required/>
				<label for="cod">Cash on Delivery</label>
		  </li>
		  <li>
			<input onclick="myFunction()" value="Online Payment" type="radio" id="online_payment" name="payment" required/>
			 <label for="online_payment">Online Payment</label>
		  </li>
		</ul><br><br><br>

		

		<h6 class="text-left">Item Price : <?php $price = $myorder['price']; $price = asDollars($price);  echo$price; ?></h6>
		<h6 class="text-left">Deposit : <?php $deposit = $myorder['deposit']; $deposit = asDollars($deposit);  echo$deposit; ?></h6>
		<?php  
		$price = $myorder['price'];
		$deposit = $myorder['deposit'];
		$total = $price + $deposit;
		echo'<input type="hidden"  name="total" value="'.$total.'">';
		$total = asDollars($total);
		echo "<h5 class='text-left'>TOTAL : ".$total."</h5>";
		?>

			<span id ="myspan"></span>

			<!---- paypal   ----->
				<?php 
				$price = $myorder['price']; 
				$deposit = $myorder['deposit'];
				$total = $price + $deposit;
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

				<!--------------payment form  ------------------->
				<div id="payment_form" hidden>
					

						<b>Proof of payment:</b> <br><br> <input type="file" name="proof" ><br><br>
						<b>Account Name:</b> <input type="text" name="AccountName" ><br><br>
						<b>Account Email:</b> <input type="text" name="AccountEmail" > <br><br>

						<div id="paypal-button-container"></div>
					
				</div>

				<input type="submit" name="placeorder" value="Place Order" class="btn btn-sm btn-primary">
			


	</form>
	<a href="UserAddtoCart.php" class="btn btn-sm btn-default">Back</a>

		</div>
	</div>

		

		
</div>

	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
<?php include('../includes/footer.php'); ?>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

<script>
	function myFunction() {
		  document.getElementById('payment_form').hidden = false; 
		  
		}
	function myFunction2() {
		  document.getElementById('payment_form').hidden = true; 
		}
</script>


</body>
</html>
