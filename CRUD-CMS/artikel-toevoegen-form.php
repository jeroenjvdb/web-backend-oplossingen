<?php
	include 'login-check.php';
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
	
	<form action="artikel-toevoegen-process.php" method="POST">
		<label for="titel">
			Titel
		</label><br>
		<textarea id="titel" name="titel" rows="1" cols="50"></textarea></br>
		<label for="artikel">
			Artikel
		</label><br>
		<textarea id="artikel" name="artikel" rows="4" cols="50"></textarea></br>
		<label for="kernwoorden">
			Kernwoorden
		</label><br>
		<textarea id="kernwoorden" name="kernwoorden" rows="1" cols="50"></textarea></br>
		<label for="datum">
			Datum (dd-mm-jjjj)
		</label><br>
		<textarea id="datum" name="datum" rows="1" cols="50"></textarea></br>
		<input type="submit" name="submit" value="artikel toevoegen">

	</form>


</body>
</html>