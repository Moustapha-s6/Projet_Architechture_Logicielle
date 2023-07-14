<?php
require_once ("../../../autoload.php");

//Récupération des données par la méthode POST
$titre=$_POST['titre'];
$contenu=$_POST['contenu'];
$contenuComplet=$_POST['contenuComplet'];
$categorie=$_POST['categorie'];
$id=$_POST['id'];

$article = new Article();
$article->update($id,$titre,$contenu,$contenuComplet,$categorie);

header("location:index.php");
exit();
