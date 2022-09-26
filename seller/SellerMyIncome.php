<?php 
 include('../includes/seller-navigation.php');
$error = NULL;
require_once'dbcon.php';

include('../includes/SellerMonthly.php');
function asDollars($value) {
    if ($value<0) return "-".asDollars(-$value);
		return '₱ ' . number_format($value);
	}
	$selid = $_SESSION['id'];
	$selshopname = $_SESSION['shopname'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | My Income</title>
	<link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>


	
		<div class="container" style="margin-top:50px;">
			 <h2>This Month</h2>
			
			<br>
				<table  id="myTable">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Deposit</th>
							<th>Status</th>
							<th>Earn</th>
						</tr>
					</thead>
					<tbody>
						<?php 

							$sql = $dbconnnect->query("SELECT * FROM order_table WHERE MONTH(order_complete) = '$today' AND seller_id = '$selid'");
							$total = 0;
							while ($row = mysqli_fetch_assoc($sql)) {
							?>
						
								<tr>
									<td><?php echo$row['order_id'] ?></td>
									<td><a href="SellerReceiptCompleted.php?order_id=<?php echo$row['order_id']; ?>"><?php echo$row['product_name'] ?></a></td>


									<td><?php echo$row['quantitty'] ?></td>  
									<td><?php $price = $row['order_price']; $price = asDollars($price); echo$price; ?></td>  
									<td><?php $deposit = $row['deposit']; $deposit = asDollars($deposit); echo$deposit; ?></td>  
									<td><?php echo$row['status'] ?></td> 
									<td><?php $earn = $row['earn']; $earn = asDollars($earn); echo$earn; ?></td> 
								</tr>
							<?php
								$total = $row['earn'] + $total;
								
							}
						?>
					</tbody>
				</table>
			
			<br>
		

				<div class="Total">
					<h6> Total : <?php $total = asDollars($total); echo $total; ?></h6>
				</div>
				<br><br><br>


				<div class="Income Statement">
					<h5>Income Statement:</h5>
					<div class="">
						<form action="SellerMyIncome.php" method="POST">
							<select class="form-select" aria-label="Default select example" name="months">
								<option selected>Choose Month</option>
								<?php 
								$sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid'");
								while ($row = mysqli_fetch_assoc($sql)) {
									?>
										<option value="<?php echo$row['month']; ?>"><?php echo$row['m']; ?></option>
									<?php
								}
								?>
							</select>
							<input type="submit" name="month_sort" value="Enter"class="btn btn-success">
						</form>

						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Statement</th>
									<th>Net_Income</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 

							if (isset($_POST['month_sort'])) {
								$month = $_POST['months'];
								$sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
							}
							else{
							   $sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid'");
							}

								if ($sql->num_rows == 0) {
									echo "<td colspan='4' style='text-align: center;'>No Available Data</td>";
								}
								while ($row = mysqli_fetch_assoc($sql)) {
								?>
								<tr>
							  		<td><?php echo$row['no']; ?></td>
							  		<td>Income Statement for <?php echo$row['m']; ?> Year <?php echo$row['year']; ?></td>
							  		<td><?php $net_income = $row['net_income']; $net_income = asDollars($net_income); echo$net_income; ?></td>
							  		<td><a href="SellerIncomeStat.php?id=<?php echo$row['no']; ?>">View</a></td>

								</tr>
								<?php
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
		 </div>
	

	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('#myTable').dataTable();
		});
	</script>
</body>
</html>