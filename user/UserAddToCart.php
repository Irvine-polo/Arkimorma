<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 	
require_once'dbcon.php';






include('../includes/user-navigation.php'); 


function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}
function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}

	





 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | My Bag</title>

	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.css">
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
</head>

<style>

	#list-left a{
		text-decoration: none;
		color: white;
		font-size: 35px;

	}
	#list-right a{
		float: right;
		margin-top: -20px;
		text-decoration: none;
		color: white;
		font-size: 19px;
		margin-right: 30px;
	}

	img{
		height: 200px;
		width: 200px;
	}

	#del{
		height: 150px;
		width: 250px;
		background: whitesmoke;
		position: absolute;
		top: 50%;
		left: 43%;
	}
	#del form{
		padding: 20px;

	}

	#del input , h5{
		margin-left: 55px;
	}


	#edit_quan{
		height: 150px;
		width: 250px;
		background: whitesmoke;
		position: absolute;
		top: 50%;
		left: 43%;
	}

	#edit_quan form{
			padding: 30px;
	}
	#edit_quan input ,label{
		margin-left: 30px;
	}

	#total{
		float: right;
		margin-right: 100px;


	}
	
</style>
<body>

<?php 

$user_id = $_SESSION['user-id'];
$user_fullname = $_SESSION['user-fullname'];


if (isset($_POST['addtocart'])) {
	$u_id = $_POST['user_id'];
	$p_id = $_POST['product_id'];
	$s_id = $_POST['seller_id'];
	$item_name = $_POST['product_name'];
	$Size = $_POST['select_size'];
	$quantity = $_POST['quantity'];
	$price = $_POST['product_price'];
	$Deposit = $_POST['deposit'];
	$P_deposit = $Deposit;
	$base_price = $price;
	$image = $_POST['product_image'];

	//check if item already in cart
	$sql = "SELECT cart_id FROM cart WHERE product_id = '$p_id' AND user_id ='$user_id'";
	$check = mysqli_query($dbconnnect,$sql);
	if ($check && mysqli_num_rows($check)==1)  {
			//myAlert("This Item is already in Your bag","");
		echo'.';
		echo"<script>Swal.fire('This Item is already in Your bag')</script>";
	}
	else{


		if ($quantity>=1) {
			$tprice = $quantity * $price;
		}


						$insert = $dbconnnect->query("INSERT INTO cart(product_id,user_id,seller_id,name,size,quantity,p_price,price,p_deposit,deposit,image) VALUES('$p_id','$u_id','$s_id','$item_name','$Size','$quantity','$base_price','$tprice','$P_deposit','$Deposit','$image')");

						if ($insert) {
							//myAlert("Saved!","");
							echo'.';
							echo"<script>Swal.fire({
							  position: 'center',
							  icon: 'success',
							  title: 'Added to Bag',
							  showConfirmButton: false,
							  timer: 1500
							}).then(function() {
							    window.location = 'UserAddToCart.php';
							});</script>";
						}
	}
}





if (isset($_POST['save'])) {
	$id = $_POST['id'];
	$check = $dbconnnect->query("SELECT p_price,P_deposit,quantity FROM cart WHERE cart_id = '$id'");
	$quan = $check->fetch_assoc();
	$base_price = $quan['p_price'];
	$P_deposit = $quan['P_deposit'];
	$quantity = $_POST['quantity'];


		if ($quantity>$quan['quantity']) {
				$tprice = $quantity * $base_price;
				$tdeposit = $quantity * $P_deposit;
				$update = $dbconnnect->query("UPDATE cart SET quantity = '$quantity' , price = '$tprice' , deposit = '$tdeposit' WHERE cart_id = '$id'");
		
		}elseif($quantity<$quan['quantity']){
				$tprice = $base_price / $quantity;
				$tdeposit = $P_deposit / $quantity;
				$update = $dbconnnect->query("UPDATE cart SET quantity = '$quantity' , price = '$tprice' , deposit = '$tdeposit' WHERE cart_id = '$id'");
		}

}

if (isset($_POST['confirm'])) {
	$choi = $_POST['confirm'];
	$item = $_POST['item'];
	if ($choi == 'Yes') {
		$del = $dbconnnect->query("DELETE FROM cart WHERE cart_id = '$item'");
	
	}
	else if($choi == 'No'){
		echo "
				<script>
						function mydel() {
						  document.getElementById('del').hidden = true;
						}

						mydel();
				</script>"; 
				
	}
	
}

?>

<div class="container">
	
	<h2 style="
	font-family: 'Lobster', cursive;
font-size: 60px;
color: black;
text-align: center;
"
>My Bag</h2>
<br>
<!----- display cart item    ----->
	<table class="table table-hover">
		<thead>	
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Size</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Deposit</th>
				<th>Total</th>
				<th>Action</th>
			</tr>
		</thead>
