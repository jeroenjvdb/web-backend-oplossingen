<?php
	$getallen1 = array(1, 2, 3, 4, 5);
	$getallen2 = array(5, 4, 3, 2, 1);

	$vermenigvuldigen = $getallen1[0]*$getallen1[1]*$getallen1[3]*$getallen1[4]*$getallen1[2];

	$getallen1[0] += $getallen2[0];
	$getallen1[1] += $getallen2[1];
	$getallen1[2] += $getallen2[2];
	$getallen1[3] += $getallen2[3];
	$getallen1[4] += $getallen2[4];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>arrays basis deel 2</title>
</head>
<body>
	<?= $vermenigvuldigen; ?>
	<?php var_dump($getallen1); ?>
</body>
</html>