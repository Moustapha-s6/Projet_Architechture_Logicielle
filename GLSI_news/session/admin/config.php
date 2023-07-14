<?php
 session_start();
 try
 {
    $bdd= new PDO('mysql:host=127.0.0.1:3306;dbname=mglsi','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);     
 }
 catch(Exception $e){
    die('Erreur:'.$e->getMessage());

 }

?>