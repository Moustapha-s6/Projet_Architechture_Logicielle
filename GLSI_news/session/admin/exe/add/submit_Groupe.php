<?php include("../../config.php");
$nom_groupe = $_POST['nom_groupe'];
$caption_groupe = $_POST['caption_groupe'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
if (empty($_POST['nom_groupe']) or empty($_POST['caption_groupe'])) {
    echo "<script type='text/javascript'>
alert('un des champs est vide');
window.location.href='../../?page=groupe';
</script>";
    exit(1);
} elseif (!empty($_POST['nom_groupe']) && !empty($_POST['caption_groupe'])) {
    $req = "SELECT nom_groupe,caption_groupe from groupe where nom_groupe='" . $nom_groupe . "' or caption_groupe='" . $caption_groupe . "'";
    //var_dump($bdd); die();
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
alert('nom groupe ou caption existant');
window.location.href='../../?page=groupe';
</script>";
        exit(1);
    } elseif ($nbre == 0) {
        $etat = 0;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO groupe(id_groupe,nom_groupe,caption_groupe,detail,date_enreg,etat,deletable)
VALUES(:id_groupe,:nom_groupe,:caption_groupe,:detail,:date_enreg,:etat,:deletable)');
        $sql->bindValue('id_groupe', '', PDO::PARAM_INT);
        $sql->bindValue('nom_groupe', $nom_groupe, PDO::PARAM_STR);
        $sql->bindValue('caption_groupe', $caption_groupe, PDO::PARAM_STR);
        $sql->bindValue('detail', $detail, PDO::PARAM_STR);
        $sql->bindValue('date_enreg', $date);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
alert('Enregistrement reussie');
window.location.href='../../?page=groupe';
</script>";
        die();
    }
}
