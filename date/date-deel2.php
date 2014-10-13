<?php
	$time = mktime(22,35,25,1,21,1904);
	$datum = date('d F Y g i s a', $time);

	$arraymaand = array(
		"Januari",
		"Februari",
		"Maart",
		"April",
		"Mei",
		"Juni",
		"Juli",
		"Augustus",
		"September",
		"Oktober",
		"November",
		"December"
	);

	$datum = date("d ", $time) . $arraymaand[date("F") - 1] . date(" Y g i s a", $time); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>date</title>
</head>
<body>
	<?=  $datum ?>
</body>
</html>