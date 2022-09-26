<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$error = NULL;
require_once 'dbcon.php';

function myAlert($msg, $url) {
	    echo '<script language="javascript">alert("'.$msg.'");</script>';
	    echo "<script>document.location = '$url'</script>";
	}
//Seller process------------------------
	session_start();
	//sign up

	







	if (isset($_POST['signup'])) {

		$target = "assets/SellerAccountImages/" .basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$backtarget = "assets/SellerAccountImages/" .basename($_FILES['backimage']['name']);
		$backimage = $_FILES['backimage']['name'];
		$Shop_name = $_POST['shop_name'];
		$Phone = $_POST['phone'];
		$Email = $_POST['email'];
		$Username = $_POST['username'];
		$Password = $_POST['password'];
		$Repeat_password = $_POST['repeat-password'];
		$Country = $_POST['country'];
		$Region = $_POST['region'];
		$Province = $_POST['province'];
		$City = $_POST['city'];
		$Barangay = $_POST['barangay'];
		$Postal_Code = $_POST['postal_Code'];

		//check if theres same email
		$email_check = "SELECT email FROM sellers WHERE email='$Email'";
		$email_res = mysqli_query($dbconnnect,$email_check);

		if ($Password != $Repeat_password) {
		//$error = "Password not match try again!";
		myAlert("Password not match try again!", "SellerSignUp.php");
		}
		
			
		elseif (strlen($Password) < 8) {
		//	$error = "Password Need Atleast 8 Characters";
			myAlert("Password Need Atleast 8 Characters", "SellerSignUp.php");
	
		}

		elseif(strlen($Phone) != 11){
		//	$error = "Invalid Phone Number!!";
			myAlert("Invalid Phone Number!!", "SellerSignUp.php");
		}

		elseif(!is_numeric($Phone)){
		//	$error = "Invalid Phone Number!!";
			myAlert("Invalid Phone Number!!", "SellerSignUp.php");
		}

		elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		 // 		$error = "Invalid email format";
		  		myAlert("Invalid email format", "SellerSignUp.php");
		}

		elseif($email_res && mysqli_num_rows($email_res)>0) {
		///	$error = "Email is already taken";
			myAlert("Email is already taken", "SellerSignUp.php");
		}




				else{
					/*
					//encryption
					$vkey = md5(time() .$Username);
					$Password = md5($Password);
					//Check if theres existing username already
					$sql = "SELECT * FROM sellers where username = '$Username'";
					$result = mysqli_query($dbconnnect,$sql);
						if($result && mysqli_num_rows($result)>0) {
							$error = "Username already taken!";

						}
						else{
							//begin insert data to database
							$command = "INSERT INTO sellers (shop_name,phone,email,username,password,vkey,country,region,province,city,barangay,postal_code,image,backimage) VALUES
						('$Shop_name','$Phone','$Email','$Username','$Password','$vkey','$Country','$Region','$Province','$City','$Barangay','$Postal_Code','$image','$backimage')";
							$result = mysqli_query($dbconnnect,$command);


							if ($result) {
								//send email
									$to = $Email;
									$subject = "Email Verification";
									$message = "<html>
										<head>
										<title>Verification Code</title>
										</head>
										<body>
										<h2>Hi! Seller Thank you for Registering to Akimorma.</h2>
										<p>Your Account:</p>
										<p>Email: ".$Email."</p>
										<p>Password: ".$_POST['password']."</p>
										<p>Please click the link below to activate your account.</p>
										<h4><a href = 'http://localhost/Ark/seller/SellerVerify.php?vkey=$vkey'>Activate My Account</h4>
										</body>
										</html>";
									$headers = "From: arkimorma@gmail.com \r\n";
									$headers .= "MIME-Version: 1.0"."\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

									mail($to, $subject, $message, $headers);
									//myAlert("Please check your Email for Verification", "SellerLogin.php");

												//if sign in success
						echo ".";
						echo"<script>
						Swal.fire(
						  'Thankyou for signing-up!',
						  'Check your email for Verification',
						  'success'
						).then(function() {
							    window.location = 'SellerLogin.php';
							})</script>";
							}




							if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
								$msg = "Image upload";
								}
								else{
								$msg = "Error";
								}
							if (move_uploaded_file($_FILES['backimage']['tmp_name'], $backtarget)) {
								$msg = "Image upload";
								}
								else{
								$msg = "Error";
								}

						

						}

				*/
				}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Arkimorma | Seller-SignUp</title>
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">



	<script>
		$(document).ready(function(){

				$("input#vali-username").on({
				  keydown: function(e) {
				    if (e.which === 32)
				      return false;
				  },
				  change: function() {
				    this.value = this.value.replace(/\s/g, "");
				  }
				});


			$("form").submit(function(event){





				event.preventDefault();
				var name = $("#vali-shop_name").val();
	 			var phone = $("#vali-phone").val();
	 			var email = $("#vali-email").val();
	 			var username = $("#vali-username").val();
	 			var password = $("#vali-password").val();
	 			var password2 = $("#vali-password2").val();

	 			var country = $("#vali-country").val();
	 			var region = $("#vali-region").val();
	 			var province = $("#vali-province").val();
	 			var city = $("#vali-city").val();
	 			var barangay = $("#vali-barangay").val();
	 			var street = $("#vali-street").val();
	 			var house_number = $("#vali-house_number").val();
	 			var post_code = $("#vali-postal_Code").val();


	 			var submit = $("#vali-submit").val();

	 			$(".form-message").load("SellerSignUpProcess.php",{
	 	
	 				name: name,
	 				phone: phone,
	 				email: email,
	 				username: username, 			
	 				password: password,
	 				password2: password2,


	 				country: country,
	 				region: region,
	 				province:province,
	 				city: city,
	 				barangay: barangay,
	 				street: street,
	 				house_number: house_number,
	 				post_code: post_code,

	 				submit: submit

	 			});





			});

		});

	</script>





