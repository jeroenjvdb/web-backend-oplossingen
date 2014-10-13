<?php
	$getallenreeks;
	$i = 0;

	while($i<11){
		$j = 0;
		while($j<11){
			$getallenreeks[$i][] = $i*$j;
			$j++;
		}

		$i++;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>while deel 2</title>
</head>
<body>
	<p>
		<?= var_dump($getallenreeks) ?>
	</p>
</body>
</html>