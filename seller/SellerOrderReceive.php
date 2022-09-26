<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
require_once 'dbcon.php';

	$order_id = $_GET['order_id'];

	$val = "Rent";
	$update = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$order_id'");

	if ($update) {
		echo".";
		echo"<script>

		Swal.fire({
		  position: 'center',
		  icon: 'success',
		  title: 'Order Receive Successfully',
		  text: 'Thank you for renting!',
		  showConfirmButton: false,
		  timer: 1500
		}).then(function() {
     window.location='../user/UserArkimormaMyorder.php';
	});
			
			

		</script>";
	}
	

 ?>

 
