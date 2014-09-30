<?php
	$getal = 5;
	$dag = "geen dag";
	switch ($getal) {
		case 1:
			$dag = "maandag";
			break;

		case 2:
			$dag = "dinsdag";
			break;

		case 3:
			$dag = "woensdag";
			break;

		case 4:
			$dag = "donderdag";
			break;

		case 5:
			$dag = "vrijdag";
			break;

		case 6:
			$dag = "zaterdag";
			break;

		case 7:
			$dag = "zondag";
			break;
		
		default:
			$dag = "error";
			break;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>conditional statements deel 1</title>
</head>
<body>
	<p>het is <?= $dag ?></p>
</body>
</html>