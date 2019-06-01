<?php

function conn_db($db_name) {
	$host = '127.0.0.1';
	$user = 'root';
	$password = '';

	$connection = mysqli_connect($host, $user, $password, 'coursework');

	return $connection;
}


function get_goods($db_connection, $id=FALSE) {
	$sql_query = "SELECT t.TO_ID, t.TO_DESCRIPTION, co.CO_NAME, ci.CI_NAME, t.TO_START, t.TO_END, t.TO_PRICE, t.TO_PLACES, ve.VE_NAME FROM tours t INNER JOIN countries co ON t.TO_COUNTRY = co.CO_ID INNER JOIN cities ci ON t.TO_CITY = ci.CI_ID JOIN vehicles ve ON t.TO_VEHICLE = ve.VE_ID WHERE TO_PLACES > 0 AND TO_START > CURRENT_DATE() ORDER BY TO_START";

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

function insert($table, $data) {
	$connection = conn_db('coursework') or die("Conn error.");

	$query = 'SELECT * FROM ' . $table;

	$to_count_columns = mysqli_query($connection, $query) or die("Columns error.");
	$columns_num = mysqli_num_fields($to_count_columns)-1;

	if($columns_num != count($data)) {
		die("Not equal colomns number and data.");
	}

	// $query = 'INSERT INTO clients VALUES (NULL, ';

	// for($i = 0; $i < $columns_num; $i++) {
	// 	$var = $data[$i]; 
	// 	if(is_integer($var)) {
	// 		$query = $query . $var;
	// 		if ($i != $columns_num-1) {
	// 			$query = $query . ", ";
	// 		}
	// 	} else if(is_string($var)){
	// 		$query = $query . '"' . $var . '"';

	// 		if ($i != $columns_num-1) {
	// 			$query = $query . ", ";
	// 		}
	// 	}
	// 	else {
	// 		die ("Unknown type.");
	// 	}
	// }
	$formar_str = "INSERT INTO " . $table . " VALUES (NULL, ";


	for ($i=0; $i < $columns_num; $i++) { 
		$formar_str = $formar_str."?";
		if($i != $columns_num-1) {
			$formar_str = $formar_str . ", ";
		}
	}

	$formar_str = $formar_str .")";

	$types = '';

	for ($i=0; $i < $columns_num; $i++) { 
		$var = $data[$i];
		if(is_string($var)) {
			$types = $types . 's';
		} else if(is_integer($var)) {
			$types = $types . 'i';
		} else {
			die ("Unknown type.");
		}
	}

	$stmt = mysqli_prepare($connection, $formar_str);

	mysqli_stmt_bind_param($stmt, $types, ...$data);

	mysqli_stmt_execute($stmt);

	mysqli_close($connection);
}


function update($table, $set, $conditions) {
	$connection = conn_db('coursework');

	$query = "UPDATE " . $table . " SET " . $set . " WHERE " . $conditions;
	mysqli_query($connection, $query);

	mysqli_close($connection);
}
	
?>