</head>
<style>
	.input-error{
		box-shadow: 0 0 5px red;
	}
	.input-success{
		box-shadow: 0 0 5px green;
	}
</style>

<body>
	<?php include('includes/navigation.php'); ?>
	<div class="seller-signup">
		<div class="container">
			<h1>Arkimorma Seller Register</h1>
			<form method="post" action="SellerSignUp.php" enctype="multipart/form-data">
			
			


				<div class="row">
					
					<div class="col-sm-6">

						<p class="form-message"></p>

						

						<div class="form-group">
							<label>Shop Name:</label>
							<div>
								<input id="vali-shop_name" type="text" name="shop_name" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Phone:</label>
							<div>
								<input id="vali-phone" type="text" name="phone"  class="form-control" placeholder="0912-345-6789" maxlength="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
							</div>
						</div>

						<div class="form-group">
							<label>E-mail Address:</label>
							<div>
								<input id="vali-email" type="text" name="email" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Username:</label>
							<div>
								<input id="vali-username" type="text" name="username" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Password:</label>
							<div>
								<input id="vali-password" type="password" name="password" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Repeat Password:</label>
							<div>
								<input id="vali-password2" type="password" name="repeat-password" class="form-control">
							</div>
						</div>
					</div> <!-- COL 6 -->

					<div class="col-sm-6">
					
								<input id="vali-country" type="hidden" name="country" class="form-control" value="Philippines">
						

						
								<input id="vali-region" type="hidden" name="region" class="form-control" value="Region 3">
							

						<div class="form-group">
							<label>Province:</label>
							<div>
								<input id="vali-province" type="text" name="province" class="form-control" value="Pampanga" disabled>
							</div>
						</div>

						<div class="form-group">
							<label>City:</label>
							<div>
								<input id="vali-city" type="text" name="city" class="form-control" maxlength="15">
							</div>
						</div>

						<div class="form-group">
							<label>Barangay:</label>
							<div>
								<input id="vali-barangay" type="text" name="barangay" class="form-control"  maxlength="15">
							</div>
						</div>

						<div class="form-group">
							<label>Street:</label>
							<div>
								<input id="vali-street"  type="text" name="street"  class="form-control" maxlength="20">
							</div>
						</div>

						<div class="form-group">
							<label>House Number:</label>
							<div>
								<input id="vali-house_number" type="text" name="house_number"  class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1')" maxlength="5">
							</div>
						</div>

						<div class="form-group">
							<label>Postal Code:</label>
							<div>
								<input id="vali-postal_Code" type="text" name="postal_Code" class="form-control" maxlength="4">
							</div>
						</div>

					
						<button id="vali-submit" type="submit" class="btn btn-primary btn-lg" name="signup">Next</button>

					

					</div>

				</div>

			</form>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>


	<script src="assets/js/jquery.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="assets/plugins/fontawesome/js/fontawesome.js"></script>

</body>
</html>