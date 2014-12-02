<?php
	$message = false;
	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		if(isset($_GET['order']))
		{
			$tabel;
			switch($_GET['order'])
			{
				case 'biernr':
				case 'naam':
				case 'alcohol':
					$tabel= 'bieren';
					break;
				case 'brnaam':
					$tabel = 'brouwers';
					break;
				case 'soort':
					$tabel = 'soorten';
					break;
				default:
					$tabel = 'bieren';
					break;

			}

			$order = $_GET['order'];
			
			/*switch($_GET['order'])
			{
				case "'naam'":
					$order = 'naam';
					break;
				case "'brnaam'":
					$order = 'brnaam';
					break;
				case "'soort'":
					$order = 'soort';
					break;
				case "'alcohol'":
					$order = 'alcohol';
					break;
				default:
					$order = 'biernr';
					break;
			}*/
			echo $order;
			/*if($_GET['order'] == ('naam' || 'brnaam' || 'soort' || 'alcohol'))
			{
				echo $_GET['order'];
				$order = $_GET['order'];
			} else
			{
				$order = 'biernr';
			}*/

			$descending;
			(isset($_GET['descending']) && $_GET['descending'] == true)?$descending = 'DESC':$descending = 'ASC';

			$orderquery = "ORDER BY " . $tabel.".".$order . " "  . $descending;

			$querystringBieren = 'SELECT 	bieren.biernr,
											bieren.naam,
									        brouwers.brnaam,
											soorten.soort,
									        bieren.alcohol
										FROM bieren 
									    INNER JOIN soorten
									    	ON bieren.soortnr = soorten.soortnr
									    INNER JOIN brouwers
									    	ON bieren.brouwernr = brouwers.brouwernr ' . $orderquery;
									    
	    	echo $querystringBieren;

			$statementOrder = $db->prepare($querystringBieren);
			
			

			
				
			

		} else 
		{
			$querystringBieren = 'SELECT 	bieren.biernr,
											bieren.naam,
									        brouwers.brnaam,
											soorten.soort,
									        bieren.alcohol
										FROM bieren 
									    INNER JOIN soorten
									    	ON bieren.soortnr = soorten.soortnr
									    INNER JOIN brouwers
									    	ON bieren.brouwernr = brouwers.brouwernr
									    ORDER BY bieren.biernr ASC';

			$statementOrder = $db->prepare($querystringBieren);


		}

		$succes = $statementOrder->execute();
		if(!$succes)
		{
			$message['type'] = 'error';
			$message['text'] = 'er ging iets mis: ' . $statementOrder->errorInfo()[2];
		}

		$fetchbieren = array();
		while($row = $statementOrder->fetch(PDO::FETCH_ASSOC))
		{
			$fetchbieren[] = $row;
		}

		//$columnNames[] = array();

		foreach($fetchbieren[0] as $key => $bieren)
		{
			$columnNames[] = $key;
		}





	}
	catch(PDOException $e)
	{
		$message['type'] = 'error';
		$message['text'] = 'er is iets mis gegaan: ' . $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>query order by</title>
</head>
<body>
	<?php if($message): ?>
		<?= $message['text'] ?>
	<?php endif ?>
	
	
	<table>
			<thead>
				<tr>
					<?php foreach ($columnNames as $naam ): ?>
					
						<th><?php ((isset($_GET['order']) && $naam == $_GET['order']) ? 'true' : 'false') ?><a href="query-order-by.php?order=<?= $naam ?>&descending=<?php echo(isset($_GET['order']) && $naam == $_GET['order']  )? ((isset($_GET['descending']) && $_GET['descending'] == true)? false : true) : false ?>"><?= $naam ?></a></th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($fetchbieren as $key => $brouwer): ?>
					<div>
						<tr>
							
							<?php foreach ($brouwer as $brouwerspecs): ?>
								
								<td><?= $brouwerspecs ?></td>
							<?php endforeach ?>
							
						</tr>
					</div>
				<?php endforeach ?>
			</tbody>
		</table>

</body>
</html>