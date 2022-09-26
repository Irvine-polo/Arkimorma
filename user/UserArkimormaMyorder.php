<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php    
include('../includes/user-navigation.php'); 
require_once'dbcon.php';


			
						


function asDollars($value) {
		 if ($value<0) return "-".asDollars(-$value);
		 return '₱ ' . number_format($value);
	 }

 if (isset($_GET['shop'])) {
	 $shop = $shoptarget;
 }

//days remaining process

 ?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1">

	 <title>Arkimorma | My Orders</title>
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">
<style type="text/css">

	#button {
  display: inline-block;
  background-color: #1D6B97;
  width: 50px;
  height: 50px;
  text-align: center;
  border-radius: 50px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0;
  visibility: hidden;
  z-index: 1000;

}
#button::after {
  content: "\f077";
  font-family: FontAwesome;
  font-weight: normal;
  font-style: normal;
  font-size: 2em;
  line-height: 50px;
  color: #fff;
}
#button:hover {
  cursor: pointer;
  background-color: #333;
}
#button:active {
  background-color: #555;
}
#button.show {
  opacity: 1;
  visibility: visible;
}


	 
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


	 /*li{
			list-style-type:none;
			margin-top: -10px;
	 }*/


	 #proimg{
			 overflow: hidden;
	 }

	 
	 #proimg img{
			max-height: 400px;
			width: 100%;
			object-fit: cover;
	 }

/*	 .container{
			display: flex;
			
	 }*/

	 .content b ,p{
			margin-top: 3px;
			margin-left: 5px;
			font-size: 16px;

	 }

	 .content a{
			text-decoration: none;
			color: black;
	 }

	 .content p{
			color: grey;
	 }


	 .checked {
		 color: orange;
	 }
	img{
		 height: 100px;
		 width: 100px;
	}


	#notes{
		color: #00819B;
	}

</style>
<body>
	<!-- Back to top --->
	<a id="button"></a>

<?php 
$user_id = $_SESSION['user-id'];
$user_fullname = $_SESSION['user-fullname'];
?>

<h2 style="text-align:center;
font-family: 'Lobster', cursive;
font-size: 60px;
color: black;">My Orders</h2>

<br>
<br>



	
 

<br>

<style>
	#stage_icon img{
		height: 30px;
		width: 30px;
	}
	#stages li{
		padding: 10px;
	}

</style>
<div class="shop-category-container container" style="text-align: center;">
	<!---- sort tab ---->
	<ul id="stages">
		<?php
			if(isset($_GET['val'])) {
				$val = $_GET['val'];
			} else {
				$val = '';
			}

			//badges

			$sql = "SELECT status FROM order_table WHERE status = 'Pending' AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_p = mysqli_num_rows($result);

			
			
		


		?>
		<li>
			<a href="UserArkimormaMyorder.php?val=Pending" class="btn <?php echo ($val == 'Pending') ? 'btn-primary' : 'btn-default'; ?>"> <span id="stage_icon"><img src="../assets/images/pending.png"></span><br> Pending <span class="badge badge-info"><?php 
		if ($badge_p > 0) {
			echo$badge_p;
		} ?></span></a> 
		</li>



		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Approved' AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_a = mysqli_num_rows($result); ?>

		<li><a href="UserArkimormaMyorder.php?val=Approved" class="btn <?php echo ($val == 'Approved') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/approve.png"></span><br> Approved <span class="badge badge-info"><?php 
		if ($badge_a > 0) {
			echo$badge_a;
		} ?></span></a></li>

		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Departed' AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_d = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=Departed" class="btn <?php echo ($val == 'Departed') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/depart.png"></span><br>Departed <span class="badge badge-info"><?php 
		if ($badge_d > 0) {
			echo$badge_d;
		}?></span></a></li>

		<?php 	
			$sql = "SELECT status FROM order_table WHERE user_id = '$user_id' AND status = 'Rent'  ";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_r = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=Rent" class="btn <?php echo ($val == 'Rent') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/rent.png"></span><br> Rent <span class="badge badge-info"><?php 
		if ($badge_r > 0) {
			echo$badge_r;
		} ?></span></a></li>




		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Due'  AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_due = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=Due" class="btn <?php echo ($val == 'Due') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/due.png"></span><br>Due <span class="badge badge-info"><?php 
		if ($badge_due > 0) {
			echo$badge_due;
		} ?></span></a></li>

