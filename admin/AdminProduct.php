<?php 
require_once 'dbconn.php';

session_start();
if (!isset($_SESSION['log'])) {
    header("location:AdminHomepage.php");
  }

if (isset($_GET['logout'])) {
  session_destroy();
  header("location:index.php");
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | Admin-Products</title>
  <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/admin-style.css">
</head>
<style type="text/css">

</style>
<body>

<?php include('../includes/admin-navigation.php'); ?>

<div class="container">
  <div id="Product">
  <h2>Products</h2>

    <table class="table table-hover table-striped table-bordered">
      <thead>
        <tr>
          <th>Product id</th>
          <th>Shop</th>
          <th>Product Category</th>
          <th>Product Name</th>
          <th>Stocks</th>
          <th>Product Price</th>
          <th>Date Posted</th>
        </tr>
      </thead>
        
  <?php 
  $com = $dbconnnect->query("SELECT * FROM product");
  while ($row = mysqli_fetch_assoc($com)) {
    ?>
      <tr>
        <td><?php echo$row['product_id']; ?></td>
        <td><?php echo$row['shop_id'];?></td>
        <td><?php echo$row['product_category']; ?></td>
        <td><?php echo$row['product_name']; ?></td>
        <td><?php echo$row['stocks']; ?></td>
        <td><?php echo$row['product_prize']; ?></td>
        <td><?php echo$row['product_date_posted']; ?></td>
      </tr>
  <?php
  }


   ?>

    </table>
  </div>
</div>
</body>
</html>