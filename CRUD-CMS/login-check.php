<?php
	session_start();
	$loggedIn = false;
	$email;


	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	if(!isset($_COOKIE['login']))
	{
		header('location:login-form.php');
	} else 
	{
		$cookieData 	= 	explode(',', $_COOKIE['login']);
		$email 			= $cookieData[0];
		$hashedEmail 	= $cookieData[1];
		//var_dump($cookieData);
		$connection 	= 	new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
		$db 			=	new Database( $connection );

		$query			=	"SELECT salt
								FROM users
								WHERE users.email = :email";

		$userdata		=	$db->query($query,
										array(':email' => $email));
		//var_dump($userdata);
		$salt 			= 	$userdata['data'][0]['salt'];
		$newlyHashed	=	hash( 'sha512', $salt.$email );
		if ($newlyHashed == $hashedEmail)
		{
			$loggedIn = true;
		} else
		{
			setcookie('login', '', time()-10);
			header('location:login-form.php');
		}

	}
?>