<?php
	session_start();
	$_SESSION[ 'notification' ] 	= null;
	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	if(isset($_POST['submit']) && isset($_GET['artikel']))
	{
		//echo 'ja';
		$artikelId 		= 	$_GET['artikel'];
		$connection 	=	new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
		$db 			= 	new Database( $connection );

		$query			=	"UPDATE artikels 
								SET titel = :titel, artikel = :artikel, kernwoorden = :kernwoorden
								WHERE id = :artikelId";
		$tokens			=	array(	':titel'		=>	$_POST['titel'],
									':artikel'		=>	$_POST['artikel'],
									':kernwoorden'	=>	$_POST['kernwoorden'],
									':artikelId'	=>	$artikelId );
		$addSucces 		=	$db->query( $query, $tokens );

		if($addSucces)
		{
			$_SESSION[ 'notification' ][ 'type' ]	=	'success';
			$_SESSION[ 'notification' ][ 'text' ]	=	'Uw artikel werd succesvol gewijzigd';
			header('location:artikels-overzicht.php');
		} else
		{
			$_SESSION[ 'notification' ][ 'type' ]	=	'error';
			$_SESSION[ 'notification' ][ 'text' ]	=	'Er is iets misgegaan, probeer opnieuw';
			header('location:artikels-wijzigen.php');
		}
	} else 
	{
		header('location:artikels-overzicht.php');
	}
	

?>