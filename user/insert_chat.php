<?php 
require_once 'dbcon.php';
include('chatdb.php');

session_start();

$data = array(
 ':to_user_id'  => $_POST['to_user_id'],
 ':from_user_id'  => $_SESSION['user-id'],
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);


$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
   

    $s_id = $_POST['to_user_id'];
    $u_id = $_SESSION['user-id'];
    $name = $_SESSION['user-fullname'];
    $check = $dbconnnect->query("SELECT * FROM user_con WHERE shop_id = '$s_id' AND user_id = '$u_id'");
    if($check->num_rows ==0) {
        $sql = $dbconnnect->query("INSERT user_con(user_id,username,shop_id)VALUES('$u_id','$name','$s_id')");
    
    }
    else{
         echo fetch_user_chat_history($_SESSION['user-id'], $_POST['to_user_id'], $connect);
    }

   
    
}

 ?>