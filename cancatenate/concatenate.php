<?php
	$voorNaam = "Jeroen";
	$achterNaam = "Van den Broeck";
	$volledigeNaam = $voorNaam . " " . $achterNaam;
	$naamLengte = strLen($volledigeNaam);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p><?= $volledigeNaam ?></p>
	<p><?= $naamLengte ?></p>
</body>
</html>