<?php 
	session_start();
	require_once '../scripts/my_functions.php';	

	$connection = conn_db('coursework');
	$card_id = $_SESSION['card_id'];

	$query = "SELECT TO_PLACES FROM tours WHERE TO_ID = " . $card_id;
	$res = get_res_array($connection, $query);

	foreach ($res as $key) {
		$places = $key['TO_PLACES'];
	}

	$left_places = $places - $_POST['buy_places'];

	insert("clients", 
		array(
			$_POST['FIO'],
			(int)$_SESSION['card_id'],
			$_POST['passport_seria'],
			$_POST['passport_number'],
			$_POST['validity']
		)
	);

	update('tours', 'TO_PLACES = ' . $left_places, 'TO_ID = ' . $card_id);

	header("refresh: 1; url=../index.php");
	echo "Thanks";

	mysqli_close($connection);
?>