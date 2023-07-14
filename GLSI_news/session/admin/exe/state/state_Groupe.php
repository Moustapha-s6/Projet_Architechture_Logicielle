<?php include("../../config.php");
if (isset($_GET['id_groupe'])) {
    $id = $_GET['id_groupe'];
    $etats = "";
    $sql = "SELECT etat FROM groupe WHERE id_groupe='" . $id . "' and deletable ='0'";
    $exe = $bdd->query($sql);
    $row = $exe->rowcount();
    if ($row != 0) {
        ($line = $exe->FETCH(PDO::FETCH_ASSOC));
        extract($line);
        $etat = $line['etat'];
        if ($etat == 1) {
            $etats = 0;
            $message = "module desactivé";
        } elseif ($etat == 0) {
            $etats = 1;
            $message = "module activé";
        }
        $up = "UPDATE groupe set etat='" . $etats . "' WHERE id_groupe='" . $id . "' ";
        $ex = $bdd->query($up);
        echo "<script type='text/javascript'>
alert('$message');
window.location.href='../../?page=groupe&c=lister';
</script>";
        die();
    } elseif ($row == 0) {
        echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=groupe&c=lister';
</script>";
        die();
    }
} elseif (!isset($_GET['id_groupe'])) {
    echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=groupe&c=lister';
</script>";
    die();
}
