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
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	

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
	$takenShopname = false;


	$sql = $dbconnnect->query("SELECT * FROM sellers where username = '$username'");
	$username_exist = mysqli_num_rows($sql);

	$sql_check_email = $dbconnnect->query("SELECT * FROM sellers where email = '$email'");
	$Email_exist = mysqli_num_rows($sql_check_email);

	$sql_check_phone = $dbconnnect->query("SELECT * FROM sellers where phone = '$phone'");
	$phone_exist = mysqli_num_rows($sql_check_phone);

	$sql_check_shopname =$dbconnnect->query("SELECT * FROM sellers WHERE shop_name ='$name'");
	$shopname_exist = mysqli_num_rows($sql_check_shopname);



		
		
		
		

	$errorFullname = false;
	

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


	



	//password validation
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);


	if (strlen($name) > 25 ) {
		echo"<br><span id='errormess'>Shop name should be less than 25 letters!</span>";
		$errorFullname = true;

	}
	elseif (strlen($name) < 8 || empty($name)) {
		echo"<br><span id='errormess'>Shop name should be atleast 8 letters!</span>";
		$errorFullname = true;

	}
	elseif ($shopname_exist > 0) {
			echo"<br><span id='errormess'>Shop name is already taken!</span>";
			$takenShopname = true;

	}

	elseif(strlen($phone) < 11 ){
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


	elseif (strlen($username) < 8 || strlen($username) > 15 ) {
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
		$vkey = md5(time() .$username);
		$password = md5($password);
		
			
			//begin insert data to database
			$command = "INSERT INTO sellers (shop_name,phone,email,username,password,vkey,country,region,province,city,barangay,street,house_number,postal_code) VALUES
		('$name','$phone','$email','$username','$password','$vkey','$country','$region','$province','$city','$barangay','$street','$house_number','$postal_code')";
			$result = mysqli_query($dbconnnect,$command);


			if ($result) {
				?>
				<script>
			  	  window.location = 'SellerUploadFile.php?username=<?php echo$username ?>';
			    </script>
			<?php
			}




		

				

				

				
				



	}





}






 ?>

 <script>
 	

 	$("#vali-email, #vali-username , #vali-phone,#vali-shop_name,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_Code").removeClass("input-error");

 	var takenEmail = "<?php echo$takenEmail; ?>"
 	var takenUsername = "<?php echo$takenUsername; ?>"
 	var takenPhone = "<?php echo$takenPhone; ?>"
 	var takenShopname = "<?php echo$takenShopname; ?>"

 	var errorFullname = "<?php echo $errorFullname; ?>";

 
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

 	if (takenShopname == true) {
 		$("#vali-shop_name").addClass("input-error");
 	}

 	else if (errorFullname == true) {
 		$("#vali-shop_name").addClass("input-error");
 	}
 	else if (errorPhone == true) {
 		$("#vali-phone").addClass("input-error");
 		//$("#vali-phone").removeClass("input-error");
 	}
 	else if (takenPhone == true) {
 		$("#vali-phone").addClass("input-error");
 	}



 	else if (takenEmail == true) {
 		$("#vali-email").addClass("input-error");
 	}
 	else if (takenUsername == true) {
 		$("#vali-username").addClass("input-error");
 	}
 	else if (errorPassword == true) {
 		//$("#vali-username").removeClass("input-error");
 		$("#vali-password").addClass("input-error");
 	}
 	else if (errorPassword2 == true) {
 		$("#vali-password2").addClass("input-error");
 	}



 	

 


 	
 	else if (errorEmail == true) {
 		$("#vali-email").addClass("input-error");
 		//$("#vali-birthday").removeClass("input-error");
 	}
 	else if (errorUsername == true) {
 		$("#vali-username").addClass("input-error");
 	}
 	


	else if (errorCity == true) {
 
		$("#vali-city").addClass("input-error");
		$("#vali-barangay").addClass("input-error");
		$("#vali-street").addClass("input-error");
		$("#vali-house_number").addClass("input-error");
		$("#vali-postal_code").addClass("input-error");
		$("#vali-postal_Code").addClass("input-error");
		

 	}
 	else if (errorPostcode == true) {
 		$("#vali-postal_Code").addClass("input-error");
 	}



 	else if (success == true) {
 		$("#vali-email, #vali-username , #vali-phone,#vali-shop_name,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_Code").addClass("input-success");
 	}











 	
 	if ( errorEmail == false && takenEmail == false && takenUsername == false && takenPhone == false && errorFullname == false && errorPhone == false && errorEmail == false && errorUsername == false && errorPassword == false && errorPassword2 == false && errorCountry == false && errorPostcode == false) {
 		$("#vali-email, #vali-username , #vali-phone,#vali-name, #vali-gender , #vali-birthday,#vali-phone, #vali-email , #vali-password ,#vali-password2,#vali-country,#vali-region,#vali-province,#vali-city,#vali-barangay,#vali-street,#vali-house_number,#vali-postal_code").val("");
 	}



 </script>