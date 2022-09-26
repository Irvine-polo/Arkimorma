<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
$error = NULL;
require_once'dbcon.php';
session_start();
function myAlert($msg, $url) {
			    echo '<script language="javascript">alert("'.$msg.'");</script>';
			    echo "<script>document.location = '$url'</script>";
			}

// echo $error ;


if (isset($_POST['user_save'])) {
	$user_id = $_SESSION['user-id'];
	$img = $_FILES['image']['error'];
	$can_pass = $img == 0 ? true : false;
	if ($can_pass) {
		$image = $_FILES['image']['name'];
		$target = "../assets/userImage/" .basename($_FILES['image']['name']);
		$sql =$dbconnnect->query("UPDATE user SET userimage = '$image' WHERE user_id = '$user_id'");
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
				$msg = "Image upload";
				}
				else{
				$msg = "Error";
				}
	}

	
	$Name = $_POST['fullname'];
    $Gender = $_POST['g1'];
	$Birthday = $_POST['birthday'];
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

			echo".";
			echo"<script>Swal.fire({
					  position: 'center',
					  icon: 'success',
					  title: 'Updating Sucessfully',
					  showConfirmButton: false,
					  timer: 1500
					}).then(function() {
				    window.location = 'ArkimormaHomepage.php';
				});</script>";

			$Password = md5($Password);
			
			$sql =$dbconnnect->query("UPDATE user SET fullname = '$Name' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query("UPDATE user SET gender = '$Gender' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query("UPDATE user SET birthday = '$Birthday' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query("UPDATE user SET username = '$Username' WHERE user_id = '$user_id'");

			$sql =$dbconnnect->query("UPDATE user SET phone = '$Phone' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query("UPDATE user SET barangay = '$Barangay' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query( "UPDATE user SET city = '$City' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query("UPDATE user SET province = '$Province' WHERE user_id = '$user_id'");
			$sql =$dbconnnect->query( "UPDATE user SET region = '$Region' WHERE user_id = '$user_id'");
		
			$sqlpass =$dbconnnect->query( "UPDATE user SET password = '$Password' WHERE user_id = '$user_id'");
			


			

		

			

			//myAlert("Updating Successfully!", "ArkimormaHomepage.php");

		}
		//myAlert($error, "ArkimormaHomepage.php");
}




 ?>