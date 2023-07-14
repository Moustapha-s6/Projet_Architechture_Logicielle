<?php include("../../config.php");
$nom_prod = $_POST['nom_prod'];
$prix = $_POST['prix_unit'];
$image = $_POST['image'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
$type_prod = $_POST['categorie'];
if (empty($_POST['nom_prod']) or empty($_POST['prix_unit'])) {
    echo "<script type='text/javascript'>
alert('un des champs est vide');
window.location.href='../../?page=produit';
</script>";
    exit(1);
} elseif (!empty($_POST['nom_prod']) && !empty($_POST['prix_unit'])) {
    $req = "SELECT nom_prod,prix_unit from produit where nom_prod='" . $nom_prod . "' or prix_unit='" . $prix . "'";
    //var_dump($bdd); die();
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
alert('produit ou caption existant');
window.location.href='../../?page=produit';
</script>";
        exit(1);
    } elseif ($nbre == 0) {

        $etat = 0;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO produit(id,nom_prod,type_prod,prix_unit,image,detail,etat,deletable)
VALUES(:id,:nom_prod,:type_prod,:prix_unit,:image,:detail,:etat,:deletable)');
        $sql->bindValue('id', '', PDO::PARAM_INT);
        $sql->bindValue('nom_prod', $nom_prod, PDO::PARAM_STR);
        $sql->bindValue('type_prod', $type_prod, PDO::PARAM_INT);
        $sql->bindValue('prix_unit', $prix, PDO::PARAM_INT);
        $sql->bindValue('image', $image, PDO::PARAM_STR);
        $sql->bindValue('detail', $detail, PDO::PARAM_STR);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
alert('Enregistrement reussie');
window.location.href='../../?page=produit';
</script>";
        die();
    }
}
