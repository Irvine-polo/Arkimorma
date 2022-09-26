<?php 


//current time
$today = date('m');
$today_year = date('Y');


if ($today == '1') {
	$month = 12;
	$m = "December";
	$today_year = date('Y')-1;
	
//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($check->num_rows > 0) {
		//$message = "Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}

}
else if($today == '2'){
	$month = 1;
	$m = "January";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '3'){
	$month = 2;
	$m = "February";
//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '4'){
	$month = 3;
	$m = "March";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '5'){
	$month = 4;
	$m = "April";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '6'){
	$month = 5;
	$m = "May";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '7'){
	$month = 6;
	$m = "June";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '8'){
	$month = 7;
	$m = "July";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '9'){
	$month = 8;
	$m = "August";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '10'){
	$month = 9;
	$m = "September";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '11'){
	$month = 10;
	$m = "October";
	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}
else if($today == '12'){
	$month = 11;
	$m = "November";

	//check
	$check = $dbconnnect->query("SELECT * FROM monthly_payment WHERE month = '$month' AND year = '$today_year'");
	$num_row = mysqli_num_rows($check);
	if ($num_row > 0) {
		//echo"Already Recorded";
	}
	else{
		//end

		$sql_check = $dbconnnect->query("SELECT *,YEAR(order_date_completed) AS year FROM payment WHERE MONTH(order_date_completed) = '$month' ORDER BY `payment`.`order_date_completed` DESC");
		$Net_income = 0;
		while ($row = mysqli_fetch_assoc($sql_check)) {
			$year = $row['year'];
			$price = $row['fee'];
			$Net_income = $Net_income + $price;


		}
		
		$Year = $year;
		$Net_income = $Net_income;
		$insert = $dbconnnect->query("INSERT INTO monthly_payment(net_income,month,m,year)VALUES('$Net_income','$month','$m','$Year')");
	}
}



 ?>