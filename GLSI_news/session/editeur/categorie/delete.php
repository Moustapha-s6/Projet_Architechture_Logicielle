<?php
require_once ("../../../autoload.php");
$id = $_GET["id"];
$categorie = new Categorie();
$categorie->delete($id);
//Redirection
header("location:index.php");
