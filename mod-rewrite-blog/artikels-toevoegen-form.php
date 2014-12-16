<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Artikel toevoegen</title>
</head>
<body>
	<?= isset($_SESSION[ 'notification' ]) ? $_SESSION[ 'notification' ][ 'text' ] : '' ?>
	<h1>artikel toevoegen</h1>
	<a href="#">Terug naar overzich</a>
	<form action="artikels-toevoegen.php" method="POST"><br>
		<label for="title">Titel</label><br>
		<input type="text" name="title" id="title"><br>
		<label for="artikel">Artikel</label><br>
		<textarea name="artikel" id="artikel"></textarea><br>
		<label for="kernwoorden">kernwoorden</label><br>
		<input type="text" name="kernwoorden" id="kernwoorden"><br>
		<label for="datum">datum</label><br>
		<input type="date" id="datum" name="datum"><br>
		<input type="submit" name="verzenden">
	</form>
</body>
</html>