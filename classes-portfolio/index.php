<?php
	function __autoload($className){
		include_once 'classes/' . $className . '.php';
	}

	$load = new HTMLbuilder('header.partial.php', 'body.partial.php', 'footer.partial.php');

?>