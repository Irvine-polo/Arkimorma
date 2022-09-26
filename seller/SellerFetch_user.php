<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
	#userpic img{
		height: 10vh;
		width: auto;
	}
</style>
<?php 


require_once'dbcon.php';
include('dbchatsel.php');
session_start();
//fetching users
$id = $_SESSION['id'];
$query = "SELECT * FROM user_con WHERE shop_id = '$id'";


$statement = $connect->prepare($query);

$statement->execute();


$result = $statement->fetchALL();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th></th>
		<th width="70%">Name</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$id = $row['user_id'];
	$user_sql = $dbconnnect->query("SELECT userimage FROM user WHERE user_id = '$id'");
	$image = $user_sql->fetch_assoc();
	$name = $row['username'];
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 5 minute');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if ($user_last_activity > $current_timestamp) {
		$status = '<span class="label label-success">Online</span>';
	}
	else{
		$status = '<span class="label label-danger">Offline</span>';
	}

	$output .= '
	<tr>
		<td id="userpic"><img src="../assets/userImage/'.$image["userimage"].'"></td>
		<td>'.$row['username'].''.count_unseen_message($row['user_id'], $_SESSION['id'], $connect).'</td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$id.'" data-tousername="'.$name.'">Open Chat</button> <a style="margin-top:10px;" href="SellerChatIndex.php?delcust='.$id.'" class="btn btn-warning">Delete</a></td>
	</tr>
	';
}
$output .= '</table>';

echo $output;

 ?>