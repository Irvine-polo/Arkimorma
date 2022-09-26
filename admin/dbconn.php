<?php $dbconnnect = mysqli_connect("localhost","root","","arkimorma_db");


$hostname="localhost";
$username="root";
$password="";
$db = "arkimorma_db"; 
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
 ?>