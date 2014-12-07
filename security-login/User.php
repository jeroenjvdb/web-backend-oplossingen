<?php
	class User
	{
		public static function createNewUser( $dbConnection, $email, $password )
		{
			$db = new Database( $dbConnection );

			$salt				=	uniqid(mt_rand(), true);
			$saltedPw 			=	$salt . $password;

			$hashedAndSaltedPw	=	hash('sha512', $saltedPw);

			$query				=	"INSERT INTO users
											(email, salt, hashed_password, last_Login_time)
										VALUES
											(:email, :salt, :password, NOW())";
			$_SESSION['query-create']			=	$query;
			$tokens				=	array(	':email'		=> 	$email,
											':salt'			=>	$salt,
											':password'		=>	$hashedAndSaltedPw);

			$addSuccess 		=	$db->query( $query, $tokens );

			self::createCookie( $email, $salt );


		}

		public  function createCookie( $email, $salt )
		{
			$hashedEmail		=	hash('sha512', $salt . $email);
			$cookievalue		=	$email . "," . $hashedEmail;

			setcookie('login', $cookievalue, time()+60*60*24*30);

			header('location:dashboard.php');
		}
	}
?>