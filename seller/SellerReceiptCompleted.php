<?php 
require_once'dbcon.php';
if (isset($_GET['order_id'])) {
	$order_id = $_GET['order_id'];
	$sql = $dbconnnect->query("SELECT * FROM order_table WHERE order_id = '$order_id'");
	$row = $sql->fetch_assoc();
}
function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arkimorma | Completed Receipt</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 50px;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        	.btn-btn{
		  background-color: #4CAF50; /* Green */
		  border: none;
		  color: white;
		  padding: 15px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  cursor: pointer;
		  margin-left: 47%;
		}
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">ARKIMORMA</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">@arkimorma.ac</p>
                        <p class="text-white">arkimorma@gmail.com</p>
                        <p class="text-white">+63396115705</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <p class="sub-heading">Order Date: <?php $date = $row['order_time']; $timestamp = strtotime($date);
                    $new_date = date('F d Y', $timestamp);  echo$new_date; ?></p>
                    <p class="sub-heading">Email Address: <?php echo$row['cust_email']; ?></p>
                </div>
                <div class="col-6">
                    <p class="sub-heading">Full Name: <?php echo$row['cust_name'] ?></p>
                    <p class="sub-heading">Address:  <?php echo$row['cust_address'] ?></p>
                    <?php 
                    $id = $row['user_id'];
                    $sql_phone = $dbconnnect->query("SELECT phone FROM user WHERE user_id = '$id'");
                    $num = $sql_phone->fetch_assoc();
                    ?>
                    <p class="sub-heading">Phone Number: <?php echo$num['phone'] ?> </p>
                    <p class="sub-heading">City,State,Pincode: <?php echo$row['cust_city']." ".$row['cust_province']." ".$row['cust_postal_code'] ?> </p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Price</th>
                        <th class="w-20">Deposit</th>
                        
                        <th class="w-20">Grandtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><?php echo$row['product_name'] ?></td>
                        <td><?php echo$row['quantitty'] ?></td>
                        <td><?php $price = $row['order_price']; $price = asDollars($price); echo$price ?></td>
                        <td><?php $deposit = $row['deposit']; $deposit = asDollars($deposit); echo$deposit?></td>
                        <?php $total = $price = $row['order_price'] + $deposit = $row['deposit']; ?>
                        <td><?php  $total = asDollars($total); echo$total?></td>
                    </tr>
                
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Arkimorma. All rights reserved. 
              
            </p>
        </div>      
    </div>      

</body>
</html>

<button class="btn-btn" onclick="window.print()">Print</button>