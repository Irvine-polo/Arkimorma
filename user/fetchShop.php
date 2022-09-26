


<?php
//fetch.php
require_once'dbcon.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($dbconnnect, $_POST["query"]);
 $query = "
  SELECT * FROM sellers
  WHERE shop_name LIKE '%".$search."%'
 ";
}
else
{

 $query = "
  SELECT * FROM sellers  ORDER BY shop_id LIMIT 5
 ";
}
$result = mysqli_query($dbconnnect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Image</th>
     <th>Shop</th>
     <th>Address</th>

  
     
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   
  $output .= '
   <tr>

    <td><img src="../assets/SellerAccountImages/'.$row['image'].'"></td>
    <td><a href="UserSellerShop.php?shop='.$row["shop_id"].'">'.$row["shop_name"].'</a></td>
    <td>'.$row["city"].' '.$row["province"].' </td>

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