<!--------------------------------- TO RATE ------------------------>
		<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Complete' AND rate IS NULL AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_c = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=rate" class="btn <?php echo ($val == 'rate') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/rate.png"></span><br>To Rate <span class="badge badge-info"><?php 
		if ($badge_c > 0) {
			echo$badge_c;
		} ?></span></a></li>

<!---------------------------------COMPLETED ------------------------>
			<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Complete' AND rate IS NOT NULL AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_com = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=Complete" class="btn <?php echo ($val == 'Complete') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/completed.png"></span><br>Completed<span class="badge badge-info"><?php 
		if ($badge_com > 0) {
			echo$badge_com;
		} ?></span></a></li>



		<?php 	
			$sql = "SELECT status FROM order_table WHERE user_id = '$user_id' AND( status = 'Penalty' OR status = 'Not Return' )";
			$result = mysqli_query($dbconnnect,$sql);
			$badge_Penalty = mysqli_num_rows($result); ?> 


		<li><a href="UserArkimormaMyorder.php?val=Penalty" class="btn <?php echo ($val == 'Penalty') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/penalty.png"></span><br>Penalty <span class="badge badge-info"><?php 
		if ($badge_Penalty > 0) {
			echo$badge_Penalty;
		} ?></span></a></li>
		


	
		

<?php 	
			$sql = "SELECT status FROM order_table WHERE status = 'Cancelled'  AND user_id = '$user_id'";
			$result = mysqli_query($dbconnnect,$sql);
			$Cancelled = mysqli_num_rows($result); ?>
		<li><a href="UserArkimormaMyorder.php?val=Cancelled" class="btn <?php echo ($val == 'Cancelled') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/cancel.png"></span><br>Cancelled <span class="badge badge-info"><?php 
		if ($Cancelled > 0) {
			echo$Cancelled;
		} ?></span></a></li>

	







	</ul>
	

</div>
<?php 
			if (isset($_GET['order_id'])) {
				$order_id = $_GET['order_id'];
					echo ".";
					echo"<script>
								 Swal.fire({
          title: 'Are you sure?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location='../seller/SellerOrderReceive.php?order_id=".$order_id."';
			  }
			})</script>";




			}
		 ?>

<div class="container">

<?php 
	if ($val == 'Due') {
		?>
		<i id="notes"><b>NOTICE: </b>Return the box with the given; rented item on the exact return date to prevent penalty.</i>

	<?php
	}
	
 ?>
 <?php 
	if ($val == 'Penalty') {
		?>
		<i id="notes"><b>NOTICE: </b>If the box didn't return within 7 days of penalty. You will no longer reclaim the deposit. </i>

	<?php
	}
	


	
 ?>

