<html>
	<head>
		<title>Cupon Dev</title>
	</head>
	<body>
		<?php require 'Command.class.php';
			$command = new Command($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
			echo $command->execute();
		?>
	</body>
</html>