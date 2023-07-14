<?php include("../../config.php");
$nom_module = $_POST['nom_module'];
$captions = $_POST['diminutif'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
if (empty($_POST['nom_module']) or empty($_POST['diminutif'])) {
    echo "<script type='text/javascript'>
alert('un des champs est vide');
window.location.href='../../?page=module';
</script>";
    exit(1);
} elseif (!empty($_POST['nom_module']) && !empty($_POST['diminutif'])) {
    $req = "SELECT nom_module,diminutif from module where nom_module='" . $nom_module . "' or diminutif='" . $captions . "'";
    //var_dump($bdd); die();
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
alert('nom module ou caption existant');
window.location.href='../../?page=module';
</script>";
        exit(1);
    } elseif ($nbre == 0) {
        $dossier = '../../fonctionnalites/' . $nom_module;
        if (!is_dir($dossier)) {
            mkdir($dossier);
        }
        $fp = fopen($dossier . '/add.php', "a+");
        $fp = fopen($dossier . '/edit.php', "a+");
        $fp = fopen($dossier . '/index.php', "a+");
        $fp = fopen($dossier . '/view.php', "a+");
        $fp = fopen($dossier . '/list.php', "a+");
        $dosadd = '../../exe/add/';
        if (!is_dir($dosadd)) {
            mkdir($dosadd);
        }
        $fp = fopen($dosadd . '/submit_' . $nom_module . '.php', "a+");

        $dosedit = '../../exe/edit/';
        if (!is_dir($dosedit)) {
            mkdir($dosedit);
        }
        $fp = fopen($dosedit . '/update_' . $nom_module . '.php', "a+");

        $dosstate = '../../exe/state/';
        if (!is_dir($dosstate)) {
            mkdir($dosstate);
        }
        $fp = fopen($dosstate . '/state_' . $nom_module . '.php', "a+");

        $dosdelete = '../../exe/delete/';
        if (!is_dir($dosdelete)) {
            mkdir($dosdelete);
        }
        $fp = fopen($dosdelete . '/delete_' . $nom_module . '.php', "a+");
        $texte = '<?php
$c=isset($_GET["c"])?$_GET["c"]:"Ajouter";
switch ($c)
{
case"Ajouter":
include("' . $dossier . '/add.php");
break;
case"modifier":
include("' . $dossier . '/edit.php");
break;
case"lister":
include("' . $dossier . '/list.php");
break;
case"voir":
include("' . $dossier . '/view.php");
break;
default:
include("' . $dossier . '/404.php");
break;                    
}
?>';
        $fichier = fopen($dossier . '/index.php', "w+"); //lw w+ force de l'ecriture comme a+ force a l'ajout
        fwrite($fichier, $texte);
        fclose($fichier);
        $url = "./?page" . $nom_module;
        $etat = 0;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO module(id,nom_module,diminutif,detail,url,nom_dossier,date_enreg,etat,deletable)
VALUES(:id,:nom_module,:diminutif,:detail,:url,:nom_dossier,:date_enreg,:etat,:deletable)');
        $sql->bindValue('id', '', PDO::PARAM_INT);
        $sql->bindValue('nom_module', $nom_module, PDO::PARAM_STR);
        $sql->bindValue('diminutif', $captions, PDO::PARAM_STR);
        $sql->bindValue('detail', $detail, PDO::PARAM_STR);
        $sql->bindValue('url', $url, PDO::PARAM_STR);
        $sql->bindValue('nom_dossier', $dossier, PDO::PARAM_STR);
        $sql->bindValue('date_enreg', $date);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
alert('Enregistrement reussie');
window.location.href='../../?page=module';
</script>";
        die();
    }
}
