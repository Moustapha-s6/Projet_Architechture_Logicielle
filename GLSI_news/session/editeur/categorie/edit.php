<?php
require_once ("../../../autoload.php");

//Récupération des données par la méthode POST
$id=$_POST['id'];
$libelle=$_POST['libelle'];

$categorie = new Categorie();
$categorie->update($id,$libelle);

header("location:index.php");
exit();
