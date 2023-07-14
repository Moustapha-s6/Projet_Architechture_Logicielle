<?php
require_once ("../../../autoload.php");
$id = $_GET["id"];
$article = new Article();
$article->delete($id);
//Redirection
header("location:index.php");
