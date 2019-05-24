<?php 
	session_start();
	include '../../scripts/my_functions.php';

	$id = $_GET['card_id'];
	$_SESSION['card_id'] = $id;

	$connection = conn_db('coursework');
	$query = "SELECT * FROM tours t INNER JOIN countries co ON t.TO_COUNTRY = co.CO_ID INNER JOIN cities ci ON t.TO_CITY = ci.CI_ID INNER JOIN vehicles ve ON t.TO_VEHICLE = ve.VE_ID WHERE t.TO_ID = " . $id;

	$query_res = get_res_array($connection, $query);

	foreach ($query_res as $key) {
		printf(		
			'<div class="top_box">
				<div class="info">
					<p>Название: %s</p>
					<p>Страна: %s</p>
					<p>Город: %s</p>
					<p>Цена: %s ₴</p>
					<p>Транспорт: %s</p>
					<p>Количество: %s</p>
					<p>Дата начала: %s</p>
					<p>Дата конца: %s</p>
				</div>
				<div class="img">
					<img src="../../img/def_img.png">
				</div>
			</div>
			<div class="lower_box">
				<div class="description">
					Описание: <br>
					%s
				</div>
			</div>
			<div class="buy_block">
				<a href="payment.php">Купить</a>
			</div>',
		$key['TO_NAME'], $key["CO_NAME"], $key["CI_NAME"], $key["TO_PRICE"], $key["VE_NAME"], $key["TO_PLACES"], date("d.m.Y", strtotime($key["TO_START"])), date("d.m.Y", strtotime($key["TO_END"])), $key["TO_DESCRIPTION"]);

		$_SESSION['card_places'] = $key['TO_PLACES'];
	}
?>
