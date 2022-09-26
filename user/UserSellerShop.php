<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
include('../includes/user-navigation.php'); 
require_once'dbcon.php';

//follow button

	if (isset($_GET['follow'])) {
		$user_id = $_GET['follow'];
		$shop_id = $_GET['shop'];

		$exist = $dbconnnect->query("SELECT * FROM follow_table WHERE user_id = '$user_id' AND shop_id = '$shop_id'");
		$exist_num = mysqli_num_rows($exist);
		if ($exist_num == 0) {
			$sql = $dbconnnect->query("INSERT INTO follow_table (user_id,shop_id)VALUES('$user_id','$shop_id')");

			?>
			<script>Swal.fire({
				  position: 'center',
				  icon: 'success',
				  title: 'Shop followed',
				  showConfirmButton: false,
				  timer: 1500
				})</script>

			<?php
		}

		
		
	}

	if (isset($_GET['Unfollow'])) {
		$user_id = $_GET['Unfollow'];
		$shop_id = $_GET['shop'];

		$del = $dbconnnect->query("DELETE FROM follow_table WHERE user_id = '$user_id' AND shop_id = '$shop_id'");
		//header("location:UserSellerShop.php?shop=".$shop_id."");
	}


 ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Shop Profile</title>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="icon" href="data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZpZXdCb3g9IjAgMCAxNzIgMTcyIj48ZyB0cmFuc2Zvcm09IiI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJub256ZXJvIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgc3Ryb2tlLWxpbmVjYXA9ImJ1dHQiIHN0cm9rZS1saW5lam9pbj0ibWl0ZXIiIHN0cm9rZS1taXRlcmxpbWl0PSIxMCIgc3Ryb2tlLWRhc2hhcnJheT0iIiBzdHJva2UtZGFzaG9mZnNldD0iMCIgZm9udC1mYW1pbHk9Im5vbmUiIGZvbnQtd2VpZ2h0PSJub25lIiBmb250LXNpemU9Im5vbmUiIHRleHQtYW5jaG9yPSJub25lIiBzdHlsZT0ibWl4LWJsZW5kLW1vZGU6IG5vcm1hbCI+PHBhdGggZD0iTTAsMTcydi0xNzJoMTcydjE3MnoiIGZpbGw9Im5vbmUiPjwvcGF0aD48Zz48cGF0aCBkPSJNMTM0LjkzOTM4LDE1OC41NjI1aDE5LjM3Njg3YzAuOTIwOTIsLTAuMDAyNiAxLjc3NjM4LC0wLjQ3NjU3IDIuMjY2OTIsLTEuMjU1OThjMC40OTA1NCwtMC43Nzk0MSAwLjU0NzgzLC0xLjc1NTcxIDAuMTUxODMsLTIuNTg3MTVsLTY1Ljg3MDYyLC0xMzkuMDc4MTJjLTAuODkyMiwtMS44Njk1OCAtMi43NzkzOCwtMy4wNjAwNCAtNC44NTA5NCwtMy4wNjAwNGMtMi4wNzE1NiwwIC0zLjk1ODc0LDEuMTkwNDYgLTQuODUwOTQsMy4wNjAwNGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuMzk2LDAuODMxNDQgLTAuMzM4NzEsMS44MDc3NCAwLjE1MTgzLDIuNTg3MTVjMC40OTA1NCwwLjc3OTQxIDEuMzQ2LDEuMjUzMzcgMi4yNjY5MiwxLjI1NTk4aDguNjI2ODdjMi4wNzcyNSwwLjAwNDUxIDMuOTcxMTYsLTEuMTg4MzQgNC44NjQzOCwtMy4wNjM3NWwxMy4wODgxMiwtMjcuNjI3NWMwLjQ0NDUyLC0wLjkzMzMzIDEuMzg0OTgsLTEuNTI4OTUgMi40MTg3NSwtMS41MzE4N2g2Ny44ODYyNWMxLjAzMzc3LDAuMDAyOTMgMS45NzQyMywwLjU5ODU1IDIuNDE4NzUsMS41MzE4N2wxMy4wODgxMiwyNy42Mjc1YzAuODkzMjIsMS44NzU0MSAyLjc4NzEyLDMuMDY4MjYgNC44NjQzOCwzLjA2Mzc1ek01Mi42MjEyNSwxMTAuMTg3NWwyOC4wMDM3NSwtNTkuMTI1bDI4LjAwMzc1LDU5LjEyNXoiIGZpbGw9IiM4NWNiZjgiPjwvcGF0aD48cGF0aCBkPSJNODIuMDIyNSw0M2wtMi42ODc1LDUuODA1bDI5LjI5Mzc1LDY0LjA3aDAuMzQ5MzdjMy43MTk5NiwtMC4wMDE5NyA3LjE3NDUzLC0xLjkyNzAyIDkuMTMzMywtNS4wODk1MWMxLjk1ODc3LC0zLjE2MjQ5IDIuMTQzMzQsLTcuMTEyOSAwLjQ4Nzk1LC0xMC40NDQyNGwtMjYuOTAxODgsLTU0LjM0MTI1Yy0wLjg5ODA5LC0xLjg1NDMyIC0yLjc3NzE0LC0zLjAzMjA5IC00LjgzNzUsLTMuMDMyMDljLTIuMDYwMzYsMCAtMy45Mzk0MSwxLjE3Nzc3IC00LjgzNzUsMy4wMzIwOXpNMTQ1LjEyNSwxNTUuNDk4NzVsLTEzLjIyMjUsLTI1Ljk4ODEyYy0xLjgzNzc3LC0zLjYyMTg0IC01LjU1OTg1LC01Ljg5ODc2IC05LjYyMTI1LC01Ljg4NTYzaC0xMC4xMDVjMS4wNDgxMiwwIDQuMzUzNzUsMy4yNzg3NSA0LjgxMDYyLDQuMjE5MzdsMTMuMDg4MTIsMjcuNjI3NWMwLjg4NTQ1LDEuODg1ODkgMi43ODA5NywzLjA5MDIyIDQuODY0MzgsMy4wOTA2MmgxNC45OTYyNWMtMi4wNTc4MiwtMC4wMTYxNCAtMy45MjU4LC0xLjIwNTggLTQuODEwNjIsLTMuMDYzNzV6IiBmaWxsPSIjOWZkZGZmIj48L3BhdGg+PHBhdGggZD0iTTEwNy41LDEzNC4zNzVjLTEuNDg0MjcsMCAtMi42ODc1LDEuMjAzMjMgLTIuNjg3NSwyLjY4NzV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMS40ODQyNywwIDIuNjg3NSwtMS4yMDMyMyAyLjY4NzUsLTIuNjg3NXYtNS4zNzVjMCwtMS40ODQyNyAtMS4yMDMyMywtMi42ODc1IC0yLjY4NzUsLTIuNjg3NXpNOTQuMDYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTY3LjE4NzUsMTM0LjM3NWMtMS40ODQyNywwIC0yLjY4NzUsMS4yMDMyMyAtMi42ODc1LDIuNjg3NXY1LjM3NWMwLDEuNDg0MjcgMS4yMDMyMywyLjY4NzUgMi42ODc1LDIuNjg3NWMxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLC0xLjQ4NDI3IC0xLjIwMzIzLC0yLjY4NzUgLTIuNjg3NSwtMi42ODc1ek01My43NSwxMzQuMzc1Yy0xLjQ4NDI3LDAgLTIuNjg3NSwxLjIwMzIzIC0yLjY4NzUsMi42ODc1djUuMzc1YzAsMS40ODQyNyAxLjIwMzIzLDIuNjg3NSAyLjY4NzUsMi42ODc1YzEuNDg0MjcsMCAyLjY4NzUsLTEuMjAzMjMgMi42ODc1LC0yLjY4NzV2LTUuMzc1YzAsLTEuNDg0MjcgLTEuMjAzMjMsLTIuNjg3NSAtMi42ODc1LC0yLjY4NzV6TTgwLjYyNSw0OC4zNzVjLTEuMDMzNzcsMC4wMDI5MyAtMS45NzQyMywwLjU5ODU1IC0yLjQxODc1LDEuNTMxODdsLTI4LjAwMzc1LDU5LjEyNWMtMC4zOTYsMC44MzE0NCAtMC4zMzg3MSwxLjgwNzc0IDAuMTUxODMsMi41ODcxNWMwLjQ5MDU0LDAuNzc5NDEgMS4zNDYsMS4yNTMzNyAyLjI2NjkyLDEuMjU1OThoNTYuMDA3NWMwLjkyMDkyLC0wLjAwMjYgMS43NzYzOCwtMC40NzY1NyAyLjI2NjkyLC0xLjI1NTk4YzAuNDkwNTQsLTAuNzc5NDEgMC41NDc4MywtMS43NTU3MSAwLjE1MTgzLC0yLjU4NzE1bC0yOC4wMDM3NSwtNTkuMTI1Yy0wLjQ0NDUyLC0wLjkzMzMzIC0xLjM4NDk4LC0xLjUyODk1IC0yLjQxODc1LC0xLjUzMTg3ek01Ni44Njc1LDEwNy41bDIzLjc1NzUsLTUwLjE0ODc1bDIzLjc1NzUsNTAuMTQ4NzV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTE1OS4xODA2MywxNTMuNTYzNzVsLTY1Ljg5NzUsLTEzOS4wNzgxMmMtMS4zMzUyOCwtMi44MTIwNiAtNC4xNzAxNCwtNC42MDQxOCAtNy4yODMxMiwtNC42MDQxOGMtMy4xMTI5OCwwIC01Ljk0Nzg1LDEuNzkyMTIgLTcuMjgzMTIsNC42MDQxOGwtNjUuODk3NSwxMzkuMDc4MTNjLTAuNzk0MDUsMS42NjcxOCAtMC42NzY2OCwzLjYyNTI2IDAuMzEwODQsNS4xODU2NmMwLjk4NzUyLDEuNTYwMzkgMi43MDY5MSwyLjUwNDYxIDQuNTUzNTQsMi41MDA1OWg4LjYyNjg3YzMuMTE3MTcsLTAuMDAzMzUgNS45NTMxMywtMS44MDMzIDcuMjgzMTMsLTQuNjIyNWw1LjU5LC0xMS43OTgxMmMwLjM1MDA2LDAuMTgwMDIgMC43MzUzOSwwLjI4MDk0IDEuMTI4NzUsMC4yOTU2M2MxLjQ4NDI3LDAgMi42ODc1LC0xLjIwMzIzIDIuNjg3NSwtMi42ODc1di01LjM3NWMwLDAgMCwwIDAsLTAuMjE1bDMuNjgxODgsLTcuODQ3NWg2Ny44ODYyNWwzLjY4MTg3LDcuODQ3NWMwLDAgMCwwIDAsMC4yMTV2NS4zNzVjMCwxLjQ4NDI3IDEuMjAzMjMsMi42ODc1IDIuNjg3NSwyLjY4NzVjMC4zOTEzMywtMC4wMDYzMiAwLjc3NjU2LC0wLjA5ODA1IDEuMTI4NzUsLTAuMjY4NzVsNS41OSwxMS43OTgxM2MxLjMzNzc0LDIuODA4NzMgNC4xNzIxLDQuNTk3MTkgNy4yODMxMyw0LjU5NTYzaDE5LjM3Njg3YzEuODQ2NjIsMC4wMDQwMSAzLjU2NjAxLC0wLjk0MDIgNC41NTM1NCwtMi41MDA1OWMwLjk4NzUyLC0xLjU2MDM5IDEuMTA0ODksLTMuNTE4NDcgMC4zMTA4NCwtNS4xODU2NnpNMTM0Ljk5MzEzLDE1NS44NzVjLTEuMDMzNzcsLTAuMDAyOTMgLTEuOTc0MjMsLTAuNTk4NTUgLTIuNDE4NzUsLTEuNTMxODhsLTEzLjE0MTg4LC0yNy42NTQzN2MtMC44OTMyMiwtMS44NzU0MSAtMi43ODcxMiwtMy4wNjgyNiAtNC44NjQzNywtMy4wNjM3NWgtNjcuODg2MjVjLTIuMDc3MjUsLTAuMDA0NTEgLTMuOTcxMTYsMS4xODgzNCAtNC44NjQzOCwzLjA2Mzc1bC0xMy4wODgxMywyNy42NTQzN2MtMC40NDQ1MiwwLjkzMzMzIC0xLjM4NDk4LDEuNTI4OTUgLTIuNDE4NzUsMS41MzE4OGgtOC42MjY4N2w2NS44OTc1LC0xMzkuMTA1YzAuNDQzMDQsLTAuOTQyNTEgMS4zOTA3NCwtMS41NDQyMSAyLjQzMjE5LC0xLjU0NDIxYzEuMDQxNDUsMCAxLjk4OTE0LDAuNjAxNjkgMi40MzIxOSwxLjU0NDIxbDY1Ljg3MDYyLDEzOS4xMDV6IiBmaWxsPSIjOGQ2YzlmIj48L3BhdGg+PHBhdGggZD0iTTg2LjUzNzUsMzguMTYyNWwyLjY4NzUsNS4zNzVjMC4yOTA3MiwxLjAxNTA3IDEuMTQ4ODksMS43NjU4NiAyLjE5MzU5LDEuOTE5MWMxLjA0NDcsMC4xNTMyNCAyLjA4MjM0LC0wLjMxOTQ2IDIuNjUyMzIsLTEuMjA4MjhjMC41Njk5OSwtMC44ODg4MiAwLjU2NjY5LC0yLjAyOTA1IC0wLjAwODQxLC0yLjkxNDU3bC0yLjY4NzUsLTUuMzc1Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXpNOTQuMjc3NSw1NC41MjkzN2wxMS4xMjYyNSwyMy40MDgxM2MwLjc1NDgyLDEuMDU4NzYgMi4xNTkzNSwxLjQyNTI3IDMuMzM1MjcsMC44NzAzNWMxLjE3NTkyLC0wLjU1NDkzIDEuNzg1ODksLTEuODcyMTEgMS40NDg0OCwtMy4xMjc4NWwtMTEuMTI2MjUsLTIzLjQ2MTg4Yy0wLjYzODIzLC0xLjM0MzI2IC0yLjI0NDU1LC0xLjkxNDggLTMuNTg3ODEsLTEuMjc2NTZjLTEuMzQzMjYsMC42MzgyMyAtMS45MTQ4LDIuMjQ0NTUgLTEuMjc2NTYsMy41ODc4MXoiIGZpbGw9IiM4ZDZjOWYiPjwvcGF0aD48L2c+PC9nPjwvZz48L3N2Zz4=">

