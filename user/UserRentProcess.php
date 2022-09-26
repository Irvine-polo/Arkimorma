<?php 
require_once'dbcon.php';
function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}
//order process
	if (isset($_POST['placeorder'])) {
		$image = $_POST['product_image'];
		$c_id = $_POST['cart_id'];
		$p_id = $_POST['product_id'];
		$u_id = $_POST['user_id'];
		$s_id = $_POST['seller_id'];
		$pro_name = $_POST['product_name'];
		$size = $_POST['size'];
		$price = $_POST['price'];
		$cust_name = $_POST['cust_name'];
		$cust_email = $_POST['cust_email'];
		$cust_address = $_POST['cust_address'];
		$cust_city = $_POST['cust_city'];
		$cust_province = $_POST['cust_province'];
		$cust_region = $_POST['cust_region'];
		$cust_postal_code = $_POST['cust_postal_code'];
		$status = $_POST['status'];
		$start = $_POST['start'];
		$return = $_POST['return'];
		$quantity = $_POST['quantity'];
		$payment = $_POST['payment'];




		$sql = "INSERT INTO order_table(product_id,user_id,seller_id,product_name,size,start_date,return_date,quantitty,payment,order_price,cust_name,cust_email,cust_address,cust_city,cust_province,
			cust_region,cust_postal_code,status,image) VALUES('$p_id','$u_id','$s_id','$pro_name','$size','$start','$return','$quantity','$payment','$price','$cust_name','$cust_email','$cust_address','$cust_city','$cust_province','$cust_region','$cust_postal_code','$status','$image')";

		$result = mysqli_query($dbconnnect,$sql);

		if ($result) {
			//delete cart item
			$sql = $dbconnnect->query("DELETE FROM cart WHERE cart_id = '$c_id'");
			myAlert("Placing Order Successfully", "UserAddToCart.php");
					
		}
		else{
			echo"failed";
		}

	}



 ?>