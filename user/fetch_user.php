<style type="text/css">
	#chatpic img{
		height: 10vh;
		width: auto;
	}
</style>
<?php 

require_once'dbcon.php';
include('chatdb.php');
session_start();

















if(isset($_POST["query"]))
{

$search = mysqli_real_escape_string($dbconnnect, $_POST["query"]);
$query = "SELECT * FROM sellers WHERE
username LIKE '%".$search."%'
";
}else{
	$query = "SELECT * FROM sellers";
}


$statement = $connect->prepare($query);

$statement->execute();


$result = $statement->fetchALL();

$output = '
<table class="table table-bordered table-striped">
	<tr>
		<th></th>
		<th width="70%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$id = $row['shop_id'];
	$name = $row['username'];
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 5 minute');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['shop_id'], $connect);
	if ($user_last_activity > $current_timestamp) {
		$status = '<span class="label label-success">Online</span>';
	}
	else{
		$status = '<span class="label label-danger">Offline</span>';
	}
	$output .= '
	<tr>
		<td id="chatpic"><img src="../assets/SellerAccountImages/'.$row["image"].'"</td>
		<td><a href="UserSellerShop.php?shop='.$row['shop_id'].'">'.$row['username'].''.count_unseen_message($row['shop_id'], $_SESSION['user-id'], $connect).'</a></td>
		<td>'.$status.'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$id.'" data-tousername="'.$name.'">Open Chat</button></td>
	</tr>
	';
}
$output .= '</table>';

echo $output;

 ?>
