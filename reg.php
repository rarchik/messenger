<?php
	session_start();
	$_SESSION['chepas'] = 0;
	$_SESSION['chelog'] = 0;
	if(isset($_POST["login"]) and isset($_POST["pass"]) and isset($_POST["passc"]) ){
		$log_che = $_POST["login"];
		$pass_che = $_POST["pass"];
		$passc_che = $_POST["passc"];

		$link = mysqli_connect("localhost", $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);
		$sql = "SELECT * FROM `test` WHERE `login` = '" . $_POST["login"] . "'";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);
		if (count($result) > 0){
			$_SESSION['chelog'] = 1;
		}
		else{
			if ($pass_che == $passc_che) {
				$link = mysqli_connect("localhost", $_SESSION['db_user'], $_SESSION['db_pass'], $_SESSION['db_name']);

				$sql = "SELECT `id`FROM `test`";
				$result = mysqli_query($link, $sql);
				$result = mysqli_fetch_array($result);
				$id = count($result) + 1;

				$sql = "INSERT INTO `test`(`id`, `login`, `password`, `name`, `lastname`, `mail`) VALUES (".$id.",'".$log_che."','".$pass_che."','none','none','none')";
				$result = mysqli_query($link, $sql);
				$result = mysqli_fetch_array($result);
				?>
				<script type="text/javascript">
					window.location.href = 'index.php'
				</script>
				<?php
			}
			else{
				$_SESSION['chepas'] = 1;
			}
		}
		mysqli_close($link);
	}


?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel = "script/javascript" src = "js/code.js">
		<script type="text/javascript" src = "js/code.js"></script>
		<link rel = "stylesheet" href = "css/logn.css">
		<meta name= "viewport" content="width=device-width">
		<meta charset="utf-8">
	</head>

	<body>
		<header>
			
		</header>

		<div>
			<form action="reg.php" method="POST" class="row">
				<div>
					<input class= "inp" name="login" placeholder= "придумайте логин">
				</div>
				<div>
					<input class= "inp" name="pass" placeholder="придумайте пароль" type="password" autocomplete="new-password">
				</div>
				<div>
					<input class= "inp" name="passc" placeholder="подтвердите пароль" type="password" autocomplete="new-password">
				</div>
				<div>
					<?php
						if ($_SESSION['chepas'] == 1){
							echo '<p class= "err">Пароли не совподают</p>';
						}
						elseif ($_SESSION['chelog'] == 1){
							echo '<p class= "err">Логин уже существует</p>';
						}
					?>
				</div>
				<div>
					<input type="submit" class="bttn" value="регистрация">
				</div>
			</form>
		</div>

		<footer>
			
		</footer>
	</body>
</html>