<?php 

	$sql = $dbconnnect->query("SELECT * FROM cart WHERE user_id = '$user_id'");

	if(mysqli_num_rows($sql )==0 ){
        echo '<tr><td colspan="6">Your bag is Empty <button class="btn btn-warning"><a href="UserArkimormaProduct.php" style="color:white;">Rent Now</a></button></td></tr>';
    }

	while ($row = $sql->fetch_assoc()): 
	 	$p_id = $row['product_id'];
		$call_img = $dbconnnect->query("SELECT product_image FROM product_images WHERE product_id = '$p_id'");
		$img_row = $call_img->fetch_assoc();

		 $string = $row['name'];
		if (strlen($string) > 55) {
		$trimstring = substr($string, 0, 55). '...';
		} else {
		$trimstring = $string;
		}
						
		
	?>
	<tr>
			<td><img src="../assets/Multiple_product_image/<?php echo $img_row['product_image']; ?>"></td>
			<td><a href="UserProductProfile.php?item=<?php echo$row['product_id'] ?>&shop_id=<?php echo$row['seller_id'] ?>"><?php echo $trimstring; ?></a></td>
			<td><?php echo $row['size']; ?></td>
			<td><?php echo $row['quantity']; ?></td>
			<td><?php $price = $row['price']; $price = asDollars($price);  echo$price; ?></td>
			<td><?php $deposit = $row['deposit']; $deposit = asDollars($deposit);  echo$deposit; ?></td>
			<?php 
			$price = $row['price']; 
			$deposit = $row['deposit']; 
			$total = $price + $deposit; 
			$total = asDollars($total);
			echo"<td>".$total."</td>";
			?>
			<td>
					<a href="UserRentForm.php?rent=<?php echo$row['cart_id']; ?>&product_id=<?php echo$row['product_id'] ?>&user_id=<?php echo$row['user_id'] ?>&seller_id=<?php echo$row['seller_id'] ?>&quantity=<?php echo$row['quantity'] ?>"class="text-warning"><i class="fas fa-money-check"></i></a>
					<a href="UserAddtoCart.php?edit=<?php echo$row['cart_id']; ?>"class="text-success"><i class="fas fa-edit"></i></a>		
					<a href="UserAddToCart.php?delete_card=<?php echo$row['cart_id']; ?>"class="text-danger"><i class="far fa-trash-alt"></i></a>

			</td>
	</tr>
<!----------- delete validation pop up  ------->
<div id="del" hidden>
	<form method="post" action="UserAddToCart.php">	
<?php 
if (isset($_GET['delete_card'])) {
	$item = $_GET['delete_card'];
	echo'.';
	?> 

	<script>
       Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location="UserDeleteItem.php?delete_card=<?php echo$item; ?>";
			  }
			})
			    </script>


	 <?php




	/*
	echo "



				<script>
						function mydel() {
						  document.getElementById('del').hidden = false;
						}

						mydel();
				</script>"; */
	
} ?>


		<h5>Are you sure?</h5>
		<input type="hidden" name="item" value="<?php echo$item; ?>">
		<input type="submit" name="confirm" value="Yes">
		<input type="submit" name="confirm" value="No">

	</form>
</div>
<!----------- edit quatity pop up  ------->

 <div id="edit_quan" hidden>
			<form action="UserAddToCart.php" method="POST">

<?php if (isset($_GET['edit'])) {
	echo "
				<script>
						function myFunction() {
						  document.getElementById('edit_quan').hidden = false;
						}

						myFunction();
				</script>"; 
				$id = $_GET['edit'];
				$dis = $dbconnnect->query("SELECT quantity FROM cart WHERE cart_id = '$id'");
				$quan = $dis->fetch_assoc();
}?>
					<input type="text" name="id" value="<?php echo $id ; ?>" hidden>
					<label for="quantity">Quantity : <input type="number" name="quantity" min="1" max="10" placeholder="<?php echo$quan['quantity'];?>"></label><br>
					<input type="submit" name="save" value="Save" >
					<button onclick="myFunction2()">Cancel</button>

			</form>
 </div>
<!----------- edit quatity pop up  end ------->
<?php endwhile; ?>

<?php 
$tprice = 0;
//total cart price
$sql = $dbconnnect->query("SELECT price,deposit FROM cart WHERE user_id = '$user_id'");
 while ($p = mysqli_fetch_assoc($sql)) {
 	$price = $p['price'];
 	$deposit = $p['deposit'];
	$tprice = $tprice + $price +$deposit;

 }



?>
	</table>
<p id="total"><b>TOTAL: <?php $tprice = asDollars($tprice); echo $tprice;?></b></p>
</div>
<script>
		function myFunction2() {
		  document.getElementById('edit_quan').hidden = true; 
		}
</script>


<?php  ?>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

</body>
</html>