<?php  
	require_once 'my_functions.php';

	function get_db_table_by_id($id) {
		if($id == 1) {
			return 'clients';
		} else if ($id == 2) {
			return 'tours';
		} else if ($id == 3) {
			return 'cities';
		} else if ($id == 4) {
			return 'countries';
		} else if ($id == 5) {
			return 'vehicles';
		} else {
			return "admin_functions id error.";
		}
	}

	function get_table($id) { 

		$table = get_db_table_by_id($id);

		// $host = '127.0.0.1';
		// $user = 'root';
		// $password = '';

		$connection = conn_db('coursework');

		$columns = mysqli_query($connection, "SHOW COLUMNS FROM " . $table);
		$column_num = mysqli_num_rows($columns);

		echo "<table>";
		echo "<thead><tr>";
		echo '<th><input type="checkbox" name="" id="all" class="all_selector"></th>';
		for ($i=0; $i < $column_num; $i++) { 
			$row = mysqli_fetch_row($columns);

			$list = explode('_', $row[0]);
			$N = count($list);
			// preg_match('^[A-Z]+/', $row[0], )
			// $header_name = $row[0];

			$get_last = function($item) {
				//Для тура
				if($item == "NAME") {
					return "ИМЯ";
				} else if ($item == 'ID') {
					return "НОМЕР";
				} else if($item == 'DESCRIPTION') {
					return "ОПИСАНИЕ";
				} else if($item == 'COUNTRY') {
					return "СТРАНА";
				} else if($item == 'CITY') {
					return "ГОРОД";
				} else if($item == 'START') {
					return "НАЧАЛО";
				} else if($item == 'END') {
					return "КОНЕЦ";
				} else if ($item == 'PRICE') {
					return "ЦЕНА";
				} else if ($item == 'PLACES') {
					return "СВОБОДНЫХ МЕСТ";
				} else if ($item == 'VEHICLE') {
					return "ТРАНСПОРТ";
				}
				// Для клиентов
				else if($item == 'FIO') {
					return "ФИО";
				} else if ($item == 'TOUR') {
					return "ТУР";
				} else if ($item == 'SERIA'){
					return "СЕРИЯ ПАСПОРТА";
				} else if($item == 'NUMBER') {
					return "НОМЕР ПАСПОРТА";
				} else if($item == 'VALIDITY') {
					return "СРОК ДЕЙСТВИЯ ПАСПОРТА";
				}
				else {
					return $item;
				}
			};

			if ($list[0] == "TO") {
				$header_name = $get_last($list[$N-1])." ТУРА";
			} else if($list[0] == "CL") {
				$header_name = $get_last($list[$N-1]) . " КЛИЕНТА";
			} else if($list[0] == "CI") {
				$header_name = $get_last($list[$N-1]) . " ГОРОДА";
			} else if($list[0] == "CO") {
				$header_name = $get_last($list[$N-1]) . " СТРАНЫ";
			} else if($list[0] == "VE") {
				$header_name = $get_last($list[$N-1]) . " ТРАНСПОРТА";
			} else {
				$header_name = $row[0];
			}

			echo "<th>" . $header_name . "</th>";
		}
		echo "</tr></thead>";

		$res = mysqli_query($connection, "SELECT * FROM " . $table);

		for ($i=0; $i < mysqli_num_rows($res); $i++) { 
			$row = mysqli_fetch_row($res);

			echo '<tbody><tr id="row_id_'.$row[0].'">';
			echo '<td><input class="body_checkbox" type="checkbox" name="" id="checkbox-'.$row[0].'"></td>';
			for ($j=0; $j < $column_num; $j++) { 
				echo '<td>';
				if($j == 0) {
					echo '<p>'.$row[$j].'</p>';
				} else {
					echo '<input type="text" name="" class = "" id="" value="'. $row[$j] . '">';
				}
				echo '</td>';
			}
			echo "</tr></tbody>";
		}
		echo "</table>";
	}

?>