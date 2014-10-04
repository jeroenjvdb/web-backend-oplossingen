<?php
	$ar = array('8','7','8','7','3','2','1','2','4');
	$noDupl = array_unique($ar);
	rsort($noDupl);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>arrays functie deel 3</title>
</head>
<body>
	<?php var_dump($noDupl); ?>
</body>
</html>