<?php
	$seconden = 5686518642;
	$minuten = floor($seconden/60);
	$uren = floor($minuten/60);
	$dagen = floor($uren/24);
	$weken = floor($dagen/7);
	$maanden = floor($dagen/31);
	$jaren = floor($dagen/365);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if else: deel 2</title>
</head>
<body>
	<p>in <?= $seconden ?> seconden zitten:</p>
	<ul>
		<li><?= $minuten ?> minuten</li>
		<li><?= $uren ?> uren</li>
		<li><?= $dagen ?> dagen</li>
		<li><?= $weken ?> weken</li>
		<li><?= $maanden ?> maanden</li>
		<li><?= $jaren ?> jaren</li>
	</ul>
</body>
</html>