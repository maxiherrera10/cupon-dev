<?php require 'Command.class.php';
	$command = new Command($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
	// http_response_code(500);
	echo $command->execute();
?>