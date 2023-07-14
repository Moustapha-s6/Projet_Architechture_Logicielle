<?php
$p = isset($_GET['page']) ? $_GET['page'] : "dashboard";
switch ($p) {
    case "dashboard":
        include("./pages/main.php");
        break;
    case "utilisateur":
        include("./fonctionnalites/Utilisateur/index.php");
        break;
    default:
        include("./404.php");
        break;
}
