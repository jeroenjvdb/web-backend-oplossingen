<?php
	session_start();
	$_SESSION[ 'notification' ] = null;
	setcookie("login", "", time()-10);
	$_SESSION[ 'notification' ][ 'type' ]	=	'logout';
	$_SESSION[ 'notification' ][ 'text' ]	=	'U bent succesvol uitgelogd. tot volgende keer!';
	header('location:login-form.php');
?>