<!DOCTYPE html>
<!-- Layout : structure générale de mon application, càd le cadre -->
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1><?php echo $title; ?></h1>
		<?php echo $content; ?>
	</body>
</html>