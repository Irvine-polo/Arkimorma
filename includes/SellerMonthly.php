<?php 
require_once '../Seller/dbcon.php';

//current time

$today = date('m');

$today_year = date('Y');
	$selid = $_SESSION['id'];
	$selshopname = $_SESSION['shopname'];



if ($today == '1') {
	$month = 12;
	$m = "December";

//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}
else if($today == '2'){
	$month = 1;
	$m = "January";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
}
else if($today == '3'){
	$month = 2;
	$m = "February";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}
else if($today == '4'){
	$month = 3;
	$m = "March";

//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}
else if($today == '5'){
	$month = 4;
	$m = "April";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
}
else if($today == '6'){
	$month = 5;
	$m = "May";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
	
}
else if($today == '7'){
	$month = 6;
	$m = "June";

//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
	
}
else if($today == '8'){
	$month = 7;
	$m = "July";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}
else if($today == '9'){
	$month = 8;
	$m = "August";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}
else if($today == '10'){
	$month = 9;
	$m = "September";

//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
	
}
else if($today == '11'){
	$month = 10;
	$m = "October";

//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}
	
}
else if($today == '12'){
	$month = 11;
	$m = "November";

	//check to monthly stats
	$sql_check = $dbconnnect->query("SELECT * FROM seller_income_stat WHERE shop_id = '$selid' AND month = '$month'");
	$num_row = mysqli_num_rows($sql_check);
	if ($num_row>0) {
		$error= "Already Recorded";
	}
	else if ($num_row == 0) {
		$error="No Recorded";
	
	$sql = $dbconnnect->query("SELECT seller_id,earn,order_complete,YEAR(order_complete) AS year FROM order_table WHERE MONTH(order_complete) = '$month' AND seller_id = '$selid'");

	if ($sql->num_rows ==0) {
		$error= "No record";	
	}
	else{
	$Net_income = 0;
	while ($row = mysqli_fetch_assoc($sql)) {
		$shop_id = $row['seller_id'];
		$earn = $row['earn'];
		$year = $row['year'];
		$Net_income = $Net_income + $earn;
		
	}

	$year = $year;
	$Net_income = $Net_income;
	$insert = $dbconnnect->query("INSERT INTO seller_income_stat(shop_id,net_income,month,m,year)VALUES('$selid','$Net_income','$month','$m','$year')");

	
	}
}

}



 ?>