<?php
	session_start();
	#var_dump($_POST);
	var_dump($_SESSION);

	if(isset($_POST['submit']))
	{
		var_dump('test');
		$_SESSION['gegevens']['deel2']['straat'] = $_POST['straat'];
		$_SESSION['gegevens']['deel2']['nummer'] = $_POST['nummer'];
		$_SESSION['gegevens']['deel2']['gemeente'] = $_POST['gemeente'];
		$_SESSION['gegevens']['deel2']['postcode'] = $_POST['postcode'];
	}

	$gegevens = $_SESSION['gegevens'];
	//deel1
	$deel1data = $_SESSION['gegevens']['deel1'];
	$email = 	 $_SESSION['gegevens']['deel1']['email'];
	$username=	 $_SESSION['gegevens']['deel1']['username'];

	//deel2
	$deel2data = $_SESSION['gegevens']['deel2'];
	$straat =    $_SESSION['gegevens']['deel2']['straat'];
	$nummer =	 $_SESSION['gegevens']['deel2']['nummer'];
	$gemeente =	 $_SESSION['gegevens']['deel2']['gemeente'];
	$postcode =	 $_SESSION['gegevens']['deel2']['postcode'];




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>verzamelpagina | sessions deel 3</title>
</head>
<body>
	<?php foreach($gegevens as $geg => $deel): ?>
		<?php foreach ($deel as $key => $value): ?>
			<p> <?= $key ?>: <?= $value ?></p>
			<a href="sessions-<?= $geg ?>.php?change=<?= $key ?>">
				wijzig
			</a>
		<?php endforeach ?>
	<?php endforeach ?>

	</body>
</html>