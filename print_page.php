<?php  
	require_once 'scripts/my_functions.php';

	ob_start();

	function draw($q) {
		$connection = conn_db(1);

		$result = mysqli_query($connection, $q);

		if($result) {
			echo '<table cellpadding="10" border="1">';
			$headers = mysqli_fetch_fields($result);

			echo '<tr>';
			echo "<th>№</th>";

			foreach ($headers as $key) {
				echo "<th>" . $key->name . "</th>";
			}
			echo "</tr>";

			
			for($i = 0; $i < mysqli_num_rows($result); $i++) {
				echo "<tr>";
				$row = mysqli_fetch_row($result);
				echo "<td>".($i+1)."</td>";
				for($j = 0; $j < count($row); $j++) {
					echo "<td>" . $row[$j] . "</td>";
				}
				echo "</tr>";
				
			}

			echo "</table><br><br>";
			
		} else { 
			echo "bad";
		}

		mysqli_free_result($result);
		mysqli_close($connection);
	}

?>

<html>
<head>
	<meta charset="UTF-8">
	<title>Результат</title>
	<link href="styles/print.less" rel="stylesheet/less" type="text/css" /><script type="text/javascript" src="scripts/less.min.js"></script>
</head>
<body>
	<style>


		td, th { 
			border: 1px solid black;
		}

	</style>
	<?php 
		$connection = conn_db(1);

		if(isset($_POST['tour_income'])) {
			echo "<h2>Доход фирмы</h2>";

			$query = "SELECT TO_NAME AS 'Название тура', co_name AS 'Страна', ci_name AS 'Город', to_start AS 'Начало тура', CL_PLACES_BOUGHT * tours.TO_PRICE AS 'Доход' FROM clients INNER JOIN tours ON CL_TOUR = tours.TO_ID INNER JOIN countries ON TO_COUNTRY = countries.CO_ID INNER JOIN cities ON TO_CITY = cities.CI_ID";

			draw($query);

			$result = mysqli_query($connection, "SELECT SUM(t.TO_PRICE*c.CL_PLACES_BOUGHT) FROM clients c INNER JOIN tours t ON c.CL_TOUR=t.TO_ID ");

			$row = mysqli_fetch_row($result);

			echo "<h3>Общий доход: " . $row[0] . "</h3>";


			// echo "<tr><td></td><td>Общий доход: </td><td>" . $row[0] . "</td></tr>";
		} else if( isset($_POST['list_tour_clients']) ) {
			$result = mysqli_query($connection, 
				"SELECT t.TO_NAME, countries.CO_NAME, cities.CI_NAME, t.TO_START, t.TO_ID FROM clients c INNER JOIN tours t ON c.CL_TOUR = t.TO_ID INNER JOIN countries ON t.TO_COUNTRY = countries.CO_ID INNER JOIN cities ON t.TO_CITY = cities.CI_ID"
			);

			$q = "SELECT CL_FIO AS 'ФИО', CL_PASSPORT_SERIA AS 'Серия паспорта', CL_PASSPORT_NUMBER AS 'Номер паспорта', CL_PASSPORT_VALIDITY AS 'Срок действия' FROM clients";

			echo "<h3>Список клиентов тура</h3>";

			for($i = 0; $i < $result->num_rows; $i++) {
				$row = mysqli_fetch_row($result);

				printf(
					"<h4>%s %s %s %s</h4>",
					$row[0], $row[1], $row[2], $row[3]
				);


				draw($q . " WHERE CL_TOUR = ".$row[4]);
			}

			echo '<h3>Для всех туров</h3>';
			draw($q);
		} else if(isset($_POST['tour_duration'])) {
			echo "<h3>Продолжительность туров</h3>";
			$q = "SELECT TO_NAME AS 'Имя тура', DATEDIFF(TO_END, TO_START) AS 'Длительность тура(дней)' FROM tours";
			draw($q);

			$result = mysqli_query($connection, "SELECT AVG(DATEDIFF(TO_END, TO_START)) FROM tours");
			$row = mysqli_fetch_row($result);
			echo "<h4>Средняя продолжительность тура: " . $row[0] . " дней </h4>";
		} else if (isset($_POST['list_tour_month_year'])) {
			echo "<h3>Список туров за каждый год и месяц</h3>";
			$result = mysqli_query($connection, 
				"SELECT DISTINCT YEAR(TO_START) AS 'Год', MONTH(TO_START) AS 'Месяц' FROM tours"
			);


			foreach ($result as $key) {
				printf(
					"<h4>Год: %s<br>
					Месяц: %s</h4>",
					$key['Год'], $key['Месяц']
				);

				$q = "SELECT t.TO_NAME AS 'Имя тура', co.CO_NAME AS 'Страна', ci.CI_NAME AS 'Город' FROM tours t INNER JOIN countries co ON t.TO_COUNTRY = co.CO_ID INNER JOIN cities ci ON t.TO_CITY = ci.CI_ID WHERE YEAR(t.TO_START) = " .$key['Год']. " AND MONTH(t.TO_START) = " . $key['Месяц'];

				draw($q);
			}

			$result = mysqli_query($connection, "SELECT DISTINCT YEAR(TO_START) FROM tours");

			for($i = 0; $i < $result->num_rows; $i++) {
				$year_row = mysqli_fetch_row($result);

				$count = mysqli_query($connection, "SELECT COUNT(TO_ID) FROM tours WHERE YEAR(TO_START) = " . $year_row[0]);

				$count_row = mysqli_fetch_row($count);

				printf(
					"<h4>Количество туров за %s год: %s</h4>",
					$year_row[0], $count_row[0]
				);
			}
		}

// , t.TO_NAME AS 'Имя тура', countries.CO_NAME AS 'Страна', cities.CI_NAME AS 'Город', t.TO_START AS 'Дата начала' FROM clients c INNER JOIN tours t ON c.CL_TOUR = t.TO_ID INNER JOIN countries ON t.TO_COUNTRY = countries.CO_ID INNER JOIN cities ON t.TO_CITY = cities.CI_ID







		mysqli_close($connection);
	?>
</body>
</html>

<?php 
	$my_html = ob_get_clean();

	require_once 'tcpdf/tcpdf.php';

	$tcpdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

	$tcpdf->AddPage();
	$tcpdf->SetTextColor(0, 0, 0);
	$tcpdf->SetFont('dejavusans', '', 10, '', true);
	$tcpdf->writeHTMLcell(0, 0, '', '', $my_html, 0, 1, 0, true, '', true);
	$tcpdf->Output('report.pdf', 'I');
?>