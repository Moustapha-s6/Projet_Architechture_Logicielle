<?php include('../../config.php');

if (isset($_GET['id'])) {
    $ids = $_GET['id'];
    $requete = 'SELECT*FROM categorie WHERE id = ' . $ids . ' ';
    $exe = $bdd->query($requete);
    $nbre = $exe->rowCount();
    if ($nbre != 0) {
        $req = 'DELETE FROM categorie WHERE id=' . $ids . ' ';
        $sup = $bdd->query($req);
        echo "<script type='text/javascript'>
        alert('suppression effectuer avec succes')
        window.location.href='../../?page=categorie&c=lister';
        </script>";
        die();
    } elseif ($nbre == 0) {
        echo "<script type='text/javascript'>
        alert('La suppression n'a pas effectuee')
        window.location.href='../../?page=categorie&c=lister';
        </script>";
        die();
    }
}
