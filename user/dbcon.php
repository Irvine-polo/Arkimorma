

<?php
$dbconnnect = mysqli_connect("localhost","root","","arkimorma_db");
if ($dbconnnect->connect_error) {
    die("Connection failed: " . $dbconnnect->connect_error);
}

date_default_timezone_set('Asia/Manila');


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=arkimorma_db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>