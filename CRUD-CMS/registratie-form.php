<?php
	session_start();
	//var_dump($_SESSION);
	
	if(isset($_COOKIE['login']))
	{
		$_SESSION[ 'notification' ][ 'type' ]	= 'error';
		$_SESSION[ 'notification' ][ 'text' ]	= 'u bent reeds aangemeld';
		header('location:dashboard.php');
	}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registreren</title>
</head>
<body>
	<?php if(isset($_SESSION['notification'])): ?>
		<?= $_SESSION['notification']['text'] ?>
	<?php endif ?>
	<h1>registreren</h1>
	<form action="registratie-process.php" method="POST">
		<label for="email">e-mail</label><br>
		<input type="text" id="email" name="email" value="<?= isset( $_SESSION[ 'email' ] ) ? $_SESSION[ 'email' ] : '' ?>"><br>

		<label for="password">password</label><br>
		<input type="<?= isset( $_SESSION[ 'randomPW' ] )? 'text' : 'password' ?>" id="password" name="password" value="<?= isset($_SESSION['randomPW'])?$_SESSION['randomPW']:'' ?>"> <input type="submit" value="generate password" name="genPass"><br>
		<input type="submit" value="Registreer" name="register">
	</form>
</body>
</html>