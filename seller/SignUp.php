
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

		$target = "../assets/SellerAccountImages/" .basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
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
		$error = "Password not match try again!";
		}
		
			
		elseif (strlen($Password) < 8) {
			$error = "Password Need Atleast 8 Characters";
	
		}

		elseif(strlen($Phone) != 11){
			$error = "Invalid Phone Number!!";
		}

		elseif(!is_numeric($Phone)){
			$error = "Invalid Phone Number!!";
		}

		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		  		$error = "Invalid email format";
		}

		elseif($email_res && mysqli_num_rows($email_res)>0) {
			$error = "Email is already taken";
		}




				else{
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
							$command = "INSERT INTO sellers (shop_name,phone,email,username,password,vkey,country,region,province,city,barangay,postal_code,image) VALUES
						('$Shop_name','$Phone','$Email','$Username','$Password','$vkey','$Country','$Region','$Province','$City','$Barangay','$Postal_Code','$image')";
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
										<h4><a href = 'http://localhost/Arkimorma%20website/seller/SellerVerify.php?vkey=$vkey'>Activate My Account</h4>
										</body>
										</html>";
									$headers = "From: arkimorma@gmail.com \r\n";
									$headers .= "MIME-Version: 1.0"."\r\n";
									$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

									mail($to, $subject, $message, $headers);
									myAlert("Please check your Email for Verification", "../SellerLogin.php");
							}




							if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
								$msg = "Image upload";
								}
								else{
								$msg = "Error";
								}

						}

				}

	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>register seller</title>
</head>
	<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<body>
	<div class="seller-signup">
		<div class="container">
			<h1>Arkimorma Seller Register</h1>
			<form method="post" action="SignUp.php" enctype="multipart/form-data">
				<?php 	
            	echo"<p>$error</p>";
         	?>
				<div class="row">
					
					<div class="col-sm-6">
						<div class="form-group">
							<label>Upload Image:</label>
							<div>
								<input type="file" name="image" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Shop Name:</label>
							<div>
								<input type="text" name="shop_name" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Phone:</label>
							<div>
								<input type="text" name="phone"  class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>E-mail Address:</label>
							<div>
								<input type="text" name="email" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Username:</label>
							<div>
								<input type="text" name="username" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Password:</label>
							<div>
								<input type="password" name="password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Repeat Password:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>
					</div> <!-- COL 6 -->

					<div class="col-sm-6">
						<div class="form-group">
							<label>Country:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Region:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Province:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>City:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Barangay:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label>Postal Code:</label>
							<div>
								<input type="password" name="repeat-password" required="" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label> &nbsp; </label>
							<div>
								<input type="submit" name="signup" class="btn btn-primary btn-block">
							</div>
						</div>

					</div>

				</div>

			</form>
		</div>
	</div>


	<script src="assets/js/jquery.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="assets/plugins/fontawesome/js/fontawesome.js"></script>

</body>
</html>