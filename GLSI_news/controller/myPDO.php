<?php
	require_once('conn_db.php');
		if (isset($_POST['Sport'])) {

			$request = 'SELECT * FROM article where categorie="1"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");
				echo '<hr><h4 id="title" class="title">Actualité Sport</h4>';
			while ($ligne = mysqli_fetch_array($response))
			{
				echo '<div class="actu"><a href="../../pages/sport.php"><h4 class="title">'.$ligne['titre'].'</h4></a>';
				echo '<p class="description">'.$ligne['contenu'].'..</p></div><br>';
			}

			mysqli_close($connexion);
		}
		if (isset($_POST['Sante'])) {

			$request = 'SELECT * FROM article where categorie="2"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");
				echo '<hr><h4 id="title" class="title">Actualité Santé</h4>';
			while ($ligne = mysqli_fetch_array($response))
			{
				echo '<div class="actu"><a href="../../pages/sante.php"><h4 class="title">'.$ligne['titre'].'</h4></a>';
				echo '<p class="description">'.$ligne['contenu'].'..</p></div><br>';
			}

			mysqli_close($connexion);
		}
		if (isset($_POST['Education'])) {

			$request = 'SELECT * FROM article where categorie="3"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");

				echo '<hr><h4 id="title" class="title">Actualité Education</h4>';

			while ($ligne = mysqli_fetch_array($response))
			{
				echo '<div class="actu"><a href="../../pages/education.php"><h4 class="title">'.$ligne['titre'].'</h4></a>';
				echo '<p class="description">'.$ligne['contenu'].'..</p></div><br>';
			}

			mysqli_close($connexion);
		}
		if (isset($_POST['Politique'])) {

			$request = 'SELECT * FROM article where categorie="4"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");

				echo '<hr><h4 id="title" class="title">Actualité Politique</h4>';

			$request = 'SELECT * FROM Article where categorie="4"';
			$response = mysqli_query($connexion, $request) or die("Erreur d'execution de la requête");

			while ($ligne = mysqli_fetch_array($response))
			{
				echo '<div class="actu"><a href="../../pages/politique.php"><h4 class="title">'.$ligne['titre'].'</h4></a>';
				echo '<p class="description">'.$ligne['contenu'].'..</p></div><br>';
			}

			mysqli_close($connexion);
		}
		?>