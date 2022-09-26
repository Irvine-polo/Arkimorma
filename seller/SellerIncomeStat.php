<?php 
require_once'dbcon.php';
function asDollars($value) {
	  if ($value<0) return "-".asDollars(-$value);
	  return '₱ ' . number_format($value);
	}
if (isset($_GET['id'])) {
	$id = $_GET['id'];

}
$sql = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE no = '$id'");
$row = $sql->fetch_assoc();

 ?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
	.text-danger strong {
    		color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		}

		.p{
			margin-left: 45%;
		}

</style>
<div class="container">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
						
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>ARKIMORMA</h5>
							<p>09123456789 <i class="fa fa-phone"></i></p>
							<p>arkimorma@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>Philippines <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>Income Statement</h3>
						</div>
					</div>
		
			
            <div>
                <table class="table table-bordered">
                    <thead >
                        <tr>
                            <th>Statements</th>
                            <th>Net Income</th>
                            <th>Month</th>
                            <th>Year</th>
                          
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Income Statement for <?php echo$row['m']?> Year <?php echo$row['year']; ?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php $net = $row['net_income']; $net = asDollars($net); echo$net;?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo$row['m'];?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> <?php echo$row['year']?></td>
                           
                         
                        </tr>
                       
                     
                        
                        
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right"><br>
							<p><b>Date Printed :</b> <?php 
							$today = date('Y-d-M');
							echo$today;
						?></p>
							<h5 style="color: rgb(140, 140, 140);">ARKIMORMA | Income Statement</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							
							
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>

<div class="p">
	<a class="btn btn-primary btn-lg active"  onclick="window.print()">Print</a>
	<a href="SellerMyIncome.php" class="btn-default">Back</a>
</div>