<?php
	session_start();

	if(!isset($_POST))
	{
		$_SESSION[ 'notification' ][ 'type' ]	= 'error';
		$_SESSION[ 'notification' ][ 'text' ]	= 'gelieve aan te melden';
		header('location:login-form.php');
	}
	
	//var_dump($_POST);
	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$connection 	= 	new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', 'root');
	$db 			= 	new Database( $connection );

	$query			=	'SELECT *
							FROM users
							WHERE users.email = :email';

	$userdata 		=	$db->query( $query,
										array(':email' => $_POST['email']) );
	//var_dump($userdata);

	if ($userdata['data'][0])
	{
		//echo 'bestaand emailadres';
		$password 		=	$_POST['wachtwoord'];
		$salt			=	$userdata['data'][0]['salt'];

		$newlyhashedPw	=	hash( 'sha512' , $salt.$password );

		if($newlyhashedPw == $userdata['data'][0]['hashed_password'])
		{
			$_SESSION[ 'notification' ][ 'type' ] = 'success';
			$_SESSION[ 'notification' ][ 'text' ] = 'u bent succesvol aangemeld';
			User::createCookie( $userdata['data'][0]['email'] , $salt );
		} else
		{
			$_SESSION[ 'notification' ][ 'type' ] = 'error';
			$_SESSION[ 'notification' ][ 'text' ] = 'email en/of wachtwoord fout!';
			header('location:login-form.php');
		}

	} else
	{
		$_SESSION[ 'notification' ][ 'type' ]	= 	'error';
		$_SESSION[ 'notification' ][ 'text' ] 	=	'email en/of wachtwoord fout!';
		header('location:login-form.php');
	}
?>