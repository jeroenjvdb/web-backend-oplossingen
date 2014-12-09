<?php
	session_start();

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$artikelId 		= $_GET['artikel'];

	$connection 	= new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
	$db 			= new dataBase( $connection );
	$tokens 		= array( ':artikel'	=>	$artikelId );

	$query 			= "UPDATE artikels
						SET
							is_archived = 1 
						WHERE id = :artikel";

	$deleteSuccess 	=	$db->query( $query, $tokens );

	if($deleteSuccess)
	{
		$_SESSION['notification']['type'] = 'success';
		$_SESSION['notification']['text'] = 'het artikel werd succesvol verwijderd';
	} else 
	{
		$_SESSION['notification']['type'] = 'error';
		$_SESSION['notification']['text'] = 'er ging iets mis tijdens het verwijderen, gelieve dit opnieuw te proberen';
	}
	header('location:artikels-overzicht.php');
	
	
?>