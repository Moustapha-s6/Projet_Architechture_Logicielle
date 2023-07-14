<?php include("../../config.php");
$nom_cat = $_POST['nom_cat'];
$captions = $_POST['captions'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
if (empty($_POST['nom_cat']) or empty($_POST['captions'])) {
    echo "<script type='text/javascript'>
alert('un des champs est vide');
window.location.href='../../?page=categorie';
</script>";
    exit(1);
} elseif (!empty($_POST['nom_cat']) && !empty($_POST['captions'])) {
    $req = "SELECT nom_cat,captions from categorie where nom_cat='" . $nom_cat . "' or captions='" . $captions . "'";
    //var_dump($bdd); die();
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
alert('nom categorie ou caption existant');
window.location.href='../../?page=categorie';
</script>";
        exit(1);
    } elseif ($nbre == 0) {      
        $etat = 0;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO categorie(id,nom_cat,captions,detail,date_enreg,etat,deletable)
VALUES(:id,:nom_cat,:captions,:detail,:date_enreg,:etat,:deletable)');
        $sql->bindValue('id', '', PDO::PARAM_INT);
        $sql->bindValue('nom_cat', $nom_cat, PDO::PARAM_STR);
        $sql->bindValue('captions', $captions, PDO::PARAM_STR);
        $sql->bindValue('detail', $detail, PDO::PARAM_STR);
        $sql->bindValue('date_enreg', $date);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
alert('Enregistrement reussie');
window.location.href='../../?page=categorie';
</script>";
        die();
    }
}
