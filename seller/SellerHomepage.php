<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php  
require_once'dbcon.php';

$error = NULL;
session_start();
function myAlert($msg, $url) {
			    echo '<script>alert("'.$msg.'");</script>';
			    echo "<script>document.location = '$url'</script>";
			}

	$selid = $_SESSION['id'];
	$selshopname = $_SESSION['shopname'];

 if (!isset($_SESSION['sellerlogin'])) {
	header("location:../SellerLogin.php");
 }

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
    window.location = "../SellerLogin.php";
});
</script>

<?php
	
	unset($_SESSION['sellerlogin']);
//	myAlert("Logout successfully", "../index.php");

 }


//edit email

if (isset($_POST['editemails'])) {
	if (!empty($_POST['backup_email'])) {
			$Recovery_backup = $_POST['backup_email'];
			$email_check = $dbconnnect->query("SELECT email FROM sellers WHERE email='$Recovery_backup'");
			if (!filter_var($Recovery_backup, FILTER_VALIDATE_EMAIL)) {
					$error= "Invalid email format";
			}
			elseif($email_check && mysqli_num_rows($email_check)>0) {
				$error = "Email is already taken";
			}
			else{
				$update = $dbconnnect->query("UPDATE sellers SET email_backup = '$Recovery_backup' WHERE shop_id = '$selid'");
				if ($update) {
					$error = "successfully";

					echo".";
				echo"<script>Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Updating Sucessfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
					    window.location = 'SellerHomepage.php';
					});</script>";
				}
				else{
					$error ="not updated";
				}
			}
		}

	if (!empty($_POST['email'])) {
		$email = $_POST['email'];
		$email_check = $dbconnnect->query("SELECT email FROM sellers WHERE email='$email'");
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error= "Invalid email format";
			}
			elseif($email_check && mysqli_num_rows($email_check)>0) {
				$error = "Email is already taken";
			}
			else{
				$update = $dbconnnect->query("UPDATE sellers SET email = '$email' WHERE shop_id = '$selid'");

				echo".";
				echo"<script>Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Updating Sucessfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
					    window.location = 'SellerHomepage.php';
					});</script>";
			}
			
	}


}

//edit information

if(isset($_POST['save'])) {
	$img = $_FILES['image']['error'];
	$can_pass = $img == 0 ? true : false;
	if ($can_pass) {
		$image = $_FILES['image']['name'];
		$target = "../assets/SellerAccountImages/" .basename($_FILES['image']['name']);
		$sql =$dbconnnect->query("UPDATE sellers SET image = '$image' WHERE shop_id = '$selid'");
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				$msg = "Image upload";
				}
				else{
				$msg = "Error";
				}
	}
	$backimg = $_FILES['backimage']['error'];
	$backcan_pass = $backimg == 0 ? true : false;
	if ($backcan_pass) {
		$image = $_FILES['backimage']['name'];
		$backtarget = "../assets/SellerAccountImages/" .basename($_FILES['backimage']['name']);
		$sql =$dbconnnect->query("UPDATE sellers SET backimage = '$image' WHERE shop_id = '$selid'");
		if (move_uploaded_file($_FILES['backimage']['tmp_name'], $backtarget)) {
				$msg = "Image upload";
				}
				else{
				$msg = "Error";
				}
	}
	
	
	$Phone = $_POST['phone'];
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$Retype_Password = $_POST['retype_password'];
	$Barangay = $_POST['barangay'];
	$City = $_POST['city'];
	$Province = $_POST['province'];
	$Region = $_POST['region'];

	

		if ($Password != $Retype_Password) {
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
		else{
			$Password = md5($Password);
			
			
			$sql =$dbconnnect->query("UPDATE sellers SET phone = '$Phone' WHERE shop_id = '$selid'");
			$sql =$dbconnnect->query("UPDATE sellers SET username = '$Username' WHERE shop_id = '$selid'");
			$sql =$dbconnnect->query("UPDATE sellers SET barangay = '$Barangay' WHERE shop_id = '$selid'");
			$sql =$dbconnnect->query( "UPDATE sellers SET city = '$City' WHERE shop_id = '$selid'");
			$sql =$dbconnnect->query("UPDATE sellers SET province = '$Province' WHERE shop_id = '$selid'");
			$sql =$dbconnnect->query( "UPDATE sellers SET region = '$Region' WHERE shop_id = '$selid'");
		
			$sqlpass =$dbconnnect->query( "UPDATE sellers SET password = '$Password' WHERE shop_id = '$selid'");

			

			
			//myAlert("Updating Successfully!", "SellerHomepage.php");

				echo".";
				echo"<script>Swal.fire({
						  position: 'center',
						  icon: 'success',
						  title: 'Updating Sucessfully',
						  showConfirmButton: false,
						  timer: 1500
						}).then(function() {
					    window.location = 'SellerHomepage.php';
					});</script>";
		}

		//myAlert($error, "SellerHomepage.php");
}




