<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arkimorma | My Income</title>
    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/navigation.php'); ?>

    
    <div class="date">
        <div class="container">
             <h2>This January</h2>
             <div class="row">
            
                <div class="col-xs-6">
                    
                    <h7>Show <input type="number" value="1"> entries </h7> 
                </div>
                    
                <div class="col-xs-6 text-right">
                   <h7>Search: <input type="search" value="" id="search" onchange="openPage()"> </h7>
                </div>
            </div>
            <br>
                <table class="table">
                    <tr>
                        <th>Order Id</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Deposit</th>
                        <th>Status</th>
                        <th>Earn</th>
                     </tr>
                </table>
            
            <br>
            <div class="row">

                <div class="col-xs-6">
                    <h7>Showing 0 to 0 of 0 entries</h7>
                </div>
                    <div class="text-right">
                        <button type="button" class="btn btn-link">Previous</button>
                        <button type="button" class="btn btn-link">Next</button>
                    </div>
            </div>

                <div class="Total">
                    <h6>Total: </h6>
                </div>
                <br><br><br>


                <div class="Income Statement">
                    <h6>Income Statement:</h6>
                        <select>
                            <option>Choose Month</option>  
                        </select>

                        <button type="button" class="btn btn-success">Enter</button>
                        <br>
                        <br>
                    <div class="">
                        <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Statement</th>
                        <th>Net_Income</th>
                        <th>Action</th>
                     </tr>
                </table>
                </div>
                </div>
         </div>
    </div>




    <script src="assets/js/jquery.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
	<script src="assets/plugins/fontawesome/js/fontawesome.js"></script>
</body>
</html>