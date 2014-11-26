<?php
	$messageContainer = '';
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		$queryString = "SELECT * 
							FROM bieren 
						    INNER JOIN brouwers
						    	ON bieren.brouwernr = brouwers.brouwernr
						    WHERE bieren.naam LIKE 'Du%'
						    AND brouwers.brnaam LIKE '%a%'";

		$statement = $db->prepare($queryString);

		$statement->execute();

		$fetch = array();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			$fetch[] = $row;
		}


		$columnNames = array();
		$columnNames[] = 'biernummer';
		foreach( $fetch[0] as $key => $bier )
		{
			$columnNames[  ]	=	$key;
		}
		var_dump($columnNames);
	}
	catch(PDOException $e)
	{
		$message = 'er is iets fout gegaan: '. $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<?php foreach ($columnNames as $naam): ?>
					<th><?= $naam ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($fetch as $key => $bier): ?>
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