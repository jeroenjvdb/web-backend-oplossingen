<?php
	function berekenSom($getal1, $getal2)
	{
		$resultaat = $getal1 + $getal2;
		return $resultaat;
	}
	function vermenigvuldig($getal1, $getal2)
	{
		$resultaat = $getal1 * $getal2;
		return $resultaat;
	}
	function isEven($getal)
	{
		if($getal % 2 > 0){
			return False;
		} else {
			return true;
		}
	}
	function stringBewerking( $string ){
		$stringArray["upperCase"] = strtoupper($string);
		$stringArray["length"] = strlen($string);

		return $stringArray;
	}

	$som = berekenSom(5,3);
	$product = vermenigvuldig(5,3);
	$even = isEven(3);	

	$string = "lalala ik heb geen inspiratie";
	$stringArray = stringBewerking($string);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Functies: deel 1</title>
</head>
<body>
	<?php echo $som; ?><br>
	<?php echo $product; ?><br>
	<?php echo $even; ?><br>
	<?= $stringArray["upperCase"]; ?>
	<?= $stringArray["length"]; ?>


	<ul>
		<?php foreach( $stringArray as $key => $value ): ?>
			<li><?php echo $key ?>: <?php echo $value ?></li>
		<?php endforeach ?>
		</ul>
</body>
</html>