<?php
	session_start();
	var_dump($_POST);
	
	if(isset($_POST['submit']))
	{
		$_SESSION['deel1']['email'] = $_POST['email'];
		$_SESSION['deel1']['username'] = $_POST['username'];
	}

	$email = $_SESSION['deel1']['email'];
	$username = $_SESSION['deel1']['username'];

	$straat=(isset($_SESSION['deel2']['straat']))?$_SESSION['deel2']['straat']:"";
	$nummer=(isset($_SESSION['deel2']['nummer']))?$_SESSION['deel2']['straat']:"";
	$postcode=(isset($_SESSION['deel2']['postcode']))?$_SESSION['deel2']['straat']:"";
	$gemeente=(isset($_SESSION['deel2']['gemeente']))?$_SESSION['deel2']['straat']:"";
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>adrespagina | sessions deel 2</title>
</head>
<body>
	<h1>adrespagina</h1>
	<h2>registratiegegevens</h2>
	email: <?= $email ?><br>
	username: <?= $username ?>
	<form action="sessions-deel3-overzicht.php" method="POST">
		<label for="straat">straat</label>
		<input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="straatnaam"><br>
		<label for="nummer" >nummer</label>
		<input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="nummer"><br>
		<label for="postcode">postcode</label>
		<input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="postcode"><br>
		<label for="gemeente">gemeente</label>
		<input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="gemeente"><br>
		<input type="submit" name="submit" value="verzenden">
	</form>
</body>
</html>