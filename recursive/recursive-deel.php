<?php
	$startKapitaal = 100000;
	$renteVoet = 1.08;
	$jaren = 10;

	function bank($kapitaal){
		global $jaren;
		global $renteVoet;



		if($jaren == 0)
			return $kapitaal;
		else{
			$jaren--;
			$kapitaal = $kapitaal * $renteVoet;
			return bank($kapitaal);
		}
	}
	$eindKapitaal = bank($startKapitaal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?= $eindKapitaal ?>
</body>
</html>