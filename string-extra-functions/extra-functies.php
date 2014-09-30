<?php
	$fruit = "kokosnoot";
	$frCharacters = strlen($fruit);
	$frstO = strpos($fruit, "o");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>extra functies 1</title>
</head>
<body>
	<p>De lengte van kokosnoot is <?php echo $frCharacters; ?>
	<p>De plaats van de eerste o in kokosnoot is <?php echo $frstO ?></p>
	
</body>
</html>