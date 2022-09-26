<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	 #errormess{
		color: red;
		font-size: 14px;
	}
	#success{
		color: green;
		font-size: 14px;
	}
</style>
<?php 
require_once 'dbcon.php';







if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$birthday = $_POST['birthday'];

	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$country = $_POST['country'];
	$region = $_POST['region'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];
	$street = $_POST['street'];
	$house_number = $_POST['house_number'];
	$postal_code = $_POST['post_code'];


	$takenEmail = false;
	$takenUsername = false;
	$takenPhone = false;

	
	$sql = $dbconnnect->query("SELECT * FROM user where username = '$username'");
	$username_exist = mysqli_num_rows($sql);

	$sql_check_email = $dbconnnect->query("SELECT * FROM user where email = '$email'");
	$Email_exist = mysqli_num_rows($sql_check_email);

	$sql_check_phone = $dbconnnect->query("SELECT * FROM user where phone = '$phone'");
	$phone_exist = mysqli_num_rows($sql_check_phone);



		
		




	$errorFullname = false;
	$errorGender = false;
	$errorAge = false;
	$errorPhone = false;
	$errorEmail = false;
	$errorUsername = false;
	$errorPassword = false;
	$errorPassword2 = false;
	
	$errorCountry = false;
	$errorRegion = false;
	$errorProvince = false;
	$errorCity = false;
	$errorBarangay = false;
	$errorStreet = false;
	$errorHouse = false;
	$errorPostcode = false;


	$success = false;




	

	//birthday age
	$today = date('m/d/y');
	$age = date_diff(date_create($birthday), date_create($today));
	$Age = $age->format("%y");



	//password validation
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);


	if (strlen($name) > 25 ) {
		echo"<br><span id='errormess'>Fullname should be less than 25 letters!</span>";
		$errorFullname = true;
	}
	elseif (strlen($name) < 8 || empty($name)) {
		echo"<br><span id='errormess'>Fullname should be atleast 8 letters!</span>";
		$errorFullname = true;
	}
	elseif ($gender =="not define") {
		echo"<br><span id='errormess'>Choose gender!</span>";
		$errorGender = true;

	}
	elseif ($Age < 18 ) {
		echo"<br><span id='errormess'>Age should be 18 above!</span>";
		$errorAge = true;
	}
	elseif(strlen($phone) < 11){
		echo"<br><span id='errormess'>Invalid phone number!</span>";
		$errorPhone = true;
	}
	elseif ($phone_exist > 0) {
			echo"<br><span id='errormess'>Phone number is already registered!</span>";
			$takenPhone = true;
		}

	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo"<br><span id='errormess'>Invalid email address</span>";
		$errorEmail = true;
	}
	elseif ($Email_exist > 0) {
			echo"<br><span id='errormess'>This email is already registered!</span>";
			$takenEmail = true;
	}


	elseif ( strlen($username) < 8 || strlen($username) > 15 ) {
		if (strlen($username) < 8) {
			echo"<br><span id='errormess'>Username should be atleast 8 letters</span>";
			$errorUsername = true;
		}
		elseif (strlen($username) > 15) {
			echo"<br><span id='errormess'>Username should be below 15 letters</span>";
			$errorUsername = true;
		}
	}
	elseif ($username_exist > 0) {
			echo"<br><span id='errormess'>Username already taken!</span>";
			$takenUsername = true;
		}
	
	
	elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
	    echo "<br><span id='errormess'>Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>";
	    $errorPassword = true;
	}
	elseif ($password != $password2) {
		echo"<br><span id='errormess'>Password not match!</span>";
		$errorPassword2 = true;

	}

	elseif (empty($country) || empty($region) || empty($province) || empty($city) || empty($barangay)  || empty($street) || empty($house_number)) {
		echo"<br><span id='errormess'>Complete Home Address!</span>";
		$errorCountry = true;
		$errorRegion = true;
		$errorProvince = true;
		$errorCity = true;
		$errorBarangay = true;
		$errorStreet = true;
		$errorHouse = true;
		
	}
		elseif (strlen($postal_code) != 4) {
		echo"<br><span id='errormess'>Invalid postal code!</span>";
		$errorPostcode = true;	
	}









	
	else{
		echo"<br><span id='success'>Register Successful!</span>";
		$success = true;

		//encryption
		$vkey = md5(time() .$username );
		$password  = md5($password);
		//check if theres any existing username already
		
			
			
			//begin insert data to database
		
			
			$command = "INSERT INTO user (fullname,gender,birthday,phone,email,username,password,vkey,country,region,province,city,barangay,street,house_number,postal_code) VALUES
			('$name','$gender','$birthday','$phone','$email','$username','$password','$vkey','$country','$region','$province','$city','$barangay','$street','$house_number','$postal_code')";

			$result = mysqli_query($dbconnnect,$command);


			if ($result) {
				//send email
				$to = $email;
				$subject = "Email Verification";
				$message = "<html>
					<head>
					<title>Verification Code</title>
					</head>
					<body>
					<h2>Thank you for Registering to Akimorma.</h2>
					<p>Your Account:</p>
					<p>Email: ".$email."</p>
					<p></p>
					<p>Hey ".$username.",
					Thanks for registering for an account on Arkimorma! Before we get started,<br> we just need to confirm that this is you. Click below to verify your email address:.</p>
					<h4><a href = 'http://localhost/ark/user/UserVerify.php?vkey=$vkey'>Activate My Account</h4>
					</body>
					</html>";
				$headers = "From: arkimorma@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0"."\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

				mail($to, $subject, $message, $headers);
				//header('location:UserLogin.php');
				
				echo ".";
				echo"<script>
					Swal.fire(
					  'Thankyou for signing-up!',
					  'Check your email for Verification',
					  'success'
					).then(function() {
							    window.location = 'UserLogin.php';
						})</script>";


	
			
			}
			
		
				
		

			

		

	}






	} // end if 


 ?>

 <script>
 









 	$("#vali-email, #vali-username , #vali-phone,#vali-name, #vali-gender , #vali-birthday,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_code").removeClass("input-error");

 	var takenEmail = "<?php echo$takenEmail; ?>"
 	var takenUsername = "<?php echo$takenUsername; ?>"
 	var takenPhone = "<?php echo$takenPhone; ?>"

 	var errorFullname = "<?php echo $errorFullname; ?>";
 	var errorGender = "<?php echo $errorGender; ?>";
 	var errorAge = "<?php echo $errorAge; ?>";
 	var errorPhone = "<?php echo$errorPhone ?>";
 	var errorEmail = "<?php echo $errorEmail; ?>";
 	var errorUsername = "<?php echo$errorUsername; ?>"
 	var errorPassword = "<?php echo$errorPassword; ?>"
 	var errorPassword2 = "<?php echo$errorPassword2; ?>"

 	var errorCountry = "<?php echo$errorCountry; ?>"
 	var errorRegion = "<?php echo$errorRegion; ?>"
 	var errorProvince = "<?php echo$errorProvince; ?>"
 	var errorCity = "<?php echo$errorCity; ?>"
 	var errorBarangay = "<?php echo$errorBarangay; ?>"
 	var errorStreet = "<?php echo$errorStreet; ?>"
 	var errorHouse = "<?php echo$errorHouse; ?>"
 	var errorPostcode = "<?php echo$errorPostcode; ?>"

 	var success = "<?php echo$success; ?>"



 	if (takenEmail == true) {
 		$("#vali-email").addClass("input-error");
 	}
 	else if (takenUsername == true) {
 		$("#vali-username").addClass("input-error");
 	}
 	else if (takenPhone == true) {
 		$("#vali-phone").addClass("input-error");
 	}



 	else if (errorFullname == true) {
 		$("#vali-name").addClass("input-error");
 	}

 	else if (errorGender == true) {
 		$("#vali-gender").addClass("input-error");
 	}

 	else if (errorAge == true) {
 		$("#vali-birthday").addClass("input-error");
 		//$("#vali-gender").removeClass("input-error");
 	}
 	else if (errorPhone == true) {
 		$("#vali-phone").addClass("input-error");
 		//$("#vali-phone").removeClass("input-error");
 	}
 	else if (errorEmail == true) {
 		$("#vali-email").addClass("input-error");
 		//$("#vali-birthday").removeClass("input-error");
 	}
 	else if (errorUsername == true) {
 		$("#vali-username").addClass("input-error");
 	}
 	else if (errorPassword == true) {
 		//$("#vali-username").removeClass("input-error");
 		$("#vali-password").addClass("input-error");
 	}
 	else if (errorPassword2 == true) {
 		$("#vali-password2").addClass("input-error");
 	}


	else if (errorCountry == true) {
 
		$("#vali-city").addClass("input-error");
		$("#vali-barangay").addClass("input-error");
		$("#vali-street").addClass("input-error");
		$("#vali-house_number").addClass("input-error");
		$("#vali-postal_code").addClass("input-error");
		

 	}
 	else if (errorPostcode == true) {
 		$("#vali-postal_code").addClass("input-error");
 	}



 	else if (success == true) {
 		$("#vali-email, #vali-username , #vali-phone,#vali-name, #vali-gender , #vali-birthday,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_code").addClass("input-success");
 	}











 	
 	if ( errorEmail == false && takenEmail == false && takenUsername == false && takenPhone == false && errorFullname == false && errorGender == false && errorAge == false && errorPhone == false && errorEmail == false && errorUsername == false && errorPassword == false && errorPassword2 == false && errorCountry == false && errorPostcode == false) {
 		$("#vali-email, #vali-username , #vali-phone,#vali-name, #vali-gender , #vali-birthday,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_code").val("");
 	}

 </script>