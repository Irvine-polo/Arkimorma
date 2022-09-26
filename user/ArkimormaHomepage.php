<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
include('../includes/user-navigation.php'); 
require_once'dbcon.php';

	function myAlert($msg, $url) {
	    echo '<script language="javascript">alert("'.$msg.'");</script>';
	    echo "<script>document.location = '$url'</script>";
	}
$error = NULL;

 ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | User Homepage</title>
</head>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
	 <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">



<body style="margin-bottom: 50px;">
	<div class="container">
		<h1 
		style="margin-left: 41%;font-family: 'Lobster', cursive;
			font-size: 50px;
			color: black;
			margin-bottom: 50px;
			">My Profile</h1>

<br>

<?php

	
 if (!isset($_SESSION['userlogin'])) {
 	header("location:../UserLogin.php");
 }
 ?>


 <?php
 

 if (isset($_GET['logout'])) {

echo".";
?>
<script>
Swal.fire({
  title: 'Signing-Out',
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
}).then(function() {
    window.location = "../UserLogin.php";
});
</script>
<?php

 	unset($_SESSION['userlogin']);
 	session_destroy();

	//myAlert("Logout successfully", "../index.php");
}
 
$user_id = $_SESSION['user-id'];
$user_fullname = $_SESSION['user-fullname'];

//user email

if (isset($_POST['user_editemails'])) {
	if (!empty($_POST['backup_email'])) {
			$Recovery_backup = $_POST['backup_email'];
			$email_check = $dbconnnect->query("SELECT email FROM user WHERE email='$Recovery_backup'");
			if (!filter_var($Recovery_backup, FILTER_VALIDATE_EMAIL)) {
			  		$error= "Invalid email format";
			}
			elseif($email_check && mysqli_num_rows($email_check)>0) {
				$error = "Email is already taken";
			}
			else{
				$update = $dbconnnect->query("UPDATE user SET email_backup = '$Recovery_backup' WHERE user_id = '$user_id'");
				if ($update) {
					$error = "successfully";
				}
				else{
					$error ="not updated";
				}
			}
		}

	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
		$email_check = $dbconnnect->query("SELECT email FROM user WHERE email='$email'");
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  		$error= "Invalid email format";
			}
			elseif($email_check && mysqli_num_rows($email_check)>0) {
				$error = "Email is already taken";
			}
			else{
				$update = $dbconnnect->query("UPDATE user SET email = '$email' WHERE user_id = '$user_id'");
			}
			
	}

}

	?>

