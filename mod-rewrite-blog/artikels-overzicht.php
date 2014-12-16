<?php 
	session_start();

	function __autoload( $classname )
	{
		require_once( "classes/" . $classname . '.php' );
	}

	$connection = new PDO('mysql:host=localhost;dbname=opdracht-mod-rewrite', 'root', 'root');
	$db 		=	new Database( $connection );
	$query = false;
	$tokens = false;

	if(!isset($_GET['zoeken']))
	{
		$query		=	'SELECT *
							FROM artikels';
	} else
	{
		if($_GET['zoeken'] == 'datum')
		{
			//echo 'datum';
			$needle = $_GET['year'];
			$query = "SELECT * FROM `artikels` WHERE `datum` LIKE '%".$needle."%'";
			//$tokens = array( ':needle' => $needle);
		} elseif ($_GET['zoeken'] == 'string') 
		{
			echo 'string';
			$needle = $_GET['string'];
			$query = "SELECT * FROM 'artikels' WHERE 'artikel' LIKE '%".$needle."%'";
			//$tokens = array( ':needle' => $needle);
		} else
		{
			$query = 'SELECT * FROM artikels';
		}
	}
	echo $query;
	$artikelsAll 	= 	$db->query( $query, $tokens );
	$artikels  		=	$artikelsAll['data'];

	var_dump($artikels);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>overzicht</title>
</head>
<body>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="GET">
		<label for="zoeken">zoeken in artikels</label><br>
		<input type="text" id="zoeken" name="string">
		<input type="submit" name="zoeken" value="string"><br>
	</form>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="get"
		<label for="year">zoeken op datum</label><br>
		<select id="year" name="year">
		  <script>
			  var myDate = new Date();
			  var year = myDate.getFullYear();
			  for(var i = 1950; i < year+1; i++){
				  document.write('<option value="'+i+'">'+i+'</option>');
			  }
		  </script>
		<input type="submit" name="zoeken" value="datum">
	</form>	
	<h1>Overzicht</h1>
	<?php 
		//var_dump($_SESSION);
		echo isset($_SESSION['notification']) ? $_SESSION['notification']['text'] : '';
		$_SESSION['notification'] = null;
	?>
	<a href="artikel-toevoegen-form.php">Artikel toevoegen</a>

	<?php foreach($artikels as $key => $artikel): ?>
		
		

		<h2><?= $artikel['titel'] ?> | <?= $artikel['datum'] ?></h2>
		<p><?= $artikel['artikel'] ?></p>
		<p><?= $artikel['kernwoord'] ?></p>

	<?php endforeach ?>



</body>
</html>