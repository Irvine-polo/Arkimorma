
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arkimorma | My Product</title>

    <link rel="stylesheet" type="text/css" href="../assets/plugins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/fontawesome/css/fontawesome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/seller-style.css">
        <?php include('../includes/seller-navigation.php'); ?>
<?php 

require_once'dbcon.php';



$selid = $_SESSION['id'];

//Pop up Alert

function asDollars($value) {
      if ($value<0) return "-".asDollars(-$value);
      return '₱ ' . number_format($value);
    }

//delete process

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    echo".";

    ?>

    <script>
       Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {


     window.location="SellerDelete.php?delete=<?php echo$id; ?>";
  }
})
    </script>


    <?php
 

    }


    ?>

   



    <?php




//edit process
if (isset($_GET['save'])) {
    $pro_id = $_GET['product_id'];
    $cat = $_GET['category'];
    $Item_Name = $_GET['pro_name'];
    $Material = $_GET['material'];
    $Details = $_GET['details'];

    $Stocks = $_GET['stocks'];
    $Deposit = $_GET['deposit'];
    $Prices = $_GET['prices'];


    $metric = $_GET['metric'];

    $s_s = $_GET['S_shoulder'];
    $s_w = $_GET['S_waist'];
    $s_c = $_GET['S_chest'];

    $m_s = $_GET['M_shoulder'];
    $m_w = $_GET['M_waist'];
    $m_c = $_GET['M_chest'];

    $l_s = $_GET['L_shoulder'];
    $l_w = $_GET['L_waist'];
    $l_c = $_GET['L_chest'];

    $xl_s = $_GET['XL_shoulder'];
    $xl_w = $_GET['XL_waist'];
    $xl_c = $_GET['XL_chest'];

    $xxl_s = $_GET['XXL_shoulder'];
    $xxl_w = $_GET['XXL_waist'];
    $xxl_c = $_GET['XXL_chest'];


    $update_size = $dbconnnect->query("UPDATE product SET
        metric = '$metric'

        ,s_shoulder = '$s_s'
        ,s_waist = '$s_w'
        ,s_chest = '$s_c'

        ,m_shoulder = '$m_s'
        ,m_waist = '$m_w'
        ,m_chest = '$m_c'

        ,l_shoulder = '$l_s'
        ,l_waist = '$l_w'
        ,l_chest = '$l_c'

        ,xl_shoulder = '$xl_s'
        ,xl_waist = '$xl_w'
        ,xl_chest = '$xl_c'

         ,xxl_shoulder = '$xxl_s'
        ,xxl_waist = '$xxl_w'
        ,xxl_chest = '$xxl_c'

         WHERE product_id = '$pro_id'");


    $update = $dbconnnect->query("UPDATE product SET product_category = '$cat', product_name = '$Item_Name',product_material = '$Material', product_details = '$Details',stocks = '$Stocks',deposit = '$Deposit', product_prize='$Prices' WHERE product_id = '$pro_id'");
    if ($update) {
        echo'.';
        echo '<script type="text/javascript">Swal.fire("Updated Successfully!","","success")</script>';
    }
    else{
        echo"failed";
    }

}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	
    

</head>
<body>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <div class="container">
        <?php 
        // show product
        $call_product = $dbconnnect->query("SELECT * FROM product WHERE shop_id = '$selid'");
        ?>
        <table class="table table-hover">
            <thead>	
                <tr>
                    <th style="width: 200px;">Image</th>
                   
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Material</th>
                 
                    <th>Size Details</th>
                    <th>Stocks</th>
                    
                    <th>Item Price</th>
                    <th>Deposit</th>
                    <th>Date_posted</th>
                    <th>Action</th>
                </tr>
            </thead>


        <?php

        if(mysqli_num_rows($call_product )==0 ){
            echo '<tr><td colspan="4">Your Shop is Empty</td></tr>';
        }
        else{

            while ($row = $call_product->fetch_assoc()): 
                $pro_id = $row['product_id'];
            $call_img = $dbconnnect->query("SELECT product_image FROM product_images WHERE shop_id = '$selid' AND product_id = '$pro_id'");
            $img_row = $call_img->fetch_assoc();

            ?>
            <tr>
                <td>
                    <img src="../assets/Multiple_product_image/<?php echo $img_row['product_image']; ?>" width="100px"></td>
             
                <td><?php echo $row['product_category']; ?></td>
                <td><?php echo $row['product_name']; ?></td>



                        <?php $string = $row['product_details'];
                        if (strlen($string) > 30) {
                        $trimstring = substr($string, 0, 30). '...';
                        } else {
                        $trimstring = $string;
                        }
                        ?>



                <td><?php echo $trimstring; ?></td>
                <td><?php echo $row['product_material']; ?></td>
            
                <td><table style="width:100px; height: auto; margin-left:60px;">
        <thead>
            <tr>
                <th style="padding:10px;"></th>
                <th style="padding:5px;">shoulder</th>
                <th  style="padding:5px;">waist</th>
                <th  style="padding:5px;">chest</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding:5px;">small</td>
                <td><?php echo$row['s_shoulder'] ?></td>
                <td><?php echo$row['s_waist']  ?></td>
                <td><?php echo$row['s_chest']  ?></td>
            </tr>
            <tr>
                <td style="padding:5px;">medium</td>
                <td><?php echo$row['m_shoulder']?></td>
                <td><?php echo$row['m_waist'] ?></td>
                <td><?php echo$row['m_chest']  ?></td>
            </tr>
            <tr>
                <td style="padding:5px;">large</td>
                <td><?php echo$row['l_shoulder'] ?></td>
                <td><?php echo$row['l_waist']  ?></td>
                <td><?php echo$row['l_chest']  ?></td>
            </tr>
            <tr>
                <td style="padding:5px;">xlarge</td>
                <td><?php echo$row['xl_shoulder']  ?></td>
                <td><?php echo$row['xl_waist'] ?></td>
                <td><?php echo$row['xl_chest']  ?></td>
            </tr>
            <tr>
                <td style="padding:5px;">xxlarge</td>
                <td><?php echo$row['xxl_shoulder'] ?></td>
                <td><?php echo$row['xxl_waist'] ?></td>
                <td><?php echo$row['xxl_chest']  ?></td>
            </tr>
        </tbody>

    </table></td>
                <td><?php echo $row['stocks']; ?></td>
                <td><?php $deposit = $row['deposit']; $deposit = asDollars($deposit); echo$deposit; ?></td>
                <td><?php $price = $row['product_prize']; $price = asDollars($price);  echo$price;  ?></td>
                <td><?php $date = $row['product_date_posted']; echo date('M-d-Y', strtotime($date)); ?></td>

                <td>
                <a href="SellerMyStore.php?edit=<?php echo $row['product_id']; ?>" class="btn btn-xs btn-success"> Edit</a>
                <a href="SellerMyStore.php?delete=<?php echo $row['product_id']; ?>" class="btn btn-xs btn-danger">Delete</a>			
                </td>
            </tr>

            <!-- Pop up edit panel -->
            <div id="edit_pop" hidden >
                <form method="GET" action="SellerMyStore.php">
                <?php 
                    if (isset($_GET['edit'])) {
                        echo "<script>
                        function myFunction() {
                        document.getElementById('edit_pop').hidden = false;
                        }

                        myFunction();
                        </script>";
                        $id = $_GET['edit'];
                        }
                        //displaying select product
                        $display = $dbconnnect->query("SELECT * FROM product WHERE product_id = '$id'");
                        $pro = $display->fetch_assoc();
                ?>			
                        <div class="row">
                 
   
                                <div>
                                    <input type="hidden" name="product_id" value="<?php echo $id ?>" class="form-control" >
                                </div>
                     
                            <div class="col-xs-3">
                                <label for="">Category:</label>
                                <div>
                                    <input type="text" name="category" value="<?php echo$pro['product_category']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <label for="">Name:</label>
                                <div>
                                    <input type="text" name="pro_name" value="<?php echo$pro['product_name']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-3">
                                <label for="">Material:</label>
                                <div>
                                    <input type="text" name="material" value="<?php echo$pro['product_material']; ?>" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <label for="">Description:</label>
                                <div>
                                    <textarea name="details" rows="19" cols="60" class="form-control"><?php echo$pro['product_details']; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-6">
                                <label for="">Size Details:</label>
                                <div>
                                    <select name="metric" id="metric">
                                        <option selected>choose metric</option>
                                          <option  value="cm">cm</option>
                                          <option  value="inch">Inch</option>
                                        </select>
                                        <br><br>
                               
                                <div id="small" >
                                    <b>Small: </b>
                                        <br>
                                        <input value="<?php echo$pro['s_shoulder'] ?>" type="number" name="S_shoulder" placeholder="shoulder">
                                        <input value="<?php echo$pro['s_waist'] ?>" type="number" name="S_waist" placeholder="waist">
                                        <input value="<?php echo$pro['s_chest'] ?>" type="number" name="S_chest" placeholder="chest">
                                        <br>
                                </div>

                       
                                <div id="medium" >

                                    <b>Medium: </b>
                                        <br>
                                        <input value="<?php echo$pro['m_shoulder'] ?>" type="number" name="M_shoulder" placeholder="shoulder">
                                        <input value="<?php echo$pro['m_waist'] ?>" type="number" name="M_waist" placeholder="waist">
                                        <input value="<?php echo$pro['m_chest'] ?>" type="number" name="M_chest" placeholder="chest">
                                        <br>

                                </div>  

                            
                                <div id="large" >

                                    <b>Large: </b>
                                        <br>
                                        <input value="<?php echo$pro['l_shoulder'] ?>" type="number" name="L_shoulder" placeholder="shoulder">
                                        <input value="<?php echo$pro['l_waist'] ?>" type="number" name="L_waist" placeholder="waist">
                                        <input value="<?php echo$pro['l_chest'] ?>" type="number" name="L_chest" placeholder="chest">
                                        <br>

                                </div>  

                   
                                <div id="Xlarge" >

                                    <b>XLarge: </b>
                                        <br>
                                        <input value="<?php echo$pro['xl_shoulder'] ?>" type="number" name="XL_shoulder" placeholder="shoulder">
                                        <input value="<?php echo$pro['xl_waist'] ?>" type="number" name="XL_waist" placeholder="waist">
                                        <input value="<?php echo$pro['xl_chest'] ?>" type="number" name="XL_chest" placeholder="chest">
                                        <br>

                                </div>  

                              
                                <div id="XXlarge" >

                                    <b>XXLarge: </b>
                                        <br>
                                        <input value="<?php echo$pro['xxl_shoulder'] ?>" type="number" name="XXL_shoulder" placeholder="shoulder">
                                        <input value="<?php echo$pro['xxl_waist'] ?>" type="number" name="XXL_waist" placeholder="waist">
                                        <input value="<?php echo$pro['xxl_chest'] ?>" type="number" name="XXL_chest" placeholder="chest">
                                        <br>

                                </div>  
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4">
                                <label for="">Stocks:</label>
                                <div>
                                    <input type="text" name="stocks" value="<?php echo$pro['stocks']; ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <label for="">Deposit:</label>
                                <div>
                                    <input type="number" name="deposit" value="<?php echo$pro['deposit']; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-4">
                                <label for="">Prices:</label>
                                <div>
                                    <input type="number" name="prices" value="<?php echo$pro['product_prize']; ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-xs-4">
                                <label for=""> &nbsp;</label>
                                <div>
                                    <input type="submit" name="save" value="Save" class="btn btn-primary btn-sm"> 
                                    <button onclick="myCancel()" class="btn btn-default btn-sm">Cancel</button>
                                </div>
                            </div>
                        </div>

                        <br>

                </form>

                
            </div>

        <?php endwhile; ?>
        </table>
            <?php
        }

        ?>
    </div>
	 


<script src="../assets/js/jquery.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>
<script src="../assets/plugins/fontawesome/js/fontawesome.js"></script>

<script>

function myCancel() {
  document.getElementById("edit_pop").hidden = true;
}


	


</script>

 
</body>
</html>