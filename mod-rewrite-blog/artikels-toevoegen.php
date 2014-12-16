<?php
	session_start();
	function __autoload( $classname )
	{
		require_once( "classes/" . $classname . '.php' );
	}

	if(isset($_POST['verzenden']))
	{
		var_dump( $_POST );
		$connection = new PDO("mysql:host=localhost;dbname=opdracht-mod-rewrite", 'root', 'root');
		$db = new Database( $connection );
		$date = date("Y-m-d", strtotime($_POST['datum']));
		$title = $_POST['title'];
		$kernwoorden = $_POST['kernwoorden'];
		$artikel = $_POST['artikel'];

		$tokens = array(':datum' => $date,
		 				':artikel'=>$artikel,
		 				':title'=>$title,
		 				':kernwoorden' =>$kernwoorden);
		
			$query = 'INSERT INTO artikels
									(titel, artikel, kernwoord, datum)
								VALUES 
									(:title, :artikel, :kernwoorden, :datum)';

			$success = $db->query( $query, $tokens );
			var_dump($success);		
		}
		
		if($success)
		{
			echo 'het is gelukt.';
			$_SESSION[ 'notification' ][ 'text' ] = 'great success';
			header('location:artikels-overzicht.php');
		} else
		{
			echo 'error';
			$_SESSION[ 'notification' ][ 'text' ] = "try again";
			header('location:artikels-toevoegen-form.php');
		}
	
?>