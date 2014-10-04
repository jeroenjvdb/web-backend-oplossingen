<?php
	$dieren = array('hond', 'kat', 'vis', 'muis', 'arend', 'egel', 'wasbeer', 'bever');
	$dieren[] = 'haai';	
	$dieren[] = 'goudvis';

	$voertuigen = array('landvoertuigen' => array('vrachtwagen', 'bus'), 
		'watervoertuigen' => array('zeilboot', 'schip'), 
		'luchtvoertuigen' => array('vliegtuig'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>array-basis: deel 1</title>
</head>
<body>
	<?php var_dump($dieren); var_dump($voertuigen); ?>
</body>
</html>