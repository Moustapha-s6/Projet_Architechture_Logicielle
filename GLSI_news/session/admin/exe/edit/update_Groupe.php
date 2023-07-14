<?php
include("../../config.php");
$ids = $_POST['id_groupe'];
$nom_groupe = $_POST['nom_groupe'];
$cap = $_POST['caption_groupe'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
$req1 = "SELECT * FROM groupe WHERE id_groupe='" . $ids . "' ";
$ex1 = $bdd->query($req1);
$row = $ex1->rowcount();
if ($row != 0) {
    ($line = $ex1->FETCH(PDO::FETCH_ASSOC));
    $nom1 = $line['nom_groupe'];
    $captions = $line['caption_groupe'];
    if ($nom1 == $nom_groupe) {
        if ($cap == $captions) {
            $maj1 = "UPDATE groupe SET detail='" . $detail . "' WHERE id_groupe='" . $ids . "'";
            $exe2 = $bdd->query($maj1);
            echo "<script type='text/javascript'>
                alert('Mise à jour a été effectué');
                window.location.href='../../?page=groupe&c=lister';
                </script>";
            die();
        } elseif ($cap != $captions) {
            $ver = "SELECT * FROM groupe where caption_groupe='" . $cap . "'";
            $exe3 = $bdd->query($ver);
            $row2 = $exe3->rowcount();
            if ($row2 == 0) {
                $maj2 = "UPDATE groupe SET detail='" . $detail . "', caption_groupe='" . $cap . "' WHERE id_groupe='" . $ids . "'";
                $exe4 = $bdd->query($maj2);
                echo "<script type='text/javascript'>
                    alert('mis a jour effectué avec succees');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            } elseif ($row2 != 0) {
                echo "<script type='text/javascript'>
                    alert('Caption existant');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            }
        }
    } elseif ($nom1 != $nom_groupe) {
        if ($cap == $captions) {
            $ver1 = "SELECT * FROM groupe where nom_groupe='" . $nom1 . "' and id_groupe <>'" . $ids . "'";
            $exe5 = $bdd->query($ver1);
            $row3 = $exe5->rowcount();
            if ($row3 != 0) {
                echo "<script type='text/javascript'>
                    alert('nom groupe existant');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            } elseif ($row3 == 0) {

                $up = "UPDATE groupe SET nom_groupe='" . $nom_groupe . "', detail='" . $detail . "', caption_groupe='" . $cap . "' WHERE id_groupe='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                    alert('mise a jour effectue');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            }
        } elseif ($cap != $captions) {
            $ver2 = "SELECT * FROM groupe where caption_groupe='" . $captions . "' and id_groupe <>'" . $ids . "'";
            $exe6 = $bdd->query($ver2);
            $row4 = $exe6->rowcount();
            if ($row4 != 0) {
                echo "<script type='text/javascript'>
                    alert('nom groupe existant');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            } elseif ($row4 == 0) {
                $up = "UPDATE groupe SET nom_groupe='" . $nom_groupe . "', detail='" . $detail . "', caption_groupe='" . $cap . "' WHERE id_groupe='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                    alert('mise a jour effectue');
                    window.location.href='../../?page=groupe&c=lister';
                    </script>";
                die();
            }
        }
    }
} elseif ($row == 0) {
    echo "<script type='text/javascript'>
        alert('l'enregistrement n'existe plus');
        window.location.href='../../?page=groupe&c=lister';
        </script>";
    die();
}
