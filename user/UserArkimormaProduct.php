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

	 <title>Arkimorma | product</title>
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
			height: 300px;
			width: 100%;
			object-fit: cover;
	 }

/*	 .container{
			display: flex;
			
	 }*/

	  .content{
	 	transition: transform .2s;

	 }

	 .content:hover{
	 	background: #EAECEE;
	 	 -ms-transform: scale(1.5); /* IE 9 */
		  -webkit-transform: scale(0.5); /* Safari 3-8 */
		  transform: scale(1.1); 
		


	 }


	 .shops-item-content{
	 	padding: 10px;
	 }



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

	#stage_icon img{
		height: 30px;
		width: 30px;
	}
	#stage_icon{
		padding: 20px;
	}


form.search input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid whitesmoke;
  float: left;
  width: 70%;
  background: whitesmoke;
margin-left: 90px;
}

form.search button {
  float: left;
  width: 20%;
  height: 50px;
  padding: 10px;
  background: #fff;
  color: black;
  font-size: 17px;
  border: 1px solid whitesmoke;
  border-left: none;
  cursor: pointer;
}

form.search button:hover {
  background: black;
  color: white;
}

form.search::after {
  content: "";
  clear: both;
  display: table;

}



</style>
<body>
	<!--- back to top -->
	<a id="button"></a>

<?php 
$user_id = $_SESSION['user-id'];
$user_fullname = $_SESSION['user-fullname'];
?>

<h2 style="text-align:center;
font-family: 'Lobster', cursive;
font-size: 60px;
"><a style="color: black;" href="UserArkimormaProduct.php">Products</a></h2>

<br>
<br>

<div class="container">
	<!------   Search bar   ---->

<form class="search" method="GET" action="UserArkimormaProduct.php">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit" name="search_product"><i class="fa fa-search"></i></button>
</form>
	<br>
	<br>

<br>
</div>
<div class="shop-category-container container" style="text-align: center;">
	<!---- sort tab ---->
	<ul>
		<?php
			if(isset($_GET['val'])) {
				$val = $_GET['val'];
			} else {
				$val = '';
			}

			
			
		
		?>
		<li><a href="UserArkimormaProduct.php?val=Dress" class="btn <?php echo ($val == 'Dress') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_dress.png"></span><br>Dress</a> </li>



		

		<li><a href="UserArkimormaProduct.php?val=Gown" class="btn <?php echo ($val == 'Gown') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_gown.png"></span><br>Gown</a></li>

		
		<li><a href="UserArkimormaProduct.php?val=Pants" class="btn <?php echo ($val == 'Pants') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_trousers.png"></span><br>Pants</a></li>

		
		<li><a href="UserArkimormaProduct.php?val=Shorts" class="btn <?php echo ($val == 'Shorts') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_shorts.png"></span><br>Shorts </a></li>

		
		<li><a href="UserArkimormaProduct.php?val=Coat" class="btn <?php echo ($val == 'Coat') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_coat.png"></span><br>Coat</a></li>


		
		<li><a href="UserArkimormaProduct.php?val=Slacks" class="btn <?php echo ($val == 'Slacks') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_pants.png"></span><br>Slacks </a></li>


		
		<li><a href="UserArkimormaProduct.php?val=Others" class="btn <?php echo ($val == 'Others') ? 'btn-primary' : 'btn-default'; ?>"><span id="stage_icon"><img src="../assets/images/sort_other.png"></span><br>Others</a></li>



	</ul>
	
</div>

<br><br>
	
<div class="container">
	

	
	<?php 


	if (isset($_GET['val'])) {
		 $val = $_GET['val'];
		  $sql = "SELECT * FROM product WHERE product_category = '$val'";
	}
	elseif (isset($_GET['search_product'])) {
		$search = mysqli_real_escape_string($dbconnnect, $_GET["search"]);
		 $sql = "
		  SELECT * FROM product
		  WHERE product_name LIKE '%".$search."%'
		  OR product_details LIKE '%".$search."%'
		 ";
	}
	else{
		$sql = "SELECT * FROM product";
	}
		 
	?>
		
<div class="shops-container container">
	<div class="row">
	 <?php    
	 //fetching all product
	

	 $result = mysqli_query($dbconnnect,$sql);


	 while ($row = mysqli_fetch_assoc($result)) {
	 		$product_id = $row['product_id'];
			$shop_id = $row['shop_id'];
			$product_name = $row['product_name'];
			$Product_category = $row['product_category'];
			$product_material = $row['product_material']; 
			$price = $row['product_prize'];
			?>
			 <div class="shops-item col-xs-3">
				<div class="content">  
				<div class="shops-item-content">
					 
						<?php 
						$sql_pic = $dbconnnect->query("SELECT product_image FROM product_images WHERE product_id = '$product_id'");
						$img_row = $sql_pic->fetch_assoc();
						 ?>
						 <div id="proimg">
							 <img src="../assets/Multiple_product_image/<?php echo $img_row['product_image']; ?>" >
						</div>


						<?php $string = $product_name;
						if (strlen($string) > 25) {
						$trimstring = substr($string, 0, 25). '...';
						} else {
						$trimstring = $string;
						}
						?>
						<b><a href="UserProductProfile.php?item=<?php echo $product_id ?>&shop_id=<?php echo$shop_id ?>"><?php echo $trimstring; ?></a></b>

						<p><?php $price = asDollars($price); echo$price; ?></p>
						<br><br>


						
						<a href="UserSellerShop.php?shop=<?php echo $shop_id ?>"><button class="btn btn-xs btn-success">View Shop</button></a>
						
					</div>
				</div>
		
			 </div>

	<?php } ?>
	</div>
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