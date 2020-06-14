<?php
	session_start();
	$_SESSION['corpas'] = 0;

	$_SESSION['db_user'] = "root";
	$_SESSION['db_pass'] = "usbw";
	$_SESSION['db_name'] = "first";


	if(isset($_POST["login"])){
		$link = mysqli_connect("localhost", $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);

		$sql = "SELECT * FROM `test` WHERE `login` = '" . $_POST["login"] . "'";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);

		if ($result['login'] == $_POST["login"] and $result['password'] == $_POST["pass"]) {
			$_SESSION['id'] = $result['id'];
			?><script type="text/javascript">
			window.location.href = 'profile.php'
			</script>
			<?php
		}
		else {
			$_SESSION['corpas'] = 1;
		}
		mysqli_close($link);
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel = "script/javascript" src = "js/code.js">
		<script type="text/javascript" src = "js/code.js"></script>
		<link rel = "stylesheet" href = "css/index.css">
		<meta name= "viewport" content="width=device-width">
		<meta charset="utf-8">
	</head>

	<body>
		<div >
			<form action="index.php" method="POST" class="row">
				<div>
					<input class= "inp" placeholder= "логин" name="login">
				</div>
				<div>
					<input class= "inp" placeholder="пароль" name="pass" type="password" autocomplete="current-password">
				</div>
				<div>
					<input type="submit" class="bttn" value="войти">
				</div>
				<div>
					<?php
						if ($_SESSION['corpas'] == 1) {
							echo '<p class= "infapasst">Вы ввели неправельный логин или пароль</p>';
						}
					?>
				</div>
				<div>
					<a href="vostanov.html">забыли пароль?</a>
				</div>
				<div>
					<a href="reg.php">хотите зарегестрироваться?</a>
				</div>
			</form>
		</div>
<!-- 
		<footer>
			
		</footer> -->
	</body>
</html>