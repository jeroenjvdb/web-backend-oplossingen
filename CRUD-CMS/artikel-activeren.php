<?php
	session_start();
	$_SESSION[ 'notification' ] = null;
	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$artikelId = $_GET['artikel'];

	$connection = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
	$db = new dataBase( $connection );
	$tokens = array( ':artikel'	=>	$artikelId );

	$query = "SELECT *
				FROM artikels
				WHERE id = :artikel";

	$artikels = $db->query( $query , $tokens );
	//var_dump($artikels['data']);
	$toggleActive = abs($artikels['data'][0]['is_active'] - 1) ;
	//echo $toggleActive;

	$query = "UPDATE artikels
				SET
					is_active = " . $toggleActive . " 
				WHERE id = :artikel";

	//UPDATE `artikels` SET `is_active`= 0 WHERE 1
	$tokens = array( 
						':artikel'	=>	$artikelId );

	$db->query( $query, $tokens );

	header('location:artikels-overzicht.php');
?>