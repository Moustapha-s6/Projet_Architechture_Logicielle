<?php
$c = isset($_GET['c']) ? $_GET['c'] : "Ajouter";
switch ($c) {
    case "Ajouter":
        include("./fonctionnalites/Utilisateur/add.php");
        break;
    case "modifier":
        include("./fonctionnalites/Utilisateur/edit.php");
        break;
    case "lister":
        include("./fonctionnalites/Utilisateur/list.php");
        break;
    case "voir":
        include("./fonctionnalites/Utilisateur/view.php");
        break;
    default:
        include("./fonctionnalites/404.php");
        break;
}
