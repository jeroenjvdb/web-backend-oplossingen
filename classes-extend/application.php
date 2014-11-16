<?php
	function __autoload($className){
		include 'classes/' . $className . '.php';
	}

	$pooh = new Animal('pooh', 'male', 75);
	$scar = new Animal('scar', 'male', 125);
	$happy = new Animal('happy', 'male', 15);

	$simba = new Lion('Simba', 'male', 120, 'Lion King');
	$nala = new Lion('Nala', 'female', 100, 'Lion Queen');

	$zeke = new Zebra('Zeke', 'male', 40, 'Quagga');
	$zana = new Zebra('Zana', 'female', 30, 'Selous');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>classes extend</title>
</head>
<body>
	<h2>animal class</h2>
	<p><?= $pooh->getName() ?> is a <?= $pooh->getGender() ?> with <?= $pooh->getHealth() ?> healthpoints. <br>
	<?= $scar->getName() ?> is a <?= $scar->getGender() ?> with <?= $scar->getHealth() ?> healthpoints. <br>
	<?= $happy->getName() ?> is a <?= $happy->getGender() ?> with <?= $happy->getHealth() ?> healthpoints. <br>
	<?= $happy->doSpecialMove() ?></p>

	<h2>Lion Class </h2>
	<p>De speciale move van <?= $simba->getName() ?> (soort:<?= $simba->getSpecies() ?>):<?= $simba->doSpecialMove() ?></p>
	<p>De speciale move van <?= $nala->getName() ?> (soort:<?= $nala->getSpecies() ?>):<?= $nala->doSpecialMove() ?></p>

	<h2>Zebra Class </h2>
	<p>De speciale move van <?= $zeke->getName() ?> (soort: <?= $zeke->getSpecies() ?>): <?= $zeke->doSpecialMove() ?></p>
	<p>De speciale move van <?= $zana->getName() ?> (soort: <?= $zana->getSpecies() ?>): <?= $zana->doSpecialMove() ?></p>

</body>
</html>