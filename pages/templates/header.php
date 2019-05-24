<?php session_start(); ?>
<header>
	<div class="header_content">

		<nav class="links">
			<ul>
				<li>
					<a href="../../index.php">Главная</a>
				</li>
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
		<?php 
			if(isset($_SESSION['login'])) {
				echo '<a href="../../logic/log_out.php">' . $_SESSION['login'] . '</a>';
			} else {
				echo '<a href="login.php">Вход</a>';
			}
		?>

	</div>
</header>