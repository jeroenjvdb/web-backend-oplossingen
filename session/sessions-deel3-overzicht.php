<?php
	session_start();
	var_dump($_POST);
	var_dump($_SESSION);

	if(isset($_POST['submit']))
	{
		var_dump('test');
		$_SESSION['deel2']['straat'] = $_POST['straat'];
		$_SESSION['deel2']['nummer'] = $_POST['nummer'];
		$_SESSION['deel2']['gemeente'] = $_POST['gemeente'];
		$_SESSION['deel2']['postcode'] = $_POST['postcode'];
	}

	//deel1
	$deel1data = $_SESSION['deel1'];
	$email = 	 $_SESSION['deel1']['email'];
	$username=	 $_SESSION['deel1']['username'];

	//deel2
	$deel2data = $_SESSION['deel2'];
	$straat =    $_SESSION['deel2']['straat'];
	$nummer =	 $_SESSION['deel2']['nummer'];
	$gemeente =	 $_SESSION['deel2']['gemeente'];
	$postcode =	 $_SESSION['deel2']['postcode'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>verzamelpagina | sessions deel 3</title>
</head>
<body>
	<?php foreach($deel1data as $data => $value): ?>
		<p> <?=$data ?>: <?= $value ?></p>
		<a href="sessions-deel1-registratiepagina.php">wijzig</a>
	<?php endforeach ?>
	<?php foreach($deel2data as $data => $value): ?>
		<p> <?=$data ?>: <?= $value ?></p>
		<a href="sessions-deel2-adrespagina.php">wijzig</a>
	<?php endforeach ?>
</body>
</html>