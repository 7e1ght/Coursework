<?php session_start(); ?>
<html>

	<?php 
		$name = "Вход"; 
		require_once '../pages/templates/head.php';

	?>

	<link rel="stylesheet" href="../styles/login.css">

<body>

	<?php require_once '../pages/templates/header.php' ?>;


	<div class="content_wrapper">
		<div class="content">
			<form action="../logic/log_in.php" method="POST">
				<h2>Авторизация</h2>	
				<input type="text" name="login" id="login" placeholder="Логин">
				<input type="password" name="pass" id="pass" placeholder="Пароль">
				<input type="submit" name="submit" value="ВХОД">
			</form>
		</div>
	</div>

	<?php require_once '../pages/templates/footer.php'; ?> 

</body>
</html>