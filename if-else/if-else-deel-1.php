<?php
	$jaar = 2014;
	$schrikkeljaar = "onbekend";

	if($jaar%400 == 0)
		$schrikkeljaar = "wel een";
	else if($jaar%100 == 0)
		$schrikkeljaar = "geen";
	else if($jaar%4 == 0)
		$schrikkeljaar = "wel een";
	else
		$schrikkeljaar = "geen";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if else: deel 1</title>
</head>
<body>
	<p>het jaar <?= $jaar ?> is <?= $schrikkeljaar ?> schrikkeljaar</p>
</body>
</html>