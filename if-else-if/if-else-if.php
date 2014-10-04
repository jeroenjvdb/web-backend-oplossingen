<?php
	$getal = 90;
	$tiental;
	

	if($getal < 0){
		$tiental="error, je getal is lager dan 0.";
	} else if ($getal < 10){
		$tiental = "je getal ligt tussen 0 en 10.";
	} else if ($getal < 20){
		$tiental = "je getal ligt tussen 10 en 20.";
	}else if ($getal < 30){
		$tiental = "je getal ligt tussen 20 en 30.";
	}else if ($getal < 40){
		$tiental = "je getal ligt tussen 30 en 40.";
	}else if ($getal < 50){
		$tiental = "je getal ligt tussen 40 en 50.";
	}else if ($getal < 60){
		$tiental = "je getal ligt tussen 50 en 60.";
	}else if ($getal < 70){
		$tiental = "je getal ligt tussen 60 en 70.";
	}else if ($getal < 80){
		$tiental = "je getal ligt tussen 70 en 80.";
	}else if ($getal < 90){
		$tiental = "je getal ligt tussen 80 en 90.";
	}else if ($getal < 100){
		$tiental = "je getal ligt tussen 90 en 100.";
	} if ($getal >= 100){
		$tiental = "error, je getal is hoger dan 100";
	}

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>if else if</title>
</head>
<body>
	<p><?= $tiental ?></p>
	<p><?= strrev($tiental) ?></p>
</body>
</html>