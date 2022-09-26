<?php 
require_once 'dbconn.php';
if (!empty($_GET['file'])) {
	$username = $_GET['username'];
	$fileName = basename($_GET['file']);
	$filePath = "../Business_permit/".$fileName;
	if (!empty($fileName) && file_exists($filePath)) {
		//define headers
		   header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$username-$fileName");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

		//read file
		readfile($filePath);
		exit();
	}
}

if (isset($_GET['approve'])) {
	$id = $_GET['approve'];

	$sql = $dbconnnect->query("SELECT * FROM sellers WHERE shop_id = '$id'");
	$row = $sql->fetch_assoc();
	$username = $row['username'];
	$email = $row['email'];
	$update = $dbconnnect->query("UPDATE sellers SET status = 'Admit' , admin_approve = 1 WHERE shop_id = '$id'");
	if ($update) {
		//send email
		$to = $email;
		$subject = "ADMIN - SELLER APPROVE";
		$message = "<html>
			<head>
			<title>SELLER APPROVE</title>
			</head>
			<body>
			<h2>Hi! ".$username.".</h2>
			<p>Your Account:</p>
			<p>Email: ".$Email."</p>
		
			<p>Youre account is already activated by the admin. Thank you for registering to Arkimorma</p>
		
			</body>
			</html>";
		$headers = "From: arkimorma@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		mail($to, $subject, $message, $headers);

		header("location:AdminSellerList.php");
	}
	
}

if (isset($_GET['deny'])) {
	$id = $_GET['deny'];

	$sql = $dbconnnect->query("SELECT * FROM sellers WHERE shop_id = '$id'");
	$row = $sql->fetch_assoc();
	$username = $row['username'];
	$email = $row['email'];
	$update = $dbconnnect->query("UPDATE sellers SET status = 'Deny'  WHERE shop_id = '$id'");
	if ($update) {
		//send email
		$to = $email;
		$subject = "ADMIN - SELLER DENY";
		$message = "<html>
			<head>
			<title>SELLER DENY</title>
			</head>
			<body>
			<h2>Hi! ".$username.".</h2>
			<p>Your Account:</p>
			<p>Email: ".$Email."</p>
		
			<p>Your account you signed in our has been denied. please email us if you have question</p>
		
			</body>
			</html>";
		$headers = "From: arkimorma@gmail.com \r\n";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\r\n";

		mail($to, $subject, $message, $headers);

		header("location:AdminSellerList.php");
	}
	
}







 ?>