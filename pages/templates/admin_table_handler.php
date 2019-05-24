<?php 
	/*
		action id 
		1 - insert 
		2 - delete
	*/
	require_once '../../scripts/admin_functions.php';
	require_once '../../scripts/my_functions.php';

	// echo $_GET['tab_id'][0];
	$action_id = $_GET['action_id'];
	$tab_id = $_GET['tab_id'][0];

	if (isset($action_id)) {
		$connection = conn_db(1);
		$cur_db_table = get_db_table_by_id($tab_id);

		$save = function() {
			$data = $_GET["data"];

			echo var_dump(cur_db_table);

			$res = mysqli_query($connection, "SHOW COLUMNS FROM " . $cur_db_table);

			for ($i=0; $i < mysqli_num_rows($res); $i++) { 
				$columns[] = mysqli_fetch_array($res);
			}

			$error = false;

			foreach ($data as $key) {
				$id = $key[0];
				$id_column = $columns[0][0];
				for ($i=1; $i < count($data[0]); $i++) {

					if($key[$i] == null) {
						$set_data = "null";
					} else {
						$set_data = '"' . $key[$i] .'"';
					}

					$query = "UPDATE " . $cur_db_table . " SET " . $columns[$i][0] . "=" . $set_data . " WHERE " .$id_column. " = " . $id;
					// echo $query . "<br>"; 
					if(mysqli_query($connection, $query)) {
						// echo '<script> alert("Успешно сохранено."); </script>';

					} else {
						echo '<script> alert("Ошибка сохранения '.$columns[$i][0].'."); </script>';
						$error = true;
					}

				}
			}

			if (!$error) {
				echo '<script> alert("Успешно сохранено."); </script>';
			}
		};

		if($action_id == 1) {
			$save();
			$query = "INSERT INTO " . $cur_db_table . " VALUES()";
			mysqli_query($connection, $query);
		} else if($action_id == 2) {
			$checkbox_id = $_GET['data'];	

			$two_letters = substr($cur_db_table, 0, 2);

			if($checkbox_id == NULL) {
				printf('
					<script> alert("Не выбраны строки."); </script>
					');
			} else {
				foreach ($checkbox_id as $key) {
					$res = mysqli_query($connection, "DELETE FROM " . $cur_db_table . " WHERE " . $two_letters . "_id = ". $key[0]);
					if(!$res) {
						print('
							<script> alert("Ошибка при удалении строки с id ' .$key[0]. '."); </script>
						');
					}
				}
			}
		} else if($action_id == 3) {
			$save();
		}
	}

	get_table($tab_id);
?>