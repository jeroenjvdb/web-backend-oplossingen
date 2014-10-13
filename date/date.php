<?php
	$time = mktime(22,35,25,1,21,1904);
	$date = date('d F Y g i s a', $time);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>date</title>
</head>
<body>
	<?=  $date ?>
</body>
</html>