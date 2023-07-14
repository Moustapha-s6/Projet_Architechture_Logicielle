<?php include('../../config.php');

if (isset($_GET['id_user'])) {
    $ids = $_GET['id_user'];
    $requete = 'SELECT*FROM utilisateur WHERE id_user = ' . $ids . ' ';
    $exe = $bdd->query($requete);
    $nbre = $exe->rowCount();
    if ($nbre != 0) {
        $req = 'DELETE FROM utilisateur WHERE id_user =' . $ids . ' ';
        $sup = $bdd->query($req);
        echo "<script type='text/javascript'>
        alert('suppression effectuer avec succes')
        window.location.href='../../?page=utilisateur&c=lister';
        </script>";
        die();
    } elseif ($nbre == 0) {
        echo "<script type='text/javascript'>
        alert('La suppression n'a pas effectuee')
        window.location.href='../../?page=utilisateur&c=lister';
        </script>";
        die();
    }
}
