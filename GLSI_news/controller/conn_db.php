<?php
	$serveur='localhost';
	$login='root';
	$password='';
	$db='mglsi';

	$connexion = @mysqli_connect($serveur, $login, $password, $db) or die("Erreur de connexion vers la base de données");

	mysqli_set_charset($connexion, "utf8");
?>