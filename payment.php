<?php  
	session_start();
?>

<html>

<?php 
	$name = "Оплата";
	require_once 'pages/templates/head.php'; 
?>

	<link href="styles/payment.css" rel="stylesheet" >


<body>

	<?php  require_once 'pages/templates/header.php'; ?>

	<div class="content_wrapper">
		<div class="content">

			<form method="POST" action="logic/playment_handler.php" id="pay_from">
				<h2>Оплата тура</h2>

				<label for="FIO">ФИО на латинице: </label>
				<input type="text" name="FIO" id="FIO" required pattern="[A-Z]{1}[a-z]+ [A-Z]{1}[a-z]+ [A-Z]{1}[a-z]+">

				<label for="passport_seria">Серия паспорта: </label>
				<input type="text" name="passport_seria" id="passport_seria">

				<label for="passport_number">Номер паспорта: </label> 
				<input type="text" name="passport_number" id="passport_number" required pattern="[0-9]{9}">

				<label for="buy_places">Кол-во билетов: </label>
				<input type="number" name="buy_places" id="buy_places" value="1" max= <?php echo '"' . $_SESSION['card_places'] . '"' ?>>

				<label for="validity">Срок действия паспорта: </label>
				<input type="date" name="validity" id="validity" required>

				<input type="submit" value="Оплатить">
			</form>

		</div>
	</div>

	<script src=""></script>

	<?php require_once 'pages/templates/footer.php'; ?>
	
</body>
</html>