<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To rate</title>

    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/checkout-style.css">
</head>

<body>

        <?php include('includes/navigation.php'); ?>
            <div class="container to-rate">
                <div class="row">
                    <div class="to-rate-img col-xs-6">
                        <img src="assets/images/shop4.jpg" alt="" style=width:100%;>
                    </div>

                    <div class="to-rate-productinfo col-xs-6">
                        <h2>Style Shop</h2>
                        <h6>Contact:  friscarl10@gmail.com | 09265454154</h6>

                        <h6>Address: Ninoy Aquino Angeles City Pampanga Region 3</h6>
                        <h6>Rate</h6>
                        <h6>Are you satify?</h6>
                        <div>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <br>

                        <div class="form-group">
									<label>Message:</label>
									<textarea name="mensahe" required="required" class="form-control" cols="30" rows="10"></textarea>
						</div>
                        
                        <button type="button" class="btn btn-default">Submit</button>
                     
                     </div>
                    
                    
                    

                </div>
            </div>


<?php include('includes/footer.php'); ?>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/fontawesome/js/fontawesome.js"></script>

</body>
</html>