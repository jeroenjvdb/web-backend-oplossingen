<?php
	$message = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren','root','root');

		$queryStringBrouwers = "SELECT brouwers.brnaam AS Brouwernaam,
											brouwers.adres,
											brouwers.postcode,
											brouwers.gemeente,
											brouwers.omzet
										FROM brouwers";

		$statementBrouwers = $db->prepare($queryStringBrouwers);

		$statementBrouwers->execute();
		$fetchBrouwers = array();
		while($row = $statementBrouwers->fetch(PDO::FETCH_ASSOC))
		{
			$fetchBrouwers[] = $row;
		}

		$columnNames = array();
		foreach($fetchBrouwers[0] as $key=>$brouwers)
		{
			$columnNames[] = $key;
		}
		
		if (isset($_POST['submit']))
		{
			var_dump($_POST);

			$brouwernaam = $_POST['Brouwernaam'];
			$adres = $_POST['adres'];
			$postcode = $_POST['postcode'];
			$gemeente = $_POST['gemeente'];
			$omzet = $_POST['omzet'];

			$queryStringInsert = 'INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
										VALUES (:brouwernaam, :adres, :postcode, :gemeente, :omzet)';

			$statementBrouwers = $db->prepare($queryStringInsert);

			$statementBrouwers->bindParam(':brouwernaam', $brouwernaam);
			$statementBrouwers->bindParam(':adres', $adres);
			$statementBrouwers->bindParam(':postcode', $postcode);
			$statementBrouwers->bindParam(':gemeente', $gemeente);
			$statementBrouwers->bindParam(':omzet', $omzet);

			$succes = $statementBrouwers->execute();
			if($succes)
			{
				$brouwerid = $db->lastInsertId();
				$message['type'] = 'succes';
				$message['text'] = 'uw brouwerij (' . $_POST['Brouwernaam'] . ') is succesvol toegevoegd met als id ' . $brouwerid;
			} else
			{
				$message['type'] = 'error';
				$message['text'] = 'er is iets misgelopen tijdens het toevoegen, gelieve het opnieuw te proberen';
			}
		}
	

	}
	catch(PDOException $e)
	{
		$message['type'] = 'error';
		$message['text'] = $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD-insert</title>
</head>
<body>
	<?php if($message): ?>
		<?= $message['text'] ?>
	<?php endif ?>
	<h1>Voeg een brouwer toe</h1>
	<form action="CRUD-insert.php" method="POST">
		<ul>
			<?php foreach($columnNames as $key =>$value): ?>
				<li>
					<label for="<?= $value ?>"><?= $value ?></label>
					<input type="text" name="<?= $value ?>" id="<?= $value ?>">
				</li>
			<?php endforeach ?>
		</ul>
		<input type="submit" name="submit">

	</form>
</body>
</html>