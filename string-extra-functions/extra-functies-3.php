<?php
	$letter = "e";
	$cijfer = "3";
	$langsteWoord = "zandzeepsodemineralenwatersteenstralen";
	//vervangen e's door 3's
	$vervangenWoord = str_replace($letter, $cijfer, $langsteWoord );
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>extra functies 3</title>
</head>
<body>
	<p>als ik de <?= $letter ?>'s verander door <?= $cijfer ?>'s in het woord <?= $langsteWoord ?>, dan bekom ik <?= $vervangenWoord ?>
</body>
</html>