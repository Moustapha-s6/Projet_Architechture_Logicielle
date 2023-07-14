<?php
include("../../config.php");
$ids = $_POST['id'];
$nom_prod = $_POST['nom_prod'];
$prix = $_POST['prix_unit'];
$detail = trim(htmlentities($_POST['detail']));

$req1 = "SELECT * FROM produit WHERE id='" . $ids . "' ";
$ex1 = $bdd->query($req1);
$row = $ex1->rowcount();
if ($row != 0) {
    ($line = $ex1->FETCH(PDO::FETCH_ASSOC));
    $nom1 = $line['nom_prod'];
    $prix_unit = $line['prix_unit'];
    if ($nom1 == $nom_prod) {
        if ($prix == $prix_unit) {
            $maj1 = "UPDATE produit SET detail='" . $detail . "' WHERE id='" . $ids . "'";
            $exe2 = $bdd->query($maj1);
            echo "<script type='text/javascript'>
                        alert('Mise à jour a été effectué');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
            die();
        } elseif ($prix != $prix_unit) {
            $ver = "SELECT * FROM produit where prix_unit='" . $prix . "'";
            $exe3 = $bdd->query($ver);
            $row2 = $exe3->rowcount();
            if ($row2 == 0) {
                $maj2 = "UPDATE produit SET detail='" . $detail . "', prix_unit='" . $prix . "' WHERE id='" . $ids . "'";
                $exe4 = $bdd->query($maj2);
                echo "<script type='text/javascript'>
                        alert('mis a jour effectué avec succees');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            } elseif ($row2 != 0) {
                echo "<script type='text/javascript'>
                        alert('Caption existant');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            }
        }
    } elseif ($nom1 != $nom_prod) {
        if ($prix == $prix_unit) {
            $ver1 = "SELECT * FROM produit where nom_prod='" . $nom1 . "' and id <>'" . $ids . "'";
            $exe5 = $bdd->query($ver1);
            $row3 = $exe5->rowcount();
            if ($row3 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom produit existant');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            } elseif ($row3 == 0) {

                $up = "UPDATE produit SET nom_prod='" . $nom_prod . "', detail='" . $detail . "', prix_unit='" . $prix . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            }
        } elseif ($prix != $prix_unit) {
            $ver2 = "SELECT * FROM produit where prix_unit='" . $prix_unit . "' and id <>'" . $ids . "'";
            $exe6 = $bdd->query($ver2);
            $row4 = $exe6->rowcount();
            if ($row4 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom produit existant');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            } elseif ($row4 == 0) {
                $up = "UPDATE produit SET nom_prod='" . $nom_prod . "', detail='" . $detail . "', prix_unit='" . $prix . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=produit&c=lister';
                        </script>";
                die();
            }
        }
    }
} elseif ($row == 0) {
    echo "<script type='text/javascript'>
        alert('l'enregistrement n'existe plus');
        window.location.href='../../?page=produit&c=lister';
        </script>";
    die();
}