//panel

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<?php  echo "<title>Arkimorma | ".$selshopname."</title>"?>

	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
	<link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">



	
</head>
<style type="text/css">
	/*****************  star rating  ********************/
/* Rate Star*/        
    .result-container{
        width: 100px; height: 27px;
        background-color: #ccc;
        vertical-align:middle;
        display:inline-block;
        position: relative;
        top: -5px;

    }
    .rate-stars{
        width: 100px; height: 2.3em;
        background: url('../assets/css/starstar.png') no-repeat;
        background-size: cover;
        position: absolute;
        top: -2px;

    }
    .rate-bg{
        margin-top: 1px;
        height: 25px;
        background-color: #ffbe10;
        position: absolute;

    }
    
    /* Rate Star Ends*/
    
    /* Display rate count */    
    .reviewCount, .reviewScore {font-size: 14px; color: #666666; margin-left: 5px;}
    .reviewScore {font-weight: 600;}
    /* Display rate count Ends*/        

/*****************  star rating end  ********************/


.svg-icon {
  width: 1.4em;
  height: 1.4em;

}

.svg-icon path,
.svg-icon polygon,
.svg-icon rect {
  fill: black;
}


.svg-icon circle {
  stroke: #4691f6;
  stroke-width: 1;
}

</style>
<body>

	<?php include('../includes/seller-navigation.php');

 //star rate
    $shop_id = $selid;

        $ratequery = "SELECT shop_id FROM feedback_table WHERE shop_id = '$selid' "; 
        $result =mysqli_query($dbconnnect, $ratequery);   
       	if ($result->num_rows == 0) {
       		$rate_times = 0;
          $rate_value = 0;
          $rate_bg = 0;
       	}else{

       	$ratequery = "SELECT * FROM feedback_table WHERE shop_id = '$selid' "; 
      	$rateres =mysqli_query($dbconnnect, $ratequery);   

        if ($rateres) {
            while($data = mysqli_fetch_assoc($rateres)){
                $rate_db[] = $data;
                $sum_rates[] = $data['rate'];
            }
            if(count($rate_db)){
                $rate_times = count($rate_db);
                $sum_rates = array_sum($sum_rates);
                $rate_value = $sum_rates/$rate_times;
                $rate_bg = (($rate_value)/5)*100;
            }
   			 }
   			}
								
   			 ?>
         



   	<style type="text/css">
   		body{
   			margin: 0px;
   			padding: 0px;
   		}
   		#background{

   			width: 100%;
   			height: 80vh;
   			background-repeat: no-repeat, repeat;
   			background-position: center;
   			background-size: cover;
   			margin-bottom: -200px;
   		}

   		.seller_pic img{
   			border-radius: 100em;
   		}

   	</style>

	<?php 
	
	$command = "SELECT * FROM sellers WHERE shop_id='$selid'";
	$exe = mysqli_query($dbconnnect,$command);
	while ($row = mysqli_fetch_assoc($exe)) {
		$email = $row['email'];

		if (!empty($row['backimage'])) {
			echo'<img id="background" src="../assets/SellerAccountImages/'.$row["backimage"].'">';
		}

		?>


		
		<div class="container">
		<div class="container seller-profile">

				<div class="seller_pic col-xs-6" style="margin-left:25em;">
					<?php 

					if ($row['image'] == "") {
						echo'<img src="../assets/SellerAccountImages/default_image.png" style="height: 50vh; width: auto; object-fit: cover;">';
					
					}
					else{
						echo'<img src="../assets/SellerAccountImages/'.$row["image"].'" style="height: 50vh; width: auto; object-fit: cover;">';
					
					}



					 ?>
				</div>
				<div class="row" style="margin-left:25em;">
				

					<div class="seller_pic col-xs-8" >
							<h3><?php echo$row['username'] ?></h3>

						<h5 class="text-left">	<svg class="svg-icon" viewBox="0 0 20 20">
						<path fill="none" d="M10,15.654c-0.417,0-0.754,0.338-0.754,0.754S9.583,17.162,10,17.162s0.754-0.338,0.754-0.754S10.417,15.654,10,15.654z M14.523,1.33H5.477c-0.833,0-1.508,0.675-1.508,1.508v14.324c0,0.833,0.675,1.508,1.508,1.508h9.047c0.833,0,1.508-0.675,1.508-1.508V2.838C16.031,2.005,15.356,1.33,14.523,1.33z M15.277,17.162c0,0.416-0.338,0.754-0.754,0.754H5.477c-0.417,0-0.754-0.338-0.754-0.754V2.838c0-0.417,0.337-0.754,0.754-0.754h9.047c0.416,0,0.754,0.337,0.754,0.754V17.162zM13.77,2.838H6.23c-0.417,0-0.754,0.337-0.754,0.754v10.555c0,0.416,0.337,0.754,0.754,0.754h7.539c0.416,0,0.754-0.338,0.754-0.754V3.592C14.523,3.175,14.186,2.838,13.77,2.838z M13.77,13.77c0,0.208-0.169,0.377-0.377,0.377H6.607c-0.208,0-0.377-0.169-0.377-0.377V3.969c0-0.208,0.169-0.377,0.377-0.377h6.785c0.208,0,0.377,0.169,0.377,0.377V13.77z"></path>
					</svg> <?php echo $row['phone']; ?></h5>

					<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
						<path d="M17.218,2.268L2.477,8.388C2.13,8.535,2.164,9.05,2.542,9.134L9.33,10.67l1.535,6.787c0.083,0.377,0.602,0.415,0.745,0.065l6.123-14.74C17.866,2.46,17.539,2.134,17.218,2.268 M3.92,8.641l11.772-4.89L9.535,9.909L3.92,8.641z M11.358,16.078l-1.268-5.613l6.157-6.157L11.358,16.078z"></path>
					</svg> <?php echo $row['email']; ?>
				</h5>

				<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M10,0.186c-3.427,0-6.204,2.778-6.204,6.204c0,5.471,6.204,6.806,6.204,13.424c0-6.618,6.204-7.953,6.204-13.424C16.204,2.964,13.427,0.186,10,0.186z M10,14.453c-0.66-1.125-1.462-2.076-2.219-2.974C6.36,9.797,5.239,8.469,5.239,6.39C5.239,3.764,7.374,1.63,10,1.63c2.625,0,4.761,2.135,4.761,4.761c0,2.078-1.121,3.407-2.541,5.089C11.462,12.377,10.66,13.328,10,14.453z"></path>
							<circle fill="none" cx="10" cy="5.67" r="1.608"></circle>
						</svg> <?php echo $row['barangay']." ".$row['city']." ".$row['province'] ?></h5>



						<div style="margin-top: 10px">

							<?php 
							$fol_sql = $dbconnnect->query("SELECT shop_id FROM follow_table WHERE shop_id = '$shop_id'");
							$follower = mysqli_num_rows($fol_sql);

							 ?>
							<p style="font-size:20px; padding: 10px;"><b>Followers: </b><?php echo$follower ?></p>
							   	
			               <div class="result-container">

				               <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
				               <div class="rate-stars"></div>
			            	</div>                    
			            	<span class="reviewScore"><?php echo substr($rate_value,0,3); ?></span><span class="reviewCount">(<?php echo $rate_times; ?> reviews)</span>

								<br>
					</div>


					</div>
				
				</div>
				<br><br>

				<div class="information col-xs-7" style="margin-left:200px;">
				
					<h3>Information</h3>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group row">
								<div class="col-xs-3 text-right">
									<label for="">Shop ID:</label>
								</div>
								<div class="col-xs-9">
									<input  type="int" name="shop_id" class="form-control" value=" <?php echo $row['shop_id']; ?>"  disabled>
								</div>
							</div>
						</div>
						<div class="col-xs-6">
						<div class="form-group row">
								<div class="col-xs-3 text-right">
									<label for="">Shop:</label>
								</div>
								<div class="col-xs-9">
									<input  type="text" name="shop" class="form-control" value=" <?php echo $row['shop_name']; ?>"  disabled>
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
									<input  type="text" name="phone" class="form-control" value=" <?php echo $row['phone']; ?>" disabled>
								</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group row">
								<div class="col-xs-3 text-right">
									<label for="">Username:</label>
								</div>
								<div class="col-xs-9">
									<input  type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<form method="POST" action="SellerHomepage.php" >
								<div class="form-group row">
									<div class="col-xs-3 text-right">
										<label for="">Email:</label>
									</div>
									<div class="col-xs-9">
										<input id="e" type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>"  disabled>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div id="re_email" class="form-group row" >
									<div class="col-xs-3 text-right">
										<label for="">Backup Email (Optional):</label>
									</div>
									<div class="col-xs-9">
										<input id="be" type="text" name="backup_email" class="form-control" value="<?php echo$row['email_backup']; ?>" disabled>
									</div>
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-12">
								<input id ="e_save" class="btn btn-sm btn-primary hidden"  type="submit" name="editemails" value="Save" style="width: 15%;"> 
								<button id="e_edit" type="button" onclick="myemail()" class="btn btn-sm btn-primary" style="width: 15%;">Add Email</button><br>
								<?php echo $error; ?>
							</div>
						</div>
					</form>
				</div>

			</div>


			<h3>Address</h3>
			<div class="form-group">
				<label for="">Barangay:</label>
				<div>
					<input type="text" name="barangay" class="form-control" value=" <?php echo $row['barangay']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label for="">City:</label>
				<div>
					<input  type="text" name="city" class="form-control" value=" <?php echo $row['city']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label for="">Province:</label>
				<div>
					<input  type="text" name="city" class="form-control" value=" <?php echo $row['province']; ?>" disabled>
				</div>
			</div>

			<div class="form-group">
				<label for="">Region:</label>
				<div>
					<input type="text" name="region" class="form-control" value=" <?php echo $row['region']; ?>" disabled>
				</div>
			</div>

			<button onclick="myFunction()" class="btn btn-sm btn-primary">Edit Information</button>


			<style type="text/css">
				#panel{
					background: #DCDCDC;
					padding: 30px;

					position: absolute;
					margin-top: -50em;
					right: 40%;
				}
			</style>
			<div id="panel"  hidden>
				<form method="POST" action="SellerHomepage.php" enctype="multipart/form-data">

					<div class="form-group">
						<label for="">Shop_id:</label>
						<div>
							<input  type="int" name="shop_id" class="form-control" value="<?php echo $selid; ?>"  disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="">background:</label>
						<div>
							<input type="file" name="backimage" class="form-control" >
						</div>
					</div>

					<div class="form-group">
						<label for="">Image:</label>
						<div>
							<input type="file" name="image" class="form-control" >
						</div>
					</div>

					<div class="form-group">
						<label for="">Shop:</label>
						<div>
							<input  type="text" name="shop" class="form-control" value="<?php echo $row['shop_name']; ?>"  >
						</div>
					</div>

					<div class="form-group">
						<label for="">Phone:</label>
						<div>
							<input  type="text" name="phone" class="form-control" value="<?php echo $row['phone']; ?>"  >
						</div>
					</div>

					<div class="form-group">
						<label for="">Username:</label>
						<div>
							<input  type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" >
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
						<input  type="submit" name="save" value="Save" class="btn btn-sm btn-primary">
					</div>
						
				</form>
				<button onclick="myFunction2()" class="btn btn-sm btn-primary">Cancel</button>
			</div>



   
		</div>


		<?php
	}	
	 ?>
	 <br>
	 <br>
	 <br>
	 <br>

	 <style type="text/css">
	 .comments{
		background: whitesmoke;
		padding: 20px;
	}
	.right{
		text-align: center;
	
	}
	 </style>
	  <div class="container">

		 <?php 
			$sql = $dbconnnect->query("SELECT shop_id,rate,comment,user_id,username,date_post,product FROM feedback_table WHERE shop_id = '$selid' ORDER BY `feedback_table`.`date_post` DESC limit 5");

			$total = $dbconnnect->query("SELECT shop_id,rate,comment,user_id,username,date_post,product FROM feedback_table WHERE shop_id = '$selid' ORDER BY `feedback_table`.`date_post` DESC ");


			$num_row = mysqli_num_rows($sql);
			$total = mysqli_num_rows($total);
			echo"<h3>Comments (".$total.")</h3>";
	
		?>

		<br>
		<br>	
		<br>
	 		


		<?php
		while ($row = mysqli_fetch_assoc($sql)) {
		?>	
		<div class="comments">
			<b style="font-size: 20px;"><?php echo$row['username']; ?></b><br>
			<?php 
			$star = $row['rate'];
			for ($i=0; $i < $star ; $i++) { 
				echo '<span style="color:orange; font-size: 15px;">&#9733; </span>';

			} ?>
				
				<p><?php echo$row['comment'] ?></p>
				<i><?php echo$row['date_post'] ?> | <?php echo$row['product'] ?></i>
		</div>
				<br><br>






		<?php 
		}
		if ($num_row >=5) {
			echo"<div class='right'>";
			echo"<h5><a href='SellerShopComments.php?shop=".$shop_id."' class='btn btn-info'>See all</a></h5>";
			echo"</div>";
		}
		 ?>
	 </div>






	 



<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

<script>
function myFunction() {
  document.getElementById("panel").hidden = false;
}
function myFunction2() {
  document.getElementById("panel").hidden = true;
}
function myemail() {
  document.getElementById("e").disabled = false;
  document.getElementById("be").disabled = false;
  document.getElementById("e_edit").hidden = false;
  document.getElementById("e_save").classList.remove("hidden");

}



</script>


	
</body>
</html>