</head>
<style type="text/css">

	#button {
	  display: inline-block;
	  background-color: #1D6B97;
	  width: 50px;
	  height: 50px;
	  text-align: center;
	  border-radius: 4px;
	  position: fixed;
	  bottom: 30px;
	  right: 30px;
	  transition: background-color .3s, 
	    opacity .5s, visibility .5s;
	  opacity: 0;
	  visibility: hidden;
	  z-index: 1000;
	  border-radius: 50px;
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
.comments{
	background: whitesmoke;
	padding: 20px;

}


#stage_icon img{
	height: 30px;
	width: 30px;
}
#stage_icon {
	padding: 20px;
}

/* seller product images  */
#items{
height: 18em;
max-width: 14em;
object-fit: cover;
overflow: hidden;
}




</style>


















<body style="padding-top: 60px;">
	<!--- back to top -->
	<a id="button"></a>

	<?php

	$user_id = $_SESSION['user-id'];
	$user_fullname = $_SESSION['user-fullname'];



	

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

		.content{
			margin-top: 30px;
		}
		#shoppic img{
			border-radius: 50%;
			height: 40vh;
			width: auto;
		}
		

	</style>


	
	<?php 	
	//Get product info
	$shop = $_GET['shop'];
	$_SESSION['shopid'] = $_GET['shop'];

	
	

	$get_info = $dbconnnect->query("SELECT * FROM product WHERE shop_id='$shop'");

	// Seller Information
	$seller_info = $dbconnnect->query("SELECT * FROM sellers WHERE shop_id = '$shop'");
	$seller_row = $seller_info->fetch_assoc();

	if (!empty($seller_row['backimage'])) {
			echo'<img id="background" src="../assets/SellerAccountImages/'.$seller_row["backimage"].'">';
		}
	
	?>
	<!-- shop image -->



	<div class="container">	
	<div class="row">
		

	
	

	<div style="margin-left: 35%;">

	<div class="col-xs-6 profile_pic">
		<div id="shoppic">
			<img  src="../assets/SellerAccountImages/<?php echo $seller_row['image']; ?>" width="100%" >
		</div>
	</div>

	<div class="top-wrap col-xs-7">
		<div class="content">
		<h3><a href="UserSellerShop.php?shop=<?php echo$shop; ?>"><b><?php echo $seller_row['shop_name']; ?></b></a></h3>
				<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
						<path fill="none" d="M10,15.654c-0.417,0-0.754,0.338-0.754,0.754S9.583,17.162,10,17.162s0.754-0.338,0.754-0.754S10.417,15.654,10,15.654z M14.523,1.33H5.477c-0.833,0-1.508,0.675-1.508,1.508v14.324c0,0.833,0.675,1.508,1.508,1.508h9.047c0.833,0,1.508-0.675,1.508-1.508V2.838C16.031,2.005,15.356,1.33,14.523,1.33z M15.277,17.162c0,0.416-0.338,0.754-0.754,0.754H5.477c-0.417,0-0.754-0.338-0.754-0.754V2.838c0-0.417,0.337-0.754,0.754-0.754h9.047c0.416,0,0.754,0.337,0.754,0.754V17.162zM13.77,2.838H6.23c-0.417,0-0.754,0.337-0.754,0.754v10.555c0,0.416,0.337,0.754,0.754,0.754h7.539c0.416,0,0.754-0.338,0.754-0.754V3.592C14.523,3.175,14.186,2.838,13.77,2.838z M13.77,13.77c0,0.208-0.169,0.377-0.377,0.377H6.607c-0.208,0-0.377-0.169-0.377-0.377V3.969c0-0.208,0.169-0.377,0.377-0.377h6.785c0.208,0,0.377,0.169,0.377,0.377V13.77z"></path>
					</svg> <?php echo $seller_row['phone']; ?>
				</h5>

				<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
						<path d="M17.218,2.268L2.477,8.388C2.13,8.535,2.164,9.05,2.542,9.134L9.33,10.67l1.535,6.787c0.083,0.377,0.602,0.415,0.745,0.065l6.123-14.74C17.866,2.46,17.539,2.134,17.218,2.268 M3.92,8.641l11.772-4.89L9.535,9.909L3.92,8.641z M11.358,16.078l-1.268-5.613l6.157-6.157L11.358,16.078z"></path>
					</svg> <?php echo $seller_row['email']; ?>
				</h5>

				<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M10,0.186c-3.427,0-6.204,2.778-6.204,6.204c0,5.471,6.204,6.806,6.204,13.424c0-6.618,6.204-7.953,6.204-13.424C16.204,2.964,13.427,0.186,10,0.186z M10,14.453c-0.66-1.125-1.462-2.076-2.219-2.974C6.36,9.797,5.239,8.469,5.239,6.39C5.239,3.764,7.374,1.63,10,1.63c2.625,0,4.761,2.135,4.761,4.761c0,2.078-1.121,3.407-2.541,5.089C11.462,12.377,10.66,13.328,10,14.453z"></path>
							<circle fill="none" cx="10" cy="5.67" r="1.608"></circle>
						</svg> <?php echo $seller_row['barangay']." ".$seller_row['city']." ".$seller_row['province'] ?></h5>

				<h5 class="text-left"> <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M16.254,3.399h-0.695V3.052c0-0.576-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042v0.347H6.526V3.052c0-0.576-0.467-1.042-1.042-1.042S4.441,2.476,4.441,3.052v0.347H3.747c-0.768,0-1.39,0.622-1.39,1.39v11.813c0,0.768,0.622,1.39,1.39,1.39h12.507c0.768,0,1.391-0.622,1.391-1.39V4.789C17.645,4.021,17.021,3.399,16.254,3.399z M14.17,3.052c0-0.192,0.154-0.348,0.348-0.348c0.191,0,0.348,0.156,0.348,0.348v0.347H14.17V3.052z M5.136,3.052c0-0.192,0.156-0.348,0.348-0.348S5.831,2.86,5.831,3.052v0.347H5.136V3.052z M16.949,16.602c0,0.384-0.311,0.694-0.695,0.694H3.747c-0.384,0-0.695-0.311-0.695-0.694V7.568h13.897V16.602z M16.949,6.874H3.052V4.789c0-0.383,0.311-0.695,0.695-0.695h12.507c0.385,0,0.695,0.312,0.695,0.695V6.874z M5.484,11.737c0.576,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043s-1.042,0.467-1.042,1.043C4.441,11.271,4.908,11.737,5.484,11.737z M5.484,10.348c0.192,0,0.347,0.155,0.347,0.348c0,0.191-0.155,0.348-0.347,0.348s-0.348-0.156-0.348-0.348C5.136,10.503,5.292,10.348,5.484,10.348z M14.518,11.737c0.574,0,1.041-0.467,1.041-1.042c0-0.576-0.467-1.043-1.041-1.043c-0.576,0-1.043,0.467-1.043,1.043C13.475,11.271,13.941,11.737,14.518,11.737z M14.518,10.348c0.191,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.156-0.348-0.348C14.17,10.503,14.324,10.348,14.518,10.348z M14.518,15.212c0.574,0,1.041-0.467,1.041-1.043c0-0.575-0.467-1.042-1.041-1.042c-0.576,0-1.043,0.467-1.043,1.042C13.475,14.745,13.941,15.212,14.518,15.212z M14.518,13.822c0.191,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348c-0.193,0-0.348-0.155-0.348-0.348C14.17,13.978,14.324,13.822,14.518,13.822z M10,15.212c0.575,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042c-0.576,0-1.042,0.467-1.042,1.042C8.958,14.745,9.425,15.212,10,15.212z M10,13.822c0.192,0,0.348,0.155,0.348,0.347c0,0.192-0.156,0.348-0.348,0.348s-0.348-0.155-0.348-0.348C9.653,13.978,9.809,13.822,10,13.822z M5.484,15.212c0.576,0,1.042-0.467,1.042-1.043c0-0.575-0.467-1.042-1.042-1.042s-1.042,0.467-1.042,1.042C4.441,14.745,4.908,15.212,5.484,15.212z M5.484,13.822c0.192,0,0.347,0.155,0.347,0.347c0,0.192-0.155,0.348-0.347,0.348s-0.348-0.155-0.348-0.348C5.136,13.978,5.292,13.822,5.484,13.822z M10,11.737c0.575,0,1.042-0.467,1.042-1.042c0-0.576-0.467-1.043-1.042-1.043c-0.576,0-1.042,0.467-1.042,1.043C8.958,11.271,9.425,11.737,10,11.737z M10,10.348c0.192,0,0.348,0.155,0.348,0.348c0,0.191-0.156,0.348-0.348,0.348s-0.348-0.156-0.348-0.348C9.653,10.503,9.809,10.348,10,10.348z"></path>
						</svg> <?php $date = $seller_row['date_registration']; $date = strtotime($date); $date = date('M-d-Y',$date); echo $date; ?></h5>		

    <?php
    //star rate
    $shop_id = $shop;

        $ratequery = "SELECT shop_id FROM feedback_table WHERE shop_id = '$shop_id' "; 
        $result =mysqli_query($dbconnnect, $ratequery);   
       	if ($result->num_rows == 0) {
       		$rate_times = 0;
          $rate_value = 0;
          $rate_bg = 0;
       	}else{

       	$ratequery = "SELECT * FROM feedback_table WHERE shop_id = '$shop_id' "; 
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
            <div style="margin-left:30px; margin-top: 30px;">
               <div class="result-container">
	               <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
	               <div class="rate-stars"></div>
            	</div>                    
            	<span class="reviewScore"><?php echo substr($rate_value,0,3); ?></span><span class="reviewCount">(<?php echo $rate_times; ?> reviews)</span>
					<br><br>



					<!-- Total followers -->
					<?php 
					$fol_sql = $dbconnnect->query("SELECT shop_id FROM follow_table WHERE shop_id = '$shop'");
					$follower = mysqli_num_rows($fol_sql);
					 ?>
				
					<p style="font-size: 20px;"><b>Followers: </b><?php echo$follower?></p>
					<br>

					<?php 
					$pro_sql = $dbconnnect->query("SELECT shop_id FROM product WHERE shop_id = '$shop'");
					$post = mysqli_num_rows($pro_sql);
					 ?>
					<p style="font-size: 20px;"><b>Post: </b><?php echo$post ?></p>

					


					<?php 
					//check follow
					$exist = $dbconnnect->query("SELECT * FROM follow_table WHERE user_id = '$user_id' AND shop_id = '$shop'");
					$exist_fol = mysqli_num_rows($exist);
					if ($exist_fol == 0) {
						?>
						<a href="UserSellerShop.php?follow=<?php echo$user_id ?>&shop=<?php echo$shop ?>" class="btn btn-primary">Follow</a>

						<?php
					}else{
						?>
						<a href="UserSellerShop.php?Unfollow=<?php echo$user_id ?>&shop=<?php echo$shop ?>" class="btn btn-primary">Unfollow</a>
						<?php
					}

					 ?>
					
					
					
					<a href="UserChatIndex.php" class="btn btn-primary">Chat</a>
				</div>
			</div>

	<br>
	<br>
	</div> 
	</div><!-- ROW -->
	</div>
	<br>
	<br>



	<script>
function myFunction() {
	document.getElementById("result").hidden = false;
	document.getElementById("btn").hidden = false;
}
function myFunction2() {
	document.getElementById("result").hidden = true;
	document.getElementById("btn").hidden = true;
}


		
	$(document).ready(function(){

	 load_data();

	 function load_data(query)
	 {
		$.ajax({
		 url:"UserSellerProfileSearch.php",
		 method:"POST",
		 data:{query:query},
		 success:function(data)
		 {
			$('#result').html(data);
		 }
		});
	 }
	 $('#search_text').keyup(function(){
		var search = $(this).val();

		if(search != '')
		{
		 load_data(search);
		}
		else
		{
		 load_data();
		}
	 });
	});
	</script>

	<br><br>


	<h4 style="
	font-family: 'Lobster', cursive;
	font-size: 40px;
	color: black;
	">Product</h4>
		<!-- Sort btn -->


		<br/>
	
			<!---------------------- SEARCH BAR ---------------------->

		<br/>
		
			
		<input onclick="myFunction()" type="text" name="search_text" id="search_text" placeholder="Search by Product" class="form-control" />
		<br/>
	
		<span id="btn" hidden><a href="UserSellerShop.php?shop=<?php echo$shop; ?>"><button onclick="myFunction2()" class="btn btn-primary">Cancel</button></a></span>
		
			
	
	
		
			<div id="result" hidden></div>
		<br/>
	



	
	
	<div class="shop-category-container container text-center" style="padding-top: 20px;">
		<ul>
			<?php
			if(isset($_GET['val'])) {
				$val = $_GET['val'];
			} else {
				$val = '';
			}

			
			
		
		?>
			
			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Dress" class="btn <?php echo ($val == 'Dress') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_dress.png"></span><br>Dress</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Gown" class="btn <?php echo ($val == 'Gown') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_gown.png"></span><br>Gown</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Pants" class="btn <?php echo ($val == 'Pants') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_trousers.png"></span><br>Pants</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Shorts" class="btn <?php echo ($val == 'Shorts') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_shorts.png"></span><br>Shorts</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Coat" class="btn <?php echo ($val == 'Coat') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_coat.png"></span><br>Coat</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Slacks" class="btn <?php echo ($val == 'Slacks') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_pants.png"></span><br>Slacks</a></li>

			<li><a href="UserSellerShop.php?shop=<?php echo$shop_id; ?>&val=Others" class="btn <?php echo ($val == 'Others') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_other.png"></span><br>Others</a></li>

		</ul>
	</div>



	<div class="row" style="padding-top: 40px;">
	<?php
	//products

	//calling images
	
	//money format
	function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}

	if (isset($_GET['val'])) {
	$val = $_GET['val'];
	$sql = $dbconnnect->query("SELECT * FROM product WHERE shop_id='$shop' AND product_category = '$val'");
	} 
	else {
		$sql = $dbconnnect->query("SELECT * FROM product WHERE shop_id='$shop'");
	}
	

	


	while ($info_row = mysqli_fetch_assoc($sql)) {
		$pro_id = $info_row['product_id'];
		$pro_price = $info_row['product_prize'];

		//image 
		$call_img = $dbconnnect->query("SELECT product_image FROM product_images WHERE shop_id = '$shop' AND product_id = '$pro_id'");
		$img_row = $call_img->fetch_assoc();
		$pro_price = asDollars($pro_price);
		?>
			<div class="col-xs-3 shop-product-item">
				<div class="container">
					<div style="margin-top: 5em;">
							<div class="image img img-thumbnail">
								<img id='items' src="../assets/Multiple_product_image/<?php echo $img_row['product_image']; ?>"  >
							</div>
							
								<?php $product_name = $info_row['product_name'];
									if (strlen($product_name) > 20) {
									$trimstring = substr($product_name, 0, 20). '...';
									} else {
									$trimstring = $product_name;
									}
									?>
								<h5><a href="UserProductProfile.php?item=<?php echo $pro_id; ?>&shop_id=<?php echo $info_row['shop_id']; ?>" style="text-decoration: none;"><?php echo $trimstring; ?></a></h5>
							</div>
							<div>
								<h6><?php echo $pro_price; ?></h6>
					</div>
				</div>
			</div>
		<?php
		
		//item price
		
		}

	 ?>
	</div>
	<?php 
	$sql = $dbconnnect->query("SELECT country,region,province,city,barangay FROM sellers where shop_id = '$shop'");
	$row = $sql->fetch_assoc();
	$Country = $row['country'];
	$Region = $row['region'];
	$Province = $row['province'];
	$City = $row['city'];
	$Barangay = $row['barangay'];
	$loc = $Barangay."%20".$City."%20".$Province."%20".$Country;
	 ?>

	 <h4 style="margin-top: 45px; padding: 20px;">Our Location</h4>

	<div class="mapouter" style="margin-left:90px;"><div class="gmap_canvas"><iframe width="1000" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo$loc ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:500px;width:600; margin-right: 100px;}</style></div></div>

	<div class="container">
<br><br>
<br><br>

		
		<br>
		<?php 
		$sql = $dbconnnect->query("SELECT shop_id,rate,comment,user_id,username,date_post,product FROM feedback_table WHERE shop_id = '$shop_id' ORDER BY `feedback_table`.`date_post` DESC");


		$num_row = mysqli_num_rows($sql);
		
		echo"<h4>Comments (".$num_row.")</h4>";
		
		

		?>
	<br>
	<br>
	<br>
	
		<?php
		$sql = $dbconnnect->query("SELECT shop_id,rate,comment,user_id,username,date_post,product FROM feedback_table WHERE shop_id = '$shop_id' ORDER BY `feedback_table`.`date_post` DESC lIMIT 5");

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
			echo"<h5 style='text-align:center;'><a href='UserShopComments.php?shop=".$shop_id."' class='btn btn-info'>See all</a></h5>";
			echo"</div>";
		}
		 ?>
	</div>


</div> <!-- CONTAINER -->
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