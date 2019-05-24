<link rel="stylesheet" href="../../styles/catalog.css">
<script src="../../scripts/card_handler.js"></script>

<div class="content_wrapper">
	<div class="content"> 
		<?php 
			include_once 'scripts/my_functions.php';

			$connection = conn_db('coursework');

			// $query = 
			// "SELECT t.TO_DESCRIPTION, co.CO_NAME, ci.CI_NAME, t.TO_START, t.TO_END, t.TO_PRICE, t.TO_PLACES, ve.VE_NAME FROM tours t INNER JOIN countries co ON t.TO_COUNTRY = co.CO_ID INNER JOIN cities ci ON t.TO_CITY = ci.CI_ID JOIN vehicles ve ON t.TO_VEHICLE = ve.VE_ID ORDER BY TO_START";

			//$res = mysqli_query($connection, $query);

			$array = get_goods($connection);

			mysqli_close($connection);
		?>
		
		<!-- Задел на Сортировку
		<div class="sort_block">
			<input type="radio" name="sort_price" id="price_a">
			<label for="price_a">Цена по возрастанию</label>

			<input type="radio" name="sort_price" id="price_b">
			<label for="price_b">Цена по убыванию</label>
		</div>
 		-->
 		
		<div class="catalog">
			<?php 
			// $curr_time = strtotime(date("Y-m-d")); //strtotime Переводит дату в секунды
			// $one_day_in_sec = 86400;
			// foreach ($array as $key) {
			// 	$key_time = strtotime($key['TO_START']);
			// 	// echo 
			// 	// '<div class="cards">
			// 	// 	<div class="upper_text">
			// 	// 		<p>'.$key["TO_PRICE"].'</p>
			// 	// 		<p>'.$key["VE_NAME"].'</p>';

			// 	//  if ( ($key_time - $curr_time)/$one_day_in_sec <= 2) {
			// 	//  	echo '<p class="hot">Hot</p>';
			// 	//  }

			// 	//  echo
			// 	// 	'</div>
			// 	// 	<div class="lower_text">
			// 	// 		<p>'.$key["CO_NAME"]. ', ' . $key["CI_NAME"].'</p>
			// 	// 		<p class="ellipsis">'.$key["TO_DESCRIPTION"].'</p>
			// 	// 	</div>
			// 	// </div>';
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
			?>
		</div>
		
	</div>
</div>