<br>
<br>
<br>




	<div id="order"  hidden>

		 <table class="table table-hover">
			<thead>
				 <tr>
					 <th>Image</th>
					 <th>Item</th>
					 <th>Quantity</th>
					 <th>Item Price</th>
					 <th>Deposit</th>
					 <th>Total</th>
					 <th>Status</th>
					 <th></th>
				 </tr>
			</thead>

	<?php 

	//cancel
	if (isset($_GET['order_id'])) {
		 $id = $_GET['order_id'];
		 $val = "Cancelled";
		 $cancel = $dbconnnect->query("UPDATE order_table SET status = '$val' WHERE order_id = '$id'");
	}

	if (isset($_GET['req_cancel'])) {
		$id = $_GET['req_cancel'];
		echo ".";
		echo"

		<script>
       Swal.fire({
          title: 'Are you sure?',
       
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes!'
			}).then((result) => {
			  if (result.isConfirmed) {


			     window.location='../includes/UserOrderDel.php?req_cancel=".$id."';
			  }
			})
			    </script>


		";
	}

	if (isset($_GET['val'])) {
		 $val = $_GET['val'];

		 echo"
		 <script>
				function myFunction2() {
					document.getElementById('order').hidden = false; 

				}
				myFunction2();
		 </script>";
	}
		 
		 ?>
		 <?php   

	if ($val == "Penalty") {
		$sql = $dbconnnect->query("SELECT * FROM order_table WHERE user_id = '$user_id' AND(status = 'Penalty' OR status = 'Not Return' )");
	}elseif ($val == "rate") {
			$sql = $dbconnnect->query("SELECT * FROM order_table WHERE status = 'Complete' AND rate IS NULL AND user_id = '$user_id'");
	}elseif ($val == "Complete") {
		$sql = $dbconnnect->query("SELECT * FROM order_table WHERE status = 'Complete' AND rate IS NOT NULL AND user_id = '$user_id'");
	}
	else{
		$sql = $dbconnnect->query("SELECT * FROM order_table WHERE user_id = '$user_id' AND status = '$val'");
	}


	 	
	 
	

	if(mysqli_num_rows($sql)==0){
					echo '<tr><td colspan="6">No Item Available. <button class="btn btn-warning" ><a href="UserArkimormaProduct.php" style="color:white;">Rent Now</a></button></td></tr>';
			}
			 else{

			while ($row = mysqli_fetch_assoc($sql)) {
					$start_date = strtotime($row['start_date']);
					$end_date = strtotime($row['return_date']);
					$today = strtotime(date('Y-m-d'));
					$Returndiff = round(($end_date-$today)/60/60/24);

					$Penalty = round(($today-$end_date)/60/60/24);


						$string = $row['product_name'];
						if (strlen($string) > 35) {
						$trimstring = substr($string, 0, 35). '...';
						} else {
						$trimstring = $string;
						}
						
				?>
					<tr>
						<td><img src="../assets/Multiple_product_image/<?php echo$row['image'] ?>"></td>
						<td><a href="UserProductProfile.php?item=<?php echo$row['product_id']; ?>&shop_id=<?php echo$row['seller_id']; ?>"><?php echo$trimstring; ?></a></td>
						<td><?php echo$row['quantitty'] ?></td>
						<td><?php $price = $row['order_price']; $price = asDollars($price);  echo$price; ?></td>
						<td><?php $deposit = $row['deposit']; $deposit = asDollars($deposit);  echo$deposit; ?></td>
						<td><?php $total = $row['total']; $total = asDollars($total);  echo$total; ?></td>
						<td><?php echo$row['status'] ?></td>

						<?php if ($val == 'Cancelled' && $row['payment'] == "Online Payment"): ?>
							<td><a href="UserViewRefund.php?order_id=<?php echo$row['order_id']; ?>">View Payment Refund</a></td>
						<?php endif ?>

						<!--- Days Remaining  -->
						<?php if ($val == "Rent"): ?>
							 <td><?php echo$Returndiff?> Day Left</td>
						<?php endif ?>

							<?php if ($val == "Penalty"): ?>
								<td><b><?php echo$Penalty?> Day Penalty</b></td>
						<?php endif ?>




						<?php if ($val == "Departed" && $row['or_receive'] == 1): ?>
							<td><a href="UserArkimormaMyorder.php?order_id=<?php echo$row['order_id']; ?>"><button type="button"class="btn btn-warning">Order Receive</button></a></td>
						<?php endif ?>

						<!--- btn cancel pending -->
						<?php if ($val == "Pending") { ?>
							 <td><a href="UserArkimormaMyorder.php?order_id=<?php echo$row['order_id']; ?>">Cancel</a></td>
						<?php }?>

					<!--- btn cancel approve -->
						<?php if ($val == "Approved" && $row['cancel_req'] == 0): ?>
							<td><a href="UserArkimormaMyorder.php?req_cancel=<?php echo$row['order_id']; ?>">Request to Cancel</a></td>
						<?php endif ?>

						<?php if ($val == "Approved" && $row['cancel_req'] == 1 ): ?>
							<td><i>please wait for the shop to accept your request</i></td>
						<?php endif ?>
						
						<!--- btn rate  -->
						<?php if ($val == "rate" && !$row['rate']): ?>
							 <td><a href="UserFeedBack.php?shop_id=<?php echo$row['seller_id']; ?>&user_id=<?php echo$row['user_id']; ?>&order_id=<?php echo$row['order_id']; ?>&username=<?php echo$row['cust_name']; ?>&product=<?php echo$row['product_name']; ?>">Rate Shop</a></td>
						<?php endif ?>
					</tr>

			<?php }

		 }?>

	</table>
	</div>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include('../includes/footer.php'); ?>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

<script type="text/javascript">
	var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


</script>

</body>

</html>
