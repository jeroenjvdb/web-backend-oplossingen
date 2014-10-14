<?php
	session_start();

	$email = (isset($_SESSION['deel1']['email']))?$_SESSION['deel1']['email']:"";
	$username =(isset($_SESSION['deel1']['username']))?$_SESSION['deel1']['username']:"";
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registratiepagina | sessions deel 1</title>
</head>
<body>
	<h1>Registratiepagina</h1>
	<form action="sessions-deel2-adrespagina.php" method="POST">
		<label for="email">E-mail</label>
		<input type="text" name="email" value="<?= $email ?>" id="email"><br>
		<label for="username">username</label>
		<input type="text" name="username" value="<?= $username ?>" id="username"><br>
		<input type="submit" name="submit" value="verzenden">
	</form>
</body>
</html>