<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
require_once 'dbcon.php';
if (isset($_GET['vkey'])) {
	$vkey = $_GET['vkey'];
	$resultSet = $dbconnnect->query("SELECT verified,vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
	
	if ($resultSet->num_rows==1) {
		$update = $dbconnnect->query("UPDATE user SET verified = 1 , status = 'Admit' WHERE vkey = '$vkey' LIMIT 1");

		if ($update) {
			?> 

			<?php

			echo".";
			echo"<script>
			Swal.fire({
			  position: 'center',
			  icon: 'success',
			  title: 'Verified Successfully',
			  showConfirmButton: false,
			  timer: 2000,
			  backdrop: `
			    rgba(0, 0, 0, 0.6)
			    

			  `
			}).then(function() {
					window.location = '../UserLogin.php';
				});

			</script>";
		}
		else{
			echo $dbconnnect->error;
		}
	}
	else{
		echo "Unabled to Verify Email";
	}
}
else{
	die("There Something Wrong Try Again");
}



 ?>


