<?php 
include '../../scripts/my_functions.php';

$connection = conn_db('coursework');

if($_GET['sort_id']) {
	$type = strip_tags($_GET['sort_id']);

	$goods = get_goods($connection, $type);

	add_cards($goods);

	// $curr_time = strtotime(date("Y-m-d")); //strtotime Переводит дату в секунды
	// $one_day_in_sec = 86400;

	// foreach ($goods as $key) {	
	// 	$key_time = strtotime($key['TO_START']);
	// 	printf('<div class="cards">
	// 			<div class="upper_text">
	// 				<div class="top">
	// 					<p>%s</p>
	// 					<p>%s</p>', $key["TO_PRICE"], $key["VE_NAME"]);
	// 	if ( ($key_time - $curr_time)/$one_day_in_sec <= 2) {
	// 	 	printf('<p class="hot">Hot</p>');
	// 	}
	// 	printf(	'</div>
	// 			<div class="date">
	// 				<p>%s</p>
	// 				<p>%s</p>
	// 			</div>
	// 		</div>
	// 		<div class="lower_text">
	// 			<p>%s, %s</p>
	// 			<p>%s</p>
	// 		</div>
	// 	</div>', date("d.m.Y", strtotime($key["TO_START"])), date("d.m.Y", strtotime($key["TO_END"])),$key["CO_NAME"], $key["CI_NAME"], $key["TO_DESCRIPTION"]);
	// }
} else {
	$goods = get_goods($connection);
	add_cards($goods);
}


function add_cards($goods) {

	$curr_time = strtotime(date("Y-m-d")); //strtotime Переводит дату в секунды
	$one_day_in_sec = 86400;

	foreach ($goods as $key) {	
		$key_time = strtotime($key['TO_START']);
		printf('<div class="cards" id="card-%s">
				<div class="upper_text">
					<div class="top">
						<p>%s</p>
						<p>%s</p>', $key["TO_ID"], $key["TO_PRICE"], $key["VE_NAME"]);
		if ( ($key_time - $curr_time)/$one_day_in_sec <= 2) {
		 	printf('<p class="hot">Hot</p>');
		}
		printf(	'</div>
				<div class="date">
					<p>%s</p>
					<p>%s</p>
				</div>
			</div>
			<div class="lower_text">
				<p>%s, %s</p>
				<p>%s</p>
			</div>
		</div>', date("d.m.Y", strtotime($key["TO_START"])), date("d.m.Y", strtotime($key["TO_END"])),$key["CO_NAME"], $key["CI_NAME"], $key["TO_DESCRIPTION"]);
	}
}

?>