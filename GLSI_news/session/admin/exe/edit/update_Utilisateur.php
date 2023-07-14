<?php
include("../../config.php");
$ids = $_POST['id_user'];
$email_edit = $_POST['email'];
$prenom_edit = $_POST['prenom'];
$nom_edit = $_POST['nom'];

$date = date('y/m/d h:m:s');
$req = "SELECT * FROM utilisateur WHERE id_user='" . $ids . "' ";
$exe = $bdd->query($req);
$row = $exe->rowcount();


if ($row != 0) {
    ($line = $exe->FETCH(PDO::FETCH_ASSOC));
    $email = $line['email'];
    $image = $line['image'];
    if ($email == $email_edit) {
        echo "<script type='text/javascript'>
        alert('email identique');
        window.location.href='../../?page=utilisateur&c=modifier&id_user=$ids';
        </script>";
    } elseif ($email != $email_edit) {
        $req1 = "SELECT email FROM utilisateur WHERE email='" . $email_edit . "' ";
        $exe1 = $bdd->query($req1);
        $row = $exe1->rowcount();
        if ($row != 0) {
            echo "<script type='text/javascript'>
        alert('email deja existant');
        window.location.href='../../?page=utilisateur&c=&id_user=$ids';
        </script>";
            die();
        } elseif ($row == 0) {

            $cible = "../../dist/img/image/";
            $extensions = array(".png", ".jpg", ".jpeg", ".pdf", ".svg", ".gif", ".PNG", ".JPG", ".JPEG", ".PDF", ".SVG", ".GIF");
            $extension = strrchr($_FILES['image']['name'], '.');
            $nom_file = $_FILES['image']['name'];
            $taille = $_FILES['image']['size'];
            $tmp = $_FILES['image']['tmp_name'];
            if ((strstr($nom_file, ".")) != "") {
                if (!in_array($extension, $extensions)) {
                    $erreur = "L'extension non autorisé !";
                    die();
                }
                if (!isset($erreur)) {
                    // formatages du nom de fichier.
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $cible . $nom_file)) {
                        echo "<script type='text/javascript'>
                    alert('telechargement de l'image reussit');
                    window.location.href='../../?page=utilisateur';
                    </script>";
                    } else {
                        echo "<script type='text/javascript'>
            alert('echec du telechaargement de l'image');
            window.location.href='../../?page=utilisateur';
            </script>";
                    }
                } else {
                    echo "<script type='text/javascript'>
            alert('echo $erreur');
            window.location.href='../../?page=utilisateur';
            </script>";
                }
            }
            $maj = "UPDATE utilisateur SET prenom='" . $prenom_edit . "', nom='" . $nom_edit . "', image='" . $nom_file . "' WHERE id_user='" . $ids . "'";
            $exe2 = $bdd->query($maj);
            echo "<script type='text/javascript'>
                        alert('Mise à jour a été effectué');
                        window.location.href='../../?page=utilisateur&c=lister';
                        </script>";
            die();
        }
        
        if (file_exists($image)) {
            unlink("../../dist/img/image/$image");
        }
    }
} elseif ($row == 0) {
    echo "<script type='text/javascript'>
        alert('l'enregistrement n'existe plus');
        window.location.href='../../?page=utilisateur&c=&id_user=$ids';
        </script>";
    die();
}
