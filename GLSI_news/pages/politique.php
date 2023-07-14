<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../asset/css/style.css">
</head>
<body style="background-image: url('../asset/img/politique.jpeg');background-repeat: no-repeat; background-size: cover;">
	<header>
		<div id="entete">
			<div class="entete">
				<h1>ACTUALITES POLYTECHNICIENNES</h1>
			</div>
			
		</div>
		
	</header>

	<h2> POLITIQUE </h2>

	<?php
			$serveur='localhost';
			$login='root';
			$password='';
			$db='mglsi';
			$connexion = @mysqli_connect($serveur, $login, $password, $db) or die("Erreur de connexion vers la base de données");

			mysqli_set_charset($connexion, "utf8");

			$request = 'SELECT * FROM article where categorie="4"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");

			while ($ligne = mysqli_fetch_array($response))
			{
				echo '<div class="actu"><a><h4 class="title" style="text-align: center;">'.$ligne['titre'].'</h4></a>';
				echo '<p class="description">'.$ligne['contenuComplet'].'..</p>';
				echo '<p class="date">'.$ligne['dateCreation'].'</p></div><br>';
			}

			mysqli_close($connexion);
		
		?>
</body>
</html>