<?php 
	
	$command = "SELECT * FROM user WHERE user_id ='$user_id'";
	$exe = mysqli_query($dbconnnect,$command);

	while ($row = mysqli_fetch_assoc($exe)) {

		$email = $row['email'];
		?>
		<div class="container seller-profile">
			<div class="row">
				<div class="seller_pic col-xs-5">
					<?php 
					if ($row['userimage'] == "") {
						?>
						<img src="../assets/userImage/default_image.png" style="height: 300px; width: 300px;">


						<?php
					}
					else{
						?>
						<img src="../assets/userImage/<?php echo $row['userimage']; ?>" style="height: 300px; width: 300px;">

						<?php
					}
					?>
				</div>
				
			
				<div class="information col-xs-6">
					<h3>Information</h3>
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">User ID:</label>
									</div>
									<div class="col-xs-9">
										<input  type="int" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>"  disabled="">
									</div>
								</div>
							</div>
							
							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Name:</label>
									</div>
									<div class="col-xs-9">
										<input  type="text" name="fullname" class="form-control" value="<?php echo $row['fullname']; ?>"  disabled="">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Gender:</label>
									</div>
									<div class="col-xs-9">
										<input  type="text" name="gender" class="form-control" value=" <?php echo $row['gender']; ?>" disabled="">
									</div>
								</div>
							</div>

							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Birthday:</label>
									</div>
									<div class="col-xs-9">
										<input  type="text" name="birthday" class="form-control" value=" <?php $date = $row['birthday'];echo date('M-d-Y', strtotime($date)); ?>" disabled="">
										             
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Phone:</label>
									</div>
									<div class="col-xs-9">
										<input  type="text" name="phone" class="form-control" value=" <?php echo $row['phone']; ?>" disabled="">
									</div>
								</div>
							</div>

							<div class="col-xs-6">
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Username:</label>
									</div>
									<div class="col-xs-9">
										<input  type="text" name="username" class="form-control" value=" <?php echo $row['username']; ?>" disabled="">
									</div>
								</div>
							</div>
						</div>

						<form method="POST" action="ArkimormaHomepage.php" >
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group row">
										<div class="col-xs-3 text-right">
											<label for="">Email:</label>
										</div>
										<div class="col-xs-9">
											<input id="e" type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>"  disabled="">
										</div>
									</div>
								</div>

								<div class="col-xs-6">
									<div id="re_email" class="form-group row" hidden>
										<div class="col-xs-3 text-right">
											<label for="">Backup Email (Optional):</label>
										</div>
										<div class="col-xs-9">
											<input type="text" name="backup_email" class="form-control" value="<?php echo$row['email_backup']; ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								<input id ="e_save" hidden type="submit"  name="user_editemails" value="Save">		
							</div>
						</form>
						<button id="e_edit"  onclick="myemail()">Add Email</button><br>
						<?php echo$error; ?>

						
				</div>
			</div>
			<h3>Address</h3>

			<div class="form-group">
				<label for="">Barangay:</label>
				<div>
					<input type="text" name="barangay" value=" <?php echo $row['barangay']; ?>" class="form-control" disabled="">
				</div>
			</div>

			<div class="form-group">
				<label for="">City:</label>
				<div>
					<input  type="text" name="city" value=" <?php echo $row['city']; ?>" class="form-control" disabled="">
				</div>
			</div>

			<div class="form-group">
				<label for="">Province:</label>
				<div>
					<input  type="text" name="province" value=" <?php echo $row['province']; ?>" class="form-control" disabled="">
				</div>
			</div>

			<div class="form-group">
				<label for="">Region:</label>
				<div>
					<input type="text" name="region" value=" <?php echo $row['region']; ?>" class="form-control" disabled="">
				</div>
			</div>
	
			<button onclick="myFunction()">Edit Information</button>


			<!-----------  pop up form ------>


			<style type="text/css">
				#edit_panel{
					background: #DCDCDC;
					padding: 30px;

					position: absolute;
					top: 50px;

				}


			

			</style>

			<div id="edit_panel" hidden>
				<form action="editprofile.php" method="POST" enctype="multipart/form-data">

					<div class="form-group">
	
						<div>
							<input  type="hidden" name="user_id" value="<?php echo $user_id; ?>"  disabled="" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Name:</label>
						<div>
							<input  type="text" name="fullname" value="<?php echo $row['fullname']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label>Image:</label>
						<div>
							<input type="file" name="image"  class="form-control">
						</div>
					</div>

					<div class="form-group">
						<?php 
						$sql = $dbconnnect->query("SELECT gender FROM user WHERE user_id = '$user_id'");
						$gen = $sql->fetch_assoc();
						 ?>
						<label for="">Gender:</label>
						<div>
							<?php 
							if ($gen['gender'] == "Male") {
								echo '<label><input type="radio" name="g1"  value="Male" required checked="checked"> Male </label>';
							}
							else{
								echo'<label><input type="radio" name="g1"  value="Male" required > Male </label> ';
							}

							if ($gen['gender'] == "Female") {
								echo '<label><input type="radio" name="g1"  value="Female" required checked="checked"> Female </label> ';
							}
							else{
								echo'<label><input type="radio" name="g1"  value="Female" required> Female </label> ';
							}

							if ($gen['gender'] == "Others") {
								echo '	<label><input type="radio" name="g1"  value="Others" required checked="checked"> Others </label> ';
							}
							else{
								echo'	<label><input type="radio" name="g1"  value="Others" required> Others </label>  ';
							}
								 ?>
							 
						 
						</div>
					</div>

					<div class="form-group">
						<label for="">Birthday:</label>
						<div>
							<input type="date" name="birthday" value="<?php echo $row['birthday']; ?>" required="" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Phone:</label>
						<div>
							<input  type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Username:</label>
						<div>
							<input  type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Password:</label>
						<div>
							<input type="password" name="password" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="">Retype-Password:</label>
						<div>
							<input type="password" name="retype_password" class="form-control" required>
						</div>
					</div>


					<h3>Address</h3>
					<div class="form-group">
						<label for="">Barangay:</label>
						<div>
							<input type="text" name="barangay" value="<?php echo $row['barangay']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">City:</label>
						<div>
							<input  type="text" name="city" value="<?php echo $row['city']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Province:</label>
						<div>
							<input  type="text" name="province" value="<?php echo $row['province']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="">Region:</label>
						<div>
							<input type="text" name="region" value="<?php echo $row['region']; ?>" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<input  type="submit" name="user_save" value="Save" >
					</div>

				</form>
				<div class="form-group">
					<button onclick="myCancel()">Cancel</button>
				</div>
			</div>

		<?php
	}	
	echo $error;
	 ?>

</div>
	</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
<script>
function myFunction() {
  document.getElementById("edit_panel").hidden = false;

}
function myCancel() {
  document.getElementById("edit_panel").hidden = true;
}
function myemail() {
  document.getElementById("e").disabled = false;
  document.getElementById("e_edit").hidden = true;
  document.getElementById("e_save").hidden = false;
  document.getElementById("re_email").hidden = false;
}


</script>


</body>
</html>