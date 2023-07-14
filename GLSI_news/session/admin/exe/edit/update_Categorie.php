<?php
include("../../config.php");
$ids = $_POST['id'];
$nom_cat = $_POST['nom_cat'];
$cap = $_POST['captions'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
$req1 = "SELECT * FROM categorie WHERE id='" . $ids . "' ";
$ex1 = $bdd->query($req1);
$row = $ex1->rowcount();
if ($row != 0) {
    ($line = $ex1->FETCH(PDO::FETCH_ASSOC));
    $nom1 = $line['nom_cat'];
    $captions = $line['captions'];
    if ($nom1 == $nom_cat) {
        if ($cap == $captions) {
            $maj1 = "UPDATE categorie SET detail='" . $detail . "' WHERE id='" . $ids . "'";
            $exe2 = $bdd->query($maj1);
            echo "<script type='text/javascript'>
                        alert('Mise à jour a été effectué');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
            die();
        } elseif ($cap != $captions) {
            $ver = "SELECT * FROM categorie where captions='" . $cap . "'";
            $exe3 = $bdd->query($ver);
            $row2 = $exe3->rowcount();
            if ($row2 == 0) {
                $maj2 = "UPDATE categorie SET detail='" . $detail . "', captions='" . $cap . "' WHERE id='" . $ids . "'";
                $exe4 = $bdd->query($maj2);
                echo "<script type='text/javascript'>
                        alert('mis a jour effectué avec succees');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            } elseif ($row2 != 0) {
                echo "<script type='text/javascript'>
                        alert('Caption existant');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            }
        }
    } elseif ($nom1 != $nom_cat) {
        if ($cap == $captions) {
            $ver1 = "SELECT * FROM categorie where nom_cat='" . $nom1 . "' and id <>'" . $ids . "'";
            $exe5 = $bdd->query($ver1);
            $row3 = $exe5->rowcount();
            if ($row3 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom categorie existant');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            } elseif ($row3 == 0) {              
                
                $up = "UPDATE categorie SET nom_cat='" . $nom_cat . "', detail='" . $detail . "', captions='" . $cap . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            }
        } elseif ($cap != $captions) {
            $ver2 = "SELECT * FROM categorie where captions='" . $captions . "' and id <>'" . $ids . "'";
            $exe6 = $bdd->query($ver2);
            $row4 = $exe6->rowcount();
            if ($row4 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom categorie existant');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            } elseif ($row4 == 0) {              
                $up = "UPDATE categorie SET nom_cat='" . $nom_cat . "', detail='" . $detail . "', captions='" . $cap . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            }
        }
    }
} elseif ($row == 0) {
    echo "<script type='text/javascript'>
        alert('l'enregistrement n'existe plus');
        window.location.href='../../?page=categorie&c=lister';
        </script>";
    die();
}
