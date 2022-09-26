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