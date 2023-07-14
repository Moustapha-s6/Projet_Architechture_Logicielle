<?php
require_once ('../../../autoload.php');
	session_start();
	if(isset($_POST['add'])){
		
		//Récupération des données par post
		$id=$_POST['id'];
		$libelle=$_POST['libelle'];

		$part = new Categorie();
		$part->create($id,$libelle);

		$_SESSION['message'] = 'Catégorie parfaitement ajouté';
		header('location: index.php');
	}
	else{
		$_SESSION['message'] = 'Remplissez les champs en premier';
		header('location: index.php');
	}

?>