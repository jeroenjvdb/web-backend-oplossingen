<?php
	function __autoload( $classname )
	{
		require_once( "classes/" . $classname . '.php' );
	}
	$className = false;


	if(isset($_GET['controller']))
	{
		switch($_GET['controller'])
		{
			case 'bieren':
				$className = 'Bieren';
				break;
			default:
				echo 'geen bestaande klasse';
				break;
		}
	}

	if($className)
	{
		$klasse = new $className();

		if(isset($_GET['method']))
		{
			switch ($_GET['method']) {
				case 'insert':
					$klasse->insert();
					break;
				
				case 'delete':
					$klasse->delete();
					break;

				case 'update':
					$klasse->update();
					break;

				case 'overview':
					$klasse->overview();
					break;
				default :
					echo 'geen functie';
					break;
			}
		}
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index.php</title>
</head>
<body>
	<h1>index.php</h1>
	<?php var_dump($_GET) ?>
</body>
</html>