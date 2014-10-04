<?php
	$zeedieren = array('zalm', 'baars', 'witte haai', 'forrel', 'kabeljauw', 'paling', 'mossel', 'plankton');
	$aantalElementen = count($zeedieren);
	sort($zeedieren);
	$zoogdieren = array('aap', 'leeuw', 'hond');
	$dierenlijst[] = $zeedieren;
	$dierenlijst[] = $zoogdieren;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>array functies deel 1</title>
</head>
<body>
	<p><?= $aantalElementen ?></p>
	<p><?php var_dump($dierenlijst); ?>
</body>
</html>