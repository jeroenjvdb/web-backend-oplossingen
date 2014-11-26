<?php
	$message ='';
	$brouwernr = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren','root','root');

		$queryStringBrouwers = "SELECT brouwers.brouwernr, brouwers.brnaam
									FROM brouwers";

		$statementBrouwers = $db->prepare($queryStringBrouwers);
		$statementBrouwers->execute();

		$fetchBrouwers = array();
		while($row = $statementBrouwers->fetch(PDO::FETCH_ASSOC))
		{
			$fetchBrouwers[] = $row;
		}

		if(isset($_GET['brouwernr']))
		{
			
			$brouwernr = $_GET['brouwernr'];
			$querystringbieren = "SELECT bieren.naam
									FROM bieren
									WHERE bieren.brouwernr = :brouwernr";
			$statementBieren = $db->prepare($querystringbieren);

			$statementBieren->bindParam(':brouwernr', $_GET['brouwernr']);
			
			
		} else
		{
			$querystringbieren = "SELECT bieren.naam
									FROM bieren";
			$statementBieren = $db->prepare($querystringbieren);
		}

		$statementBieren->execute();

		$fetchBieren = array();
		while($row = $statementBieren->fetch(PDO::FETCH_ASSOC))
		{
			$fetchBieren[] = $row;
		}
		
		$columnNames = array();
		$columnNames[] = 'biernummer';
		foreach( $fetchBieren[0] as $key => $bier )
		{
			$columnNames[  ]	=	$key;
		}
		var_dump($columnNames);
		
	}
	catch(PDOException $e)
	{
		$message = $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="CRUD-query-2.php" method="GET">
		<select name="brouwernr">
			<?php foreach ($fetchBrouwers as $key => $value): ?>
				<option value="<?= $value['brouwernr'] ?>" <?= ($brouwernr == $value['brouwernr'])?'selected':'' ?>><?= $value['brnaam'] ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit">

		<table>
		<thead>
			<tr>
				<?php foreach ($columnNames as $naam): ?>
					<th><?= $naam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($fetchBieren as $key => $bier): ?>
				<tr>
					<td><?= ($key + 1) ?></td>
					<?php foreach ($bier as $bierspecs): ?>
						<td><?= $bierspecs ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>