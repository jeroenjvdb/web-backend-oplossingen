<?php
	session_start();

	if(isset($_COOKIE['login']))
	{
		header('location:dashboard.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
</head>
<body>
	<?php if(isset($_SESSION[ 'notification' ]) && $_SESSION[ 'notification' ][ 'type' ] == ('logout' || 'notFound')): ?>
		<?= $_SESSION[ 'notification' ][ 'text' ] ?>
	<?php endif ?>
	<h1>Inloggen</h1>
	<form action="login-process.php" method="POST">
		<label for="email">email: </label>
		<input type="text" name="email" id="email"><br>
		<label for="wachtwoord">wachtwoord </label>
		<input type="password" name="wachtwoord" id="wachtwoord"><br>
		<input type="submit" value="submit">
	</form>
	<p>
		nog geen account? maak er dan een aan op onze <a href="registratie-form.php">registratiepagina</a>!
	</p>
</body>
</html>