<?php
	function __autoload($className){
		include 'classes/' . $className . '.php';
	}	
	$new = 150;
	$unit = 100;
	$percent = new Percent($new, $unit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>classes begin</title>
</head>
<body>
	<h1>werken met percentages</h1>
	<table>
		<tr>
			<td>Absoluut</td>
			<td><?= $percent->absolute ?></td>
		</tr>
		<tr>
			<td>relatief</td>
			<td><?= $percent->relative ?></td>
		</tr>
		<tr>
			<td>geheel getal</td>
			<td><?= $percent->hundred ?></td>
		</tr>
		<tr>
			<td>nominaal</td>
			<td><?= $percent->nominal ?></td>
		</tr>
	</table>
</body>
</html>