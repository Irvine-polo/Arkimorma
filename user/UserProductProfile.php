<?php 
include('../includes/user-navigation.php'); 
require_once'dbcon.php';

$item_id = "";

if (!isset($_GET['item'])) {
	 //header("location:UserArkimormaShop.php");
}
//product id
if (isset($_GET['item'])) {
	 $item_id = $_GET['item'];
	 
}
if (isset($_GET['item_no'])) {
	 $shop_id = $_GET['shop_id'];
	 $item_id = $_GET['item_no'];
}
//search bar
if (isset($_GET['item'])) {
	 $item_id = $_GET['item'];
	 $shop_id = $_GET['shop_id'];
	 
}
//shop id
$item_id = $item_id;
$shop_id = $shop_id;


//money
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
	 <title>Arkimorma | Item Profile</title>
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

.size_btn {
	list-style-type: none;
	margin: 25px 0 0 0;
	padding: 0;
}

.size_btn li {
	float: left;
	margin: 0 5px 0 0;
	width: 60px;
	height: 20px;
	position: relative;
	font-size: 13px;
}

.size_btn label,
.size_btn input {
	display: block;
	position: absolute;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
}

.size_btn input[type="radio"] {
	opacity: 0.01;
	z-index: 100;
}

.size_btn input[type="radio"]:checked+label,
.Checked+label {
	background: orange;
}

.size_btn label {
	padding: 10px;
	border: 1px solid #CCC;
	cursor: pointer;
	z-index: 90;
	padding-left: auto;
	padding-right: auto;
	padding-bottom: 25px;
}

.size_btn label:hover {
	background: #DDD;
} 

#addcart_form{
	background: #fff;
	min-height: 700px;
	width: 460px;
	position: absolute;
	top: 10%;
	left: 40%;
	right: auto;
	z-index: 11;
	border: 1px solid #999;
}

#addcart_form form{
	 padding: 30px;
}

.proimg img{
	width: 100%;
}
.product_info{
	font-family: sans-serif;
}

.product_info p{
	padding: 10px;
	font-size: 20px;
}
.product_info h3{
	margin-bottom: 50px;
}
p{
	font-size: 20px;
}

.total{
	margin-left: 50px;
	margin-top: 50px;
	color: orange;
}

 #btncart{
	margin-top: 100px;
}

.row{
	margin: 100px;
	background: whitesmoke;
	padding: 10px;


}


</style>
<body>
<?php 
$user_id = $_SESSION['user-id'];
$user_fullname = $_SESSION['user-fullname'];
$user_id = $_SESSION['user-id'];
?>


<div class="container">

<div class="row">
<br>
<br>
	 <div class="col-xs-6 product-images">
		<!-- item images -->
		<div class="item_image">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<?php
					$counter = 1;
					$call_img = $dbconnnect->query("SELECT product_image FROM product_images WHERE shop_id = '$shop_id' AND product_id = '$item_id'");
					while ($img_row = mysqli_fetch_assoc($call_img)) {
					?>
						<div class="item <?php echo ($counter == 1) ? ' active ' : ''; ?>">
							<img src="../assets/Multiple_product_image/<?php echo$img_row['product_image']; ?>" >
						</div>
					<?php
						$counter++;
					}

				?>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>
	</div>

	<div class="col-xs-6 product-details">
		<!-- product content -->
		<div class="product_info">
			<?php 
				 $call_info = $dbconnnect->query("SELECT * FROM product WHERE shop_id ='$shop_id' AND product_id = '$item_id'");
				 $info = $call_info->fetch_assoc();
			?>
			<h3><b><?php echo$info['product_name']; ?> </b></h3>
			<p ><b>Material:</b>  <?php echo$info['product_material']; ?></p>
			<p class="text-left"><b>Stock: </b><?php echo$info['stocks']; ?></p>
			<b><p class="text-left"><b>Price:</b> <?php $price = $info['product_prize']; $price = asDollars($price);  echo$price; ?></p></b>
			<p class="text-left"><b>Deposit: </b><?php $price = $info['deposit']; $price = asDollars($price);  echo$price; ?></p>

			<?php $item = $info['product_prize']; $deposit = $info['deposit']; $add = $item+$deposit; $total = asDollars($add); echo"<h5 class='total'><b>Total : </b>".$total."</h4>"; ?>

			<button id="btncart" onclick="myFunction()" class="btn btn-warning">Add to Bag</button>

			
			

		</div>
	</div> <!-- COL -->
</div> <!-- ROW -->

<style>
	th , td{
		text-align: center;
		font-size: 20px;
	}

</style>

