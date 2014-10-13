<?php
	$i = 0;
	$getallen;

	while ($i < 100) {
		$getallen[] = $i;
		$i++;
	}

	$reeks = implode(', ', $getallen);

	//reeks 2
	$j = 40;
	$getallen2;

	while($j < 80){
		if($j % 3 == 0){
			$getallen2[] = $j;
		}

		$j++;
	}

	$reeks2 = implode(', ', $getallen2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>while deel 1</title>
</head>
<body>
	<p>getallenreeks 1: <?= $reeks ?></p>
	<p>getallenreeks 2: <?= $reeks2 ?></p>
</body>
</html>