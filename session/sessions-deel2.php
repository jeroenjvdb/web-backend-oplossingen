<?php
	session_start();
	var_dump($_POST);
	
	if(isset($_POST['submit']))
	{
		$_SESSION['gegevens']['deel1']['email'] = $_POST['email'];
		$_SESSION['gegevens']['deel1']['username'] = $_POST['username'];
	}

	$email = $_SESSION['gegevens']['deel1']['email'];
	$username = $_SESSION['gegevens']['deel1']['username'];

	$straat=(isset($_SESSION['gegevens']['deel2']['straat']))?$_SESSION['gegevens']['deel2']['straat']:"";
	$nummer=(isset($_SESSION['gegevens']['deel2']['nummer']))?$_SESSION['gegevens']['deel2']['nummer']:"";
	$postcode=(isset($_SESSION['gegevens']['deel2']['postcode']))?$_SESSION['gegevens']['deel2']['postcode']:"";
	$gemeente=(isset($_SESSION['gegevens']['deel2']['gemeente']))?$_SESSION['gegevens']['deel2']['gemeente']:"";
	
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
	<form action="sessions-deel3.php" method="POST">
		<label for="straat">straat</label>
		<input type="text" id="straat" name="straat" value="<?= $straat ?>" placeholder="straatnaam" <?= (isset($_GET['change']) && $_GET['change'] == "straat" ) ? 'autofocus' : '' ?>><br>
		<label for="nummer" >nummer</label>
		<input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" placeholder="nummer" <?= (isset($_GET['change']) && $_GET['change'] == 'nummer' ) ? 'autofocus' : '' ?>><br>
		<label for="postcode">postcode</label>
		<input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" placeholder="postcode" <?= (isset($_GET['change']) && $_GET['change'] == 'postcode' ) ? 'autofocus' : '' ?>><br>
		<label for="gemeente">gemeente</label>
		<input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" placeholder="gemeente" <?= (isset($_GET['change']) && $_GET['change'] == 'gemeente' ) ? 'autofocus' : '' ?>><br>
		<input type="submit" name="submit" value="verzenden">
	</form>
</body>
</html>