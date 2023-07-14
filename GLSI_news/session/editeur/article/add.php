<?php
require_once ('../../../autoload.php');
	session_start();
	if(isset($_POST['add'])){
		
		//Récupération des données par post
		$titre=$_POST['titre'];
		$contenu=$_POST['contenu'];
		$contenuComplet=$_POST['contenuComplet'];
		$categorie=$_POST['categorie'];

		$part = new Article();
		$part->create($titre,$contenu,$contenuComplet,$categorie);

		$_SESSION['message'] = 'Article parfaitement ajouté';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Remplissez les champs en premier';
		header('location: index.php');
	}

?>