<?php include('../includes/seller-navigation.php'); ?>
<?php 

if (!isset($_SESSION['sellerlogin'])) {
 	header("location:SellerHomepage.php");
 }
 $selid = $_SESSION['id'];

function myAlert($msg, $url) {
    echo '<script language="javascript">alert("'.$msg.'");</script>';
    echo "<script>document.location = '$url'</script>";
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Upload Product</title>

	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
</head>

<body>

	

	<div class="container">
		<h2 class="text-center" >Upload Product</h2>
<br><br><br>
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<!-- image design -->
					<div class="imagestyle"><img src="../assets/css/sample.jpg" width="90%"></div>
				</div>
				<div class="col-xs-5">
					<!-- Post product form -->
					<form action="SellerProductProcess.php" method="POST" enctype="multipart/form-data">

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Upload Image:</label>
							</div>
							<div class="col-xs-8">
								<input type="file" name="file[]" class="form-control" id="file" multiple>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Choose Category :</label>
							</div>
							<div class="col-xs-8">
								<select name="category" class="form-control">
									<option name="cat" value="Dress">Dress</option>
									<option name="cat" value="Gown">Gown</option>
									<option name="cat" value="Pants">Pants</option>
									<option name="cat" value="Shorts">Shorts</option>
									<option name="cat" value="Coat">Coat</option>
									<option name="cat" value="Slacks">Slacks</option>
									<option name="cat" value="Others">Others</option>
								</select>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Item Name:</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="pro_name" required="" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">For:</label>
							</div>
							<div class="col-xs-8">
								<input required type="radio" name="age"  value="Baby">Baby 
								<input required type="radio" name="age"  value="Kids">Kids 
								<input required type="radio" name="age"  value="Teen">Teen 
								<input required type="radio" name="age"  value="Adult">Adult 
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Material:</label>
							</div>
							<div class="col-xs-8">
								<input type="text" name="material" required="" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Details:</label>
							</div>
							<div class="col-xs-8">
								<textarea  name="detail"  class="form-control"></textarea>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label>Metric: </label><br><br>
								<label for="">Size:</label> 

								
									

							</div>
						
							<div class="col-xs-8">
								<select name="metric" id="metric">
										<option selected>choose metric</option>
										  <option  value="cm">cm</option>
										  <option  value="inch">Inch</option>
										</select>
										<br><br>
								<button class="btn btn-warning" type="button" onclick="smallFUNC()">Small</button>
								<div id="small" hidden>
									<b>Small: </b>
										<br>
										<input type="number" name="S_shoulder" placeholder="shoulder">
										<input type="number" name="S_waist" placeholder="waist">
										<input type="number" name="S_chest" placeholder="chest">
										<br>
								</div>

								<button class="btn btn-warning" type="button" onclick="mediumFUNC()">Medium</button>
								<div id="medium" hidden>

									<b>Medium: </b>
										<br>
										<input type="number" name="M_shoulder" placeholder="shoulder">
										<input type="number" name="M_waist" placeholder="waist">
										<input type="number" name="M_chest" placeholder="chest">
										<br>

								</div>	

								<button class="btn btn-warning" type="button" onclick="largeFUNC()">Large</button>
								<div id="large" hidden>

									<b>Large: </b>
										<br>
										<input type="number" name="L_shoulder" placeholder="shoulder">
										<input type="number" name="L_waist" placeholder="waist">
										<input type="number" name="L_chest" placeholder="chest">
										<br>

								</div>	

								<button class="btn btn-warning" type="button" onclick="XlargeFUNC()">XLarge</button>
								<div id="Xlarge" hidden>

									<b>XLarge: </b>
										<br>
										<input type="number" name="XL_shoulder" placeholder="shoulder">
										<input type="number" name="XL_waist" placeholder="waist">
										<input type="number" name="XL_chest" placeholder="chest">
										<br>

								</div>	

								<button class="btn btn-warning" type="button" onclick="XXlargeFUNC()">XXLarge</button>
								<div id="XXlarge" hidden>

									<b>XXLarge: </b>
										<br>
										<input type="number" name="XXL_shoulder" placeholder="shoulder">
										<input type="number" name="XXL_waist" placeholder="waist">
										<input type="number" name="XXL_chest" placeholder="chest">
										<br>

								</div>	



							
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Stocks:</label>
							</div>
							<div class="col-xs-8">
								<input type="number" name="Stocks" required="" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Price:</label>
							</div>
							<div class="col-xs-8">
								<input type="number" name="pro_price" required="" class="form-control">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-xs-4 text-right">
								<label for="">Deposit:</label>
							</div>
							<div class="col-xs-8">
								<input type="number" name="pro_deposit" required="" class="form-control">
							</div>
						</div>


						<div class="form-group text-right">
							<input type="submit" name="Post-product" value="Post" class="btn btn-sm btn-primary">
						</div>
					</form>
				</div>
			</div>
			

		</div>
	</div>

	<br>

	<br>

	<br>

	<br>

	<br>


<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

<script>
	function smallFUNC() {
		document.getElementById("small").hidden = false;
		}
	function mediumFUNC() {
		document.getElementById("medium").hidden = false;
		}
	function largeFUNC() {
		document.getElementById("large").hidden = false;
		}
	function XlargeFUNC() {
		document.getElementById("Xlarge").hidden = false;
		}
	function XXlargeFUNC() {
		document.getElementById("XXlarge").hidden = false;
		}

</script>

</body>
</html>