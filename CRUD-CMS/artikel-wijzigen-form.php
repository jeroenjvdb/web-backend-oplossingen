<?php
	include 'login-check.php';
	if (isset($_GET['artikel']))
	{
		$artikelId		=	$_GET['artikel'];
		$connection 	= 	new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
		$db 			= 	new Database( $connection );

		$query			=	"SELECT *
								FROM artikels 
								WHERE id= :artikelId";

		$tokens			=	array( ':artikelId'	=> $artikelId );
		$artikels 		=	$db->query( $query, $tokens );
		$artikel 		=	$artikels['data'][0];
		//var_dump( $artikel );
	} else
	{
		header('location:artikels-overzicht.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikels</title>
</head>
<body>
	<?php include 'header.php' ?>
	<p><a href="artikels-overzicht.php">Terug naar overzicht</a></p>
	<h1>artikel toevoegen</h1>
	
	<form action="artikel-wijzigen-process.php?artikel=<?= $artikelId ?>" method="POST">
		<label for="titel">
			Titel
		</label><br>
		<textarea id="titel" name="titel" rows="1" cols="50"><?= $artikel['titel'] ?></textarea></br>
		<label for="artikel">
			Artikel
		</label><br>
		<textarea id="artikel" name="artikel" rows="4" cols="50"><?= $artikel[ 'artikel' ] ?></textarea></br>
		<label for="kernwoorden">
			Kernwoorden
		</label><br>
		<textarea id="kernwoorden" name="kernwoorden" rows="1" cols="50"><?= $artikel[ 'kernwoorden' ] ?></textarea></br>
		<label for="datum">
			Datum (dd-mm-jjjj)
		</label><br>
		<textarea id="datum" name="datum" rows="1" cols="50"><?= $artikel[ 'datum' ] ?></textarea></br>
		<input type="submit" name="submit" value="artikel wijzigen">

	</form>


</body>
</html>