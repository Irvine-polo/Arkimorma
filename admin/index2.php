<?php 

	require("ban.php");
	check_if_banned();
	session_start();
	if (isset($_SESSION['log'])) {
		header("location:AdminHomepage.php");
	}

	if(count($_POST) > 0){

		$string = "mysql:host=localhost;dbname=arkimorma_db";
		if(!$con = new PDO($string,'root','')){
			die("could not connect");
		}

 		$query = "select * from admin where username = :username && password = :password limit 1";
		$stm = $con->prepare($query);
		if($stm){
			$check = $stm->execute([
				'username'=>$_POST['username'],
				'password'=>$_POST['password'],
			]);

			if($check){
				$row = $stm->fetchAll(PDO::FETCH_ASSOC);
				if(is_array($row) && count($row) > 0){
					$row = $row[0];
					
					$_SESSION['log'] = $row;
					//success
					check_if_banned(true,true);
					
					
					header("location: index.php");
					die;
				}
			}
		}

		//failure
		echo "failed";
		check_if_banned(true,false);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Arkimorma Admin</title>
</head>
<body>
	<h1>Login</h1>

	<form method="post">
		<input type="text" name="username" placeholder="username" autocomplete="off"><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<button>Login</button>
	</form>
</body>
</html>