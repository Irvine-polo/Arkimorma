<?php 
require_once'dbcon.php';
$item = $_GET['delete_card'];

$del = $dbconnnect->query("DELETE FROM cart WHERE cart_id = '$item'");

 header('location:UserAddToCart.php');


 ?>