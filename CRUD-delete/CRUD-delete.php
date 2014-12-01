<?php
	session_start();
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

				$statementDelete->bindParam(':brouwernr', $_POST['delete']);

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
				session_destroy();
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
	<title>Crud Delete</title>
</head>
<body>
	<?php if($message): ?>
		<?= $message['text'] ?>
	<?php endif ?>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
		<?php if(isset($_SESSION['delete'])): ?>
			<p> bent u zeker dat u brouwerij met id: <?= $_SESSION['delete'] ?> wilt verwijderen? </p>
			<input type="submit" name="waarschuwing" value="ja">
			<input type="submit" name="waarschuwing" value="nee">
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
					<div class="<?php ($brouwer['brouwernr'] == $_SESSION['delete']?'delete':'') ?>">
						<tr>
							
							<?php foreach ($brouwer as $brouwerspecs): ?>
								
								<td><?= $brouwerspecs ?></td>
							<?php endforeach ?>
							<td><input type="submit" value="<?= $brouwer['brouwernr'] ?>" name="delete"></td>
						</tr>
					</div>
				<?php endforeach ?>
			</tbody>
		</table>
	</form>
</body>
</html>