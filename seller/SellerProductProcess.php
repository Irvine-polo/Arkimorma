<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
// Inserting product (renter)
	require_once 'dbcon.php';
	session_start();
	$selid = $_SESSION['id'];

function myAlert($msg, $url) {
		    echo '<script language="javascript">alert("'.$msg.'");</script>';
		    echo "<script>document.location = '$url'</script>";
		}

	

	
	if (isset($_POST['Post-product'])) {

		$shop_id = $selid;
		$Product_category = $_POST['category'];
		$Product_name = $_POST['pro_name'];
		$Material = $_POST['material'];
		$Product_details = $_POST['detail'];
		$Product_age = $_POST['age'];
		$Stocks = $_POST['Stocks'];
		$Product_prize = $_POST['pro_price'];
		$Product_deposit = $_POST['pro_deposit'];

		$metric = $_POST['metric'];

		$s_s = $_POST['S_shoulder'];
		$s_w = $_POST['S_waist'];
		$s_c = $_POST['S_chest'];

		$m_s = $_POST['M_shoulder'];
		$m_w = $_POST['M_waist'];
		$m_c = $_POST['M_chest'];

		$l_s = $_POST['L_shoulder'];
		$l_w = $_POST['L_waist'];
		$l_c = $_POST['L_chest'];

		$xl_s = $_POST['XL_shoulder'];
		$xl_w = $_POST['XL_waist'];
		$xl_c = $_POST['XL_chest'];

		$xxl_s = $_POST['XXL_shoulder'];
		$xxl_w = $_POST['XXL_waist'];
		$xxl_c = $_POST['XXL_chest'];




		//checking product name
		$sql = "SELECT * FROM product where product_name = '$Product_name'";
		$result = mysqli_query($dbconnnect,$sql);
		if($result && mysqli_num_rows($result)>0) {
			

			myAlert("Please Change name of your product", "SellerUploadingProduct.php");

		}

		else{

		//inserting data to product
		$command = "INSERT INTO product (
			shop_id
			,product_category
			,product_name
			,product_details
			,product_material
			,product_age
	
			,metric
			,s_shoulder
			,s_waist
			,s_chest
			,m_shoulder
			,m_waist
			,m_chest
			,l_shoulder
			,l_waist
			,l_chest
			,xl_shoulder
			,xl_waist
			,xl_chest
			,xxl_shoulder
			,xxl_waist
			,xxl_chest

			,stocks
			,deposit
			,product_prize		
		) VALUES(
		'$shop_id'
		,'$Product_category'
		,'$Product_name'
		,'$Product_details'
		,'$Material'
		,'$Product_age'

		,'$metric'

		,'$s_s'
		,'$s_w'
		,'$s_c'


		,'$m_s'
		,'$m_w'
		,'$m_c'
	

		,'$l_s'
		,'$l_w'
		,'$l_c'
	

		,'$xl_s'
		,'$xl_w'
		,'$xl_c'
	

		,'$xxl_s'
		,'$xxl_w'
		,'$xxl_c'
		
		,'$Stocks'
		,'$Product_deposit'
		,'$Product_prize'

	)";
		$result = mysqli_query($dbconnnect,$command);
	


		//inserting img
		//calling product_id
 		$sql_select = "SELECT * FROM product WHERE shop_id='$shop_id' AND product_name = '$Product_name'";     
 		$result = mysqli_query($dbconnnect,$sql_select);
 		$row = $result ->fetch_assoc();
 		$pro_id = $row['product_id'];


		//multiple image inserting to product image
		$countfiles = count($_FILES['file']['name']);
		for($i=0;$i<$countfiles;$i++){
			  $filename = $_FILES['file']['name'][$i];


			  $sql_product = "INSERT INTO product_images(Product_id,Product_name,shop_id,product_image)VALUES('$pro_id','$Product_name','$shop_id','$filename')";
			  $result = mysqli_query($dbconnnect,$sql_product);
			 
			  // Upload file
			  move_uploaded_file($_FILES['file']['tmp_name'][$i],'../assets/Multiple_product_image/'.$filename);

 			}
 				echo'.';
			        echo "<script type='text/javascript'>Swal.fire({
			  position: 'center',
			  icon: 'success',
			  title: 'Product posted',
			  showConfirmButton: false,
			  timer: 1500
			}).then(function() {
			    window.location = 'SellerUploadingProduct.php';
			});</script>";


		}


	
		
	

	}




 ?>