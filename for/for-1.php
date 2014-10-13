<?php
	$getallen;
	$getallenreeks;
	for($i = 0; $i<100; $i++){
		$getallen[] = $i;
	}
	$getallenreeks = implode(', ', $getallen);

	//reeks 2
	$getallen2;
	$getallenreeks2;

	for($i =40; $i<80; $i++){
		if($i%3 == 0){
			$getallen2[] = $i;
		}
	}
	$getallenreeks2 = implode(', ', $getallen2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>For deel 1</title>
</head>
<body>
	<p><?= $getallenreeks ?></p>
	<p><?= $getallenreeks2 ?> </p>
</body>
</html>