<?php
	session_start();
	$_SESSION[ 'notification' ] = null;
	if(!isset($_POST))
	{
		$_SESSION[ 'notification' ][ 'type' ]	= 'error';
		$_SESSION[ 'notification' ][ 'text' ]	= 'gelieve aan te melden';
		header('location:login-form.php');
	}

	function __autoload( $classname )
	{
		require_once( $classname . '.php' );
	}

	$email;
	$password;


	if(isset($_POST['email']) && $_POST['email'] != '')
	{
		$_SESSION['email'] = $_POST['email'];
	}
	//var_dump($_POST);
	
	//var_dump($_SESSION);


	if(isset($_POST['genPass']))
	{
		generatePassword();
		header('Location:registratie-form.php');
	}

	if(isset($_POST['register']))
	{
		register();
	}
	
	
	


	function register()
	{
		$email 		=	$_POST[ 'email' ];
		$password 	=	$_POST[ 'password' ];

		$_SESSION[ 'registration' ][ 'email' ] 		=	$email;
		$_SESSION[ 'registration' ][ 'password' ]	=	$password;

		$correctEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

		if ( !$correctEmail )
		{
			$_SESSION[ 'notification' ][ 'type' ] 	= 	'error';
			$_SESSION[ 'notification' ][ 'text' ] 	= 	'dit is geen correct email adress.';

			header( 'Location:registratie-form.php' );
		} elseif ( $password == '' )
		{
			$_SESSION[ 'notification' ][ 'type' ] 	= 	'error';
			$_SESSION[ 'notification' ][ 'text' ] 	= 	'gelieve een wachtwoord in te voeren.';

			header('Location:registratie-form.php');
		} else
		{
			$dbConnection 		= 	new PDO('mysql:host=localhost;dbname=opdracht-crud-cms', 'root', 'root');
			//$db = 					new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

			$db 				=	new Database( $dbConnection );

			$checkIfExistsQuery	=	"SELECT *
										FROM users
										WHERE users.email = :email";

			$_SESSION['query']	=	$checkIfExistsQuery;
			$fetchusers			=	$db->query($checkIfExistsQuery,
													array(':email' => $email));

			echo $email;
			
			if(isset($fetchusers['data'][0]))
			{
				$_SESSION[ 'notification' ][ 'type' ]	=	'error';
				$_SESSION[ 'notification' ][ 'text' ]	=	'de gebruiker, met email adres ' . $email . ', bevindt zich reeds in het systeem';
				header('Location:registratie-form.php');
			} else
			{
				User::createNewUser( $dbConnection , $email, $password );
				$_SESSION[ 'notification' ][ 'type' ]	=	'success';
				$_SESSION[ 'notification' ][ 'text' ]	=	'u bent geregistreerd met email adres: ' . $email;
				//header('Location:dashboard.php');
			}
			
		}
	}
	function generatePassword($length)
	{
		$randomPW ="";
		$tekens = array( 	'abcdefghijklmnopqrstuvwxyz',
							'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
							'0123456789',
							'/^$*!?' );

		$pwLength = 8;
		for($i=0; $i<$pwLength;$i++)
		{
			$randomTekens = rand(0, count($tekens)-1);
			$character = rand(0, strLen($tekens[$randomTekens])-1);

			$randomPW .= $tekens[$randomTekens][$character];

		}
		//echo $randomPW;
		$_SESSION['randomPW'] = $randomPW;
	}
?>