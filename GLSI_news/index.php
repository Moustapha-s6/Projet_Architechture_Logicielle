<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Actualités</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body style="background-image: url('asset/img/news.png');background-size: cover;">

	<div id="entete">
		
			<h1 class="entete">ACTUALITES POLYTECHNICIENNES</h1>
		
	</div>
	<?php include "menu.php"; ?>
	
	
	<h2>Liste des articles</h2>
		<?php include "controller/myPDO.php"; ?>
		
</body>
</html>