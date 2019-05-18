<?php

function conn_db($db_name) {
	$host = '127.0.0.1';
	$user = 'root';
	$password = '';

	$connection = mysqli_connect($host, $user, $password, $db_name);

	return $connection;
}


function get_goods($db_connection, $id=FALSE) {
	$sql_query = "SELECT t.TO_ID, t.TO_DESCRIPTION, co.CO_NAME, ci.CI_NAME, t.TO_START, t.TO_END, t.TO_PRICE, t.TO_PLACES, ve.VE_NAME FROM tours t INNER JOIN countries co ON t.TO_COUNTRY = co.CO_ID INNER JOIN cities ci ON t.TO_CITY = ci.CI_ID JOIN vehicles ve ON t.TO_VEHICLE = ve.VE_ID WHERE TO_PLACES > 0 ORDER BY TO_START";

	$res = mysqli_query($db_connection, $sql_query);

	for($i = 0; $i < mysqli_num_rows($res); $i++) {
		$goods[] = mysqli_fetch_array($res); 
	}

	mysqli_free_result($res);
	return $goods;
}

function get_res_array($connection, $query) {
	$query_result = mysqli_query($connection, $query);

	for ($i=0; $i < mysqli_num_rows($query_result); $i++) { 
		$result_array[] = mysqli_fetch_array($query_result); 
	}

	mysqli_free_result($query_result);
	return $result_array;
}
	
?>