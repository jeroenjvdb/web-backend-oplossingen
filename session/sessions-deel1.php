<?php
	session_start();

	$email = (isset($_SESSION['gegevens']['deel1']['email']))?$_SESSION['gegevens']['deel1']['email']:"";
	$username =(isset($_SESSION['gegevens']['deel1']['username']))?$_SESSION['gegevens']['deel1']['username']:"";
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>registratiepagina | sessions deel 1</title>
</head>
<body>
	<h1>Registratiepagina</h1>
	<form action="sessions-deel2.php" method="POST">
		<label for="email" >E-mail</label>
		<input type="text" name="email" value="<?= $email ?>" id="email" <?= (isset($_GET['change']) && $_GET['change'] == 'email' ) ? 'autofocus' : '' ?>><br>
		<label for="username">username</label>
		<input type="text" name="username" value="<?= $username ?>" id="username" <?= (isset($_GET['change']) && $_GET['change'] == 'username' ) ? 'autofocus' : '' ?>><br>
		<input type="submit" name="submit" value="verzenden">
	</form>
</body>
</html>