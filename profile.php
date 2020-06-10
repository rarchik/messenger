<?php

	session_start();

	$link = mysqli_connect("localhost", "root", "usbw", "first");

	$sql = "SELECT * FROM `test` WHERE `id` = '" . $_SESSION['id'] . "'";
	$result = mysqli_query($link, $sql);
	$result = mysqli_fetch_array($result);
	mysqli_close($link);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<link rel = "script/javascript" src = "js/code.js">
		<script type="text/javascript" src = "js/code.js"></script>
		<link rel = "stylesheet" href = "css/profile.css">
		<meta name= "viewport" content="width=device-width">
		<meta charset="utf-8">
	</head>

	<body onload="prof()">
		<div class="menu">
			<ul>
				<li>
					<img src="img/burger.png">
					<ul class="submenu">
						<li class="itm"><a href=""><p class="tex">Диалоги</p></a></li>
						<li class="itm"><a href=""><p class="tex">Профиль</p></a></a></li>
						<li class="itm"><a href="index.php"><p class="tex">Выйти</p></a></a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="profinf">
				<div class="tex">
					<?php 
					echo 'Ваш логин:' . $result['login'];
					echo '<br>';
					echo 'Ваш пароль:' . $result['password'];
					?>
				</div>
			</div>
		</div>
	</body>

</html>