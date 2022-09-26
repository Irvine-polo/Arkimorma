<?php
//fetch.php
require_once'dbcon.php';
session_start();
$shop = $_SESSION['shopid'];

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbconnnect, $_POST["query"]);
 $query = "
  SELECT * FROM product
  WHERE shop_id = '$shop' AND product_name LIKE '%".$search."%'

 ";
}
else
{

 $query = "
  SELECT * FROM product WHERE shop_id = '$shop' ORDER BY product_id
 ";
}
$result = mysqli_query($dbconnnect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th></th>
     <th>Product</th>
     <th>Category</th>
     <th>Ages</th>
     <th>Texture</th>
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
    $product_id = $row['product_id'];
    $com = $dbconnnect->query("SELECT product_image FROM product_images WHERE product_id = '$product_id'");
    $Img = $com->fetch_assoc();
    $shop_id = $row['shop_id'];
  $output .= '
   <tr>

    <td><img src="../assets/Multiple_product_image/'.$Img['product_image'].'" style="height:100px;"></td>
    <td><a href="UserProductProfile.php?item='.$product_id.'&shop_id='.$shop_id.'">'.$row["product_name"].'</a></td>
    <td>'.$row["product_category"].'</td>
    <td>'.$row["product_age"].'</td>
    <td>'.$row["product_material"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>