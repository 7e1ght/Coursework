<?php 
	session_start();
	require '../pages/templates/connection.php';

	$link = mysqli_connect($host, $user, $password, $database) 
	or die("Connection error");

	if(isset($_POST['login']) and isset($_POST['pass'])) {
		$username = $_POST['login'];
		$password = $_POST['pass'];

		$query = "SELECT * FROM admins WHERE A_LOGIN='". $username . "' AND A_PASSWORD='". $password ."'";
		// $query = "SELECT * FROM admins WHERE A_LOGIN=$username AND A_PASSWORD=$password";

		$result = mysqli_query($link, $query);

		$count = mysqli_num_rows($result);

		if($count == 1) {
			$_SESSION['login'] = $username;
			header('Location: ../index.php');
		} else {
			//echo "<script>document.getElementById('incorrect_data').className += ' show'</script>";
		} 	
	}
?>