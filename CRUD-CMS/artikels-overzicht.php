<?php
	
	include 'login-check.php';

	$connection	=	new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','root');
	$dbname		=	new Database( $connection );

	$query		=	"SELECT * 
						FROM artikels
						WHERE is_archived=0";
	$artikels 	= 	$db->query( $query, false );
	//var_dump($artikels['data']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikels</title>
	<style type="text/css">
		#deactivated{
			background-color: #999;
			padding: 5px;
			margin: 10px;
		}
	</style>
</head>
<body>
	<?php include 'header.php' ?>
	<h1>Overzicht van artikels</h1>
	<?php if(isset($artikels['data'][0])): ?>
		
		<?php foreach($artikels['data'] as $key => $value): ?>
			<article id="<?= (!$value['is_active']) ? 'deactivated' : '' ?>">
				<h2><?= $value['titel'] ?></h2>
				<ul>
					<li><p>artikel: <?= $value['artikel'] ?></p></li>
					<li><p>kernwoorden:<?= $value['kernwoorden'] ?> </p></li>
					<li><p>datum: <?= $value['datum'] ?> </p></li>
				</ul>
				<p><a href="artikel-wijzigen-form.php?artikel=<?= $value['id'] ?>">artikel wijzigen</a> | 
					<a href="artikel-activeren.php?artikel=<?= $value['id'] ?>">artikel <?= ($value['is_active']) ? 'de' : '' ?>activeren</a> | 
					<a href="artikel-verwijderen.php?artikel=<?= $value['id'] ?>">artikel verwijderen</a> </p>
			</article>
		<?php endforeach ?>
	<?php else: ?>
		<p>geen artikels momenteel </p>
	<?php endif ?>
	<a href="artikel-toevoegen-form.php">Voeg artikel toe</a>
</body>
</html>