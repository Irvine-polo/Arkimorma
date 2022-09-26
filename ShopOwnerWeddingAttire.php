<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ShopDress</title>

    <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

    <div class="main-container">

        <?php include('includes/navigation.php'); ?>
        <br> <br> <br>
        <div class="container shop-profile">
            <div class="row">
                <div class="seller_pic col-xs-6">
                <img src="assets/images/OurTeam1.jpg" alt="" >
                </div>

                <div class="information col-xs-6" >
                
                    <h3>Information</h3>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group row">
                                <div class="col-xs-3 text-right">
                                    <label for="">Shop ID:</label>
                                </div>
                                <div class="col-xs-9">
                                    <input  type="int" name="shop_id" class="form-control" value=" "  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                        <div class="form-group row">
                                <div class="col-xs-3 text-right">
                                    <label for="">Shop:</label>
                                </div>
                                <div class="col-xs-9">
                                    <input  type="text" name="shop" class="form-control" value=" "  disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group row">
                                <div class="col-xs-3 text-right">
                                    <label for="">Phone:</label>
                                </div>
                                <div class="col-xs-9">
                                    <input  type="text" name="phone" class="form-control" value="" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group row">
                                <div class="col-xs-3 text-right">
                                    <label for="">Username:</label>
                                </div>
                                <div class="col-xs-9">
                                    <input  type="text" name="username" class="form-control" >
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <form method="POST" action="SellerHomepage.php" >
                                <div class="form-group row">
                                    <div class="col-xs-3 text-right">
                                        <label for="">Email:</label>
                                    </div>
                                    <div class="col-xs-9">
                                        <input id="e" type="text" name="email" class="form-control" value=""  disabled>
                                    </div>
                                </div>
                            </div>

                            <a href="#" class="text-right btn btn-primary">Chat</a>
                        

                        <div class="form-group row">
                            <div class="col-xs-12">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <hr>
	


		<br><br><br><br><br>

        <div class="container">
            <div class="row">

                <!-- CATEGOIES -->
                <div class="col-xs-3 shops-categories">
                    <div class="title">
                        <h2>Categories</h2>
                    </div>    
                    <div>
                        <ul>
                            <li><a href="#"><h4>Dress<h4></a></li>
                            <li><a href="#"><h4>Gowns<h4></a></li>
                            <li><a href="#"><h4>Formal Attire<h4></a></li>
                            <li><a href="#"><h4>Wedding Attire<h4></a></li>
                        </ul>
                    </div>
                </div>
                <!-- CATEGOIES -->


                <!-- SHOPS -->
                <div class="col-xs-9 shops-container">
                    <div class="shops-sort row">
                        <div class="col-xs-offset-8 col-xs-4">

                            <!-- SORT BY -->
                            <div class="row">
                                <div class="col-xs-5">
                                    <h5 class="text-right">Sort By:</h5>
                                </div>
                                <div class="col-xs-7">
                                    <div style="padding-top: 5px;">
                                        <select name="" id="" class="form-control">
                                            <option value="">Sort 1</option>
                                            <option value="">Sort 2</option>
                                            <option value="">Sort 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- SORT BY -->

                        <div class="row ">
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding1.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5 class="">SHOP NAME1</h5>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding2.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5>SHOP NAME2</h5>
                                    </div>
                                </div>
                            </a>
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding3.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5>SHOP NAME3</h5>
                                    </div>
                                </div>
                            </a>

                            
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding4.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5>SHOP NAME4</h5>
                                    </div>
                                </div>
                            </a>

                            
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding5.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5>SHOP NAME4</h5>
                                    </div>
                                </div>
                            </a>

                            
                            
                            <a href="#">
                                <div class="shops-item col-xs-4">
                                    <div class="image">
                                        <img src="assets/images/wedding6.jpg" alt="">
                                    </div>
                                    <div class="shop-name">
                                        <h5>SHOP NAME4</h5>
                                    </div>
                                </div>
                            </a>
                            

                        </div>
                    </div>

                    <div class="shop-pagination">
						<nav aria-label="Page navigation">
							<ul class="pagination pagination-lg">
								<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
								</li>
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <?php include('includes/footer.php'); ?>


        

    
    
    <script src="assets/js/jquery.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="assets/plugins/fontawesome/js/all.js"></script>

</body>
</html>