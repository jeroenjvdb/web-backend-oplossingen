<?php
	session_start();
	$_SESSION[ 'notification' ] = null;

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	var_dump($_POST);

	$connection 	=	new PDO( 'mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root' );
	$db 			=	new Database( $connection );
	$query			=	"INSERT INTO artikels
								(titel, artikel, kernwoorden, datum)
							VALUES
								(:titel, :artikel, :kernwoord, NOW())";
	$tokens 		= 	array('titel' 			=> $_POST['titel'],
								':artikel' 		=> $_POST['artikel'],
								':kernwoord'	=> $_POST['kernwoorden'],
								//':datum'		=> $_POST['datum']
								);
	$db->query( $query, $tokens );

	$_SESSION[ 'notification' ][ 'type' ]		=	'success';
	$_SESSION[ 'notification' ][ 'text' ]		=	'uw artikel werd succesvol toegevoegd';

	header('location:artikels-overzicht.php');
?>