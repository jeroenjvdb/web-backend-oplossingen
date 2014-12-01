<?php
	session_start();
	var_dump($_POST);
	$message = false;

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		if(isset($_POST['delete']))
		{
			$_SESSION['delete'] = $_POST['delete'];
		}
		if(isset($_POST['waarschuwing']))
		{
			if(isset($_SESSION['delete'] )&& $_POST['waarschuwing']=='ja')
			{
				$queryDelete = 'DELETE
								FROM brouwers
								WHERE brouwernr = :brouwernr';

				$statementDelete = $db->prepare($queryDelete);

				$statementDelete->bindParam(':brouwernr', $_SESSION['delete']);

				$succesDelete = $statementDelete->execute();
				if($succesDelete)
				{
					$message['type'] = 'succes';
					$message['text'] = 'uw item is verwijderd.';
				} else
				{
					$message['type'] = 'error';
					$message['text'] = 'er ging iets mis: ' . $statementDelete->errorInfo()[2];
				}
			}
				session_destroy();
		}	

		if(isset($_POST['updated']))
		{
			$querystringUpdate = 'UPDATE brouwers
									SET brnaam 		= :brouwernaam, 
										adres		= :adres, 
										postcode 	= :postcode, 
										gemeente 	= :gemeente, 
										omzet 		= :omzet
									WHERE brouwernr = :updated';

			$statementUpdate = $db->prepare($querystringUpdate);

			$statementUpdate->bindParam(':brouwernaam', $_POST['brnaam']);
			$statementUpdate->bindParam(':adres', $_POST['adres']);
			$statementUpdate->bindParam(':postcode', $_POST['postcode']);
			$statementUpdate->bindParam(':gemeente', $_POST['gemeente']);
			$statementUpdate->bindParam(':omzet', $_POST['omzet']);
			$statementUpdate->bindParam(':updated', $_POST['updated']);


			$succesUpdate = $statementUpdate->execute();
			if($succesUpdate)
				{
					$message['type'] = 'succes';
					$message['text'] = 'uw item is geupdate.';
				} else
				{
					$message['type'] = 'error';
					$message['text'] = 'er ging iets mis: ' . $statementUpdate->errorInfo()[2];
				}
		}
			
		

		$querystringbrouwers = 'SELECT * 
									FROM brouwers';

		$statementBrouwers = $db->prepare($querystringbrouwers);

		$statementBrouwers-> execute();
		$fetchBrouwers = array();
		while($row = $statementBrouwers->fetch(PDO::FETCH_ASSOC))
		{
			$fetchBrouwers[] = $row;
		}

		$columnNames = array();
		
		foreach ($fetchBrouwers[0] as $key => $brouwers) 
		{
			$columnNames[] = $key;
		}
		$updateNames = $columnNames;
		$columnNames[] = 'delete';

		

	}catch (PDOException $e)
	{
		$message['type'] = 'error';
		$message['text'] = 'er ging iets mis: ' . $e->getMessage();
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Crud update</title>
</head>
<body>
	<?php if($message): ?>
		<?= $message['text'] ?>
	<?php endif ?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<?php if(isset($_POST['delete'])): ?>
			<p> bent u zeker dat u brouwerij met id: <?= $_POST['delete'] ?> wilt verwijderen? </p>
			<input type="submit" name="waarschuwing" value="ja">
			<input type="submit" name="waarschuwing" value="nee">
		<?php endif ?>
		<?php if(isset($_POST['update'])): ?>
			<?php foreach ($updateNames as $key => $value): ?>
				<?php foreach($fetchBrouwers as $brouwer): ?>
					
					<?php if($brouwer['brouwernr'] == $_POST['update']): ?>
						<label for="<?= $value ?>"> <?= $value ?> </label>
						<input type="text" name="<?= $value ?>" id="<?= $value ?>" value="<?= $brouwer[$value] ?>">
					<?php endif ?>
				<?php endforeach ?>
			<?php endforeach ?>
			<input type="submit" value="<?= $_POST['update'] ?>" name="updated">
		<?php endif ?>
		<table>
			<thead>
				<tr>
					<?php foreach ($columnNames as $naam): ?>
						<th><?= $naam ?></th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($fetchBrouwers as $key => $brouwer): ?>
					<div class="<?php ((isset($_SESSION['delete']) && $brouwer['brouwernr'] == $_SESSION['delete'])?'delete':'') ?>">
						<tr>
							
							<?php foreach ($brouwer as $brouwerspecs): ?>
								
								<td><?= $brouwerspecs ?></td>
							<?php endforeach ?>
							<td><input type="submit" value="<?= $brouwer['brouwernr'] ?>" name="delete"></td>
							<td><input type="submit" value="<?= $brouwer['brouwernr'] ?>" name="update"></td>
						</tr>
					</div>
				<?php endforeach ?>
			</tbody>
		</table>
	</form>
</body>
</html>