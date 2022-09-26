<?php
$dbconnnect = mysqli_connect("localhost","root","","arkimorma_db");
if ($dbconnnect->connect_error) {
    die("Connection failed: " . $dbconnnect->connect_error);
}



?>