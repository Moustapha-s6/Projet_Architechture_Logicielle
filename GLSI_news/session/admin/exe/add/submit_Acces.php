<?php include("../../config.php");
$module = $_POST['module'];
$groupe = $_POST['groupe'];
$date = date('y/m/d h:m:s');
if (empty($_POST['module'])) {
    echo "<script type='text/javascript'>
        alert('un des champs est vide');
        window.location.href='../../?page=acces';
        </script>";
    exit(1);
} elseif ( !empty($_POST['module'])) {
    $req = "SELECT * FROM acces WHERE module='" . $module . "'";
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
            alert(' ');
            window.location.href='../../?page=acces';
            </script>";
        exit(1);
    } elseif ($nbre == 0) {
        $etat = 0;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO acces(id_ac,module,groupe,date_enreg,etat,deletable)
VALUES(:id_ac,:module,:groupe,:date_enreg,:etat,:deletable)');
        $sql->bindValue('id_ac', '', PDO::PARAM_INT);
        $sql->bindValue('module', $module, PDO::PARAM_STR);
        $sql->bindValue('groupe', $groupe, PDO::PARAM_INT);
        $sql->bindValue('date_enreg', $date);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
            alert('acces ajouter avec success');
            window.location.href='../../?page=acces';
            </script>";
        die();
    }
}