<div class="row">
	<h4>Product Information</h4>


	<p><b>Size: </b></p>
	<p><b>Metric: </b> <?php echo $info['metric']?></p>
	<table style="width:100px; height: auto; margin-left:60px;">
		<thead>
			<tr>
				<th></th>
				<th style="padding:5px;">shoulder</th>
				<th  style="padding:5px;">waist</th>
				<th  style="padding:5px;">chest</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>small</td>
				<td><?php echo$info['s_shoulder'] ?></td>
				<td><?php echo$info['s_waist']  ?></td>
				<td><?php echo$info['s_chest']  ?></td>
			</tr>
			<tr>
				<td>medium</td>
				<td><?php echo$info['m_shoulder']?></td>
				<td><?php echo$info['m_waist'] ?></td>
				<td><?php echo$info['m_chest']  ?></td>
			</tr>
			<tr>
				<td>large</td>
				<td><?php echo$info['l_shoulder'] ?></td>
				<td><?php echo$info['l_waist']  ?></td>
				<td><?php echo$info['l_chest']  ?></td>
			</tr>
			<tr>
				<td>xlarge</td>
				<td><?php echo$info['xl_shoulder']  ?></td>
				<td><?php echo$info['xl_waist'] ?></td>
				<td><?php echo$info['xl_chest']  ?></td>
			</tr>
			<tr>
				<td>xxlarge</td>
				<td><?php echo$info['xxl_shoulder'] ?></td>
				<td><?php echo$info['xxl_waist'] ?></td>
				<td><?php echo$info['xxl_chest']  ?></td>
			</tr>
		</tbody>

	</table>
	<br><br>
	<p ><b>Product Description: </b></p>
	<pre style="font-size: 18px; font-family: sans-serif; padding: 20px"><?php echo $info['product_details']; ?></pre>
	
	
	


</div>






<div class="row">
	<div class="col-xs-4">
		<div>
			<div class="shop_info">
				<?php 
					$shop_call = $dbconnnect->query("SELECT * FROM sellers WHERE shop_id ='$shop_id'"); 
					$shop = $shop_call->fetch_assoc();
				?>

				<div class="shop_pic img img-thumbnail">
					<img src="../assets/SellerAccountImages/<?php echo$shop['image']; ?>" width="100%">
				</div>
				<h3 class="text-center"><?php echo$shop['shop_name']; ?></h3>
			</div>
			<div class="text-center">
				<a href="UserChatIndex.php" class="btn btn-primary btn-sm">Chat Now</a>
				<a href="UserSellerShop.php?shop=<?php echo$shop_id?>" class="btn btn-success btn-sm">View Shop</a>
			</div>
			
		</div>


	</div>
</div>

<br><br>
		
</div> <!-- CONTAINER -->




<!--  Add to Cart  -->
<?php 
$call_img = $dbconnnect->query("SELECT product_image FROM product_images WHERE shop_id = '$shop_id' AND product_id = '$item_id'");
$order_img = $call_img->fetch_assoc(); 
?>

<div id="addcart_form" hidden >
<form method="POST" action="UserAddToCart.php">
<h3>Order Form</h3>
<div class="proimg"><img src="../assets/Multiple_product_image/<?php echo$order_img['product_image']; ?>"></div>

<input type="text" name="user_id" value="<?php echo$user_id; ?> " hidden>
<input type="text" name="seller_id" value="<?php echo$shop_id;?> " hidden>
<input type="text" name="product_id" value="<?php echo$info['product_id'];?>" hidden>
<input type="text" name="product_name" value="<?php echo$info['product_name'];?>" hidden>
<input type="text" name="product_price" value="<?php echo$info['product_prize'];?>" hidden>
<input type="text" name="deposit" value="<?php echo$info['deposit'];?>" hidden>
<input type="text" name="product_image" value="<?php echo$order_img['product_image'];?>" hidden>

<h5><?php echo$info['product_name']; ?></h5>


 <label for="size"><h6>Size</h6></label>
<ul class="size_btn" style="margin-top: 0;">
	<li>
		<input value="S" type="radio" id="s" name="select_size" required/>
		<label for="s">S</label>
	</li>
	<li>
		<input value="M" type="radio" id="m" name="select_size" required/>
		<label for="m">M</label>
	</li>
	<li>
		<input value="L" type="radio" id="l" name="select_size" required/>
		<label for="l">L</label>
	</li>
	<li>
		<input value="XL" type="radio" id="xl" name="select_size" required/>
		<label for="xl">XL</label>
	</li>
	<li>
		<input value="XXL" type="radio" id="xxl" name="select_size" required/>
		<label for="xxl">XXL</label>
	</li>
</ul>
<br><br>


<div class="quantity buttons_added">
	<h6>Quantity</h6>
	<div style="width: 50%;">
		<input type="number" step="1" min="1" max="10" name="quantity" value="1" title="Qty" class="input-text qty text form-control" size="4" pattern="" inputmode="">
	</div>
</div>

<h6>Item Price: <?php $price = $info['product_prize']; $price = asDollars($price);  echo$price; ?></h6>
<h6>Deposit: <?php $price = $info['deposit']; $price = asDollars($price);  echo$price; ?></h6>
<?php $item = $info['product_prize']; $deposit = $info['deposit']; $add = $item+$deposit; $total = asDollars($add); echo"<h5>Total : ".$total."</h5>"; ?>
<input type="submit" name="addtocart" value="Done" class="btn btn-sm btn-primary"> 
<a onclick="myFunction2()" class="btn btn-sm btn-default">Cancel</a>
</form>



</div>


<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
<?php include('../includes/footer.php'); ?>
<script>


//slide show
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
showSlides(slideIndex += n);
}
function showSlides(n) {
var i;
var slides = document.getElementsByClassName("mySlides");
if (n > slides.length) {slideIndex = 1}    
if (n < 1) {slideIndex = slides.length}
for (i = 0; i < slides.length; i++) {
slides[i].style.display = "none";  
}

slides[slideIndex-1].style.display = "block";  
dots[slideIndex-1].className += " active";
}


function myFunction() {
document.getElementById("addcart_form").hidden = false;
}
function myFunction2() {
document.getElementById("addcart_form").hidden = true;
}



</script>


</body>
</html>