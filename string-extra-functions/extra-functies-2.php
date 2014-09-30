<?php
	$fruit = "ananas";
	$lastA = strrpos($fruit, "a");
	$frInUpper = strtoupper($fruit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>extra functies 2</title>
</head>
<body>
	<p>De positie van de laatste a in ananas is <?php echo $lastA; ?></p>
	<p><?php echo $fruit; ?> in hoofdletters is <?php echo $frInUpper; ?>
</body>
</html>