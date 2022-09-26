<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once'../user/dbcon.php'; 
if (!empty($cart = $_GET['cart_id'])) {
    $sql = $dbconnnect->query("DELETE FROM cart WHERE cart_id = '$cart'");
    if ($sql) {
        // code...
    
    echo'.';
    echo"<script>

    Swal.fire(
      'Order Successfully!',
      'Wait for the shop approval',
      'success'
)
    .then(function() {
        window.location = '../user/UserAddtoCart.php?=".$cart."';
    });
    </script>";
}
}
   
   
?>

<?php 
if (!empty($id = $_GET['delcust'])) {
    // code...

$delete = $dbconnnect->query("DELETE FROM user_con WHERE user_id = '$id'");
if ($delete) {
    $del_chat = $dbconnnect->query("DELETE FROM chat_message WHERE from_user_id = '$id'");


}

header("location:../seller/SellerChatIndex.php");
}
 ?>


 <?php 
 //request to cancel approve

 $_GET['req_cancel'] == "";
    if (!empty($id = $_GET['req_cancel'])) {
        $update = $dbconnnect->query("UPDATE order_table SET cancel_req = '1' WHERE order_id = '$id'");
        if ($update) {
            header("location:../user/UserArkimormaMyorder.php");
        }
    }
  ?>


  <?php 
  if (!empty($id = $_GET['refund'])) {
    $image = $_GET['image'];
    $update = $dbconnnect->query("UPDATE order_table SET refund_proof = '$image' , status = 'Cancelled' WHERE order_id = '$id'");
    if ($update) {
         header("location:../seller/SellerRent.php");
    }
   
  }
   ?>