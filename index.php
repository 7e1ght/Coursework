<?php 
session_start(); 
?>



<!-- http://via.placeholder.com/150/0000ff  -->
<html>

	<?php 
		$name = "Камчатка";
		require_once 'pages/templates/head.php'; 
	?>
	
<head>
<!-- 	<title>Камчатка</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">  -->
	<script src="scripts/script.js"></script>

</head>

<body onresize="resize()">
	<?php require_once 'pages/templates/header.php'; ?>
<!-- 	<header>
		<div class="header_content">

			<nav class="links">
				<ul>
					<li>
						<a href="#">О нас</a>
					</li>
					<li>
						<a href="#">Клиентам</a>
					</li>
					<li>
						<a href="#">Полезная информация</a>
					</li>
				</ul>
			</nav>

			<a href="#">login</a>

		</div>
	</header> -->

	<!-- <img src="img/logo.jpg" alt="" class="backHead"> -->
	
	<div class="flying_text">
		<p>ПУТЕШЕВСТВУЙ ВМЕСТЕ С НАМИ</p>
		<p>В ДВА КЛИКА!</p>
	</div>
	
	<?php 
		if(isset($_SESSION['login'])) {
			require_once 'pages/templates/authContent.php';
		} else {
			require_once 'pages/templates/noAuthContent.php';
			require_once 'pages/templates/zoom_card.php';
		}
	?>

	<?php require 'pages/templates/footer.php'; ?>
<!-- 	<footer id="footer">
		<div class="footer_content">
			Vlad
		</div>
	</footer> -->

<!-- 	<script>
		var elem = getElementById("footer");

		elem.style.top = document.body.clientHeight - elem.style.clientHeight+'px';
	</script> -->

</body>
</html>