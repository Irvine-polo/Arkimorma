<?php 
require_once'dbcon.php';

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
	<title></title>

	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" 
	href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" 
	src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" 
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
		

<table id="myTable">  
    <thead>  
      <tr>  
        <th>Order ID</th>  
        <th>Product</th>  
        <th>Quantity</th>  
        <th>Price</th> 
        <th>Deposit</th> 
        <th>Status</th> 
        <th>Earn</th> 

        
          </tr>  
        </thead>  



<?php 
$today = date('m');

$sql = $dbconnnect->query("SELECT * FROM order_table WHERE MONTH(order_complete) = '$today' AND seller_id = '$selid'");
$total = 0;
while ($row = mysqli_fetch_assoc($sql)) {
?>	
  <tbody>  
          <tr>  
            <td><?php echo$row['order_id'] ?></td>  
            <td><?php echo$row['product_name'] ?></td>  
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
<h3> Total : <?php $total = asDollars($total); echo$total; ?></h3>


      <script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>







<br><br><br>

<h3>Income Statements</h3>
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

<table class="table table-hover table-striped table-bordered">
 <thead>
        <tr>
          <th>No</th>
          <th>Statement</th>
          <th>Net_income</th>
          <th>Action</th>
       
   		 </tr>
 </thead>

<input type="submit" name="month_sort" value="Enter">
</form>




 <?php 

if (isset($_POST['month_sort'])) {
  $month = $_POST['months'];

 $sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
  
}
else{
   $sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid'");
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







</table>


</body>
</html>