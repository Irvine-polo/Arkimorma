<?php 
require_once'dbcon.php';


$id = $_GET['delete'];
 $del_pic = $dbconnnect->query("DELETE FROM product_images WHERE product_id ='$id'");
 $del = $dbconnnect->query("DELETE FROM product WHERE product_id ='$id'");

 header('location:SellerMyStore.php');
	
 ?>