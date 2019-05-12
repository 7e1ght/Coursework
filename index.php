<html>
<head>
	<meta charset="UTF-8">
	<title>test</title>
</head>
<body>
	МДфв
	<?php
		require_once 'connection.php';

		$link = mysqli_connect($host, $user, $password, $database) 
			or die("Ошибка " . mysqli_error($link));

		$query = "SELECT t.T_NAME, c.C_NAME, ci.CI_NAME, cl.DATA_START, cl.DATA_END, v.V_NAME
					FROM CLIENTS cl
					INNER JOIN TOURS t ON cl.TOUR = t.T_ID 
					INNER JOIN COUNTRIES c ON cl.COUNTRY = c.C_ID
					INNER JOIN CITIES ci ON cl.COUNTRY = ci.ID
					INNER JOIN VEHICLES v ON cl.COUNTRY = v.V_ID";

		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	
		if($result) {
			$rows = mysqli_num_rows($result);

			echo "<table><tr> <th>1</th> <th>2</th> <th>3</th> <th>4</th> <th>5</th> <th>6</th> <th>7</th> <th>8</th> <th>9</th> <th>10</th> </tr>";

			for($i = 0; $i < $rows; $i++) {
				$row = mysqli_fetch_row($result);
		        echo "<tr>";
		            for ($j = 0 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
		        echo "</tr>";
			}
			echo "</table>";

			mysqli_free_result($result);
		}

		mysqli_close($link);
	?>

</body>
</html>