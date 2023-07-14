<?php include("../../config.php");
if (isset($_GET['id_ac'])) {
    $ids = $_GET['id_ac'];
    $etats = "";
    $sql = "SELECT etat FROM acces WHERE id_ac='" . $ids . "' and deletable ='0'";
    $exe = $bdd->query($sql);
    $row = $exe->rowcount();
    if ($row != 0) {
        ($line = $exe->FETCH(PDO::FETCH_ASSOC));
        extract($line);
        $etat = $line['etat'];
        if ($etat == 1) {
            $etats = 0;
            $message = "acces desactivé";
        } elseif ($etat == 0) {
            $etats = 1;
            $message = "acces activé";
        }
        $up = "UPDATE acces set etat='" . $etats . "' WHERE id_ac='" . $ids . "' ";
        $ex = $bdd->query($up);
        echo "<script type='text/javascript'>
alert('$message');
window.location.href='../../?page=acces&c=lister';
</script>";
        die();
    } elseif ($row == 0) {
        echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=acces&c=lister';
</script>";
        die();
    }
} elseif (!isset($_GET['id_ac'])) {
    echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=acces&c=lister';
</script>";
    die();
}
