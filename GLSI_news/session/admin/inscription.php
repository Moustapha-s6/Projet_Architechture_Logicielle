<?php include("./config.php");
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];
$groupe = 1;
$date = date('y/m/d h:m:s');
if (
    empty($_POST['nom'])
    or empty($_POST['prenom'])
    or empty($_POST['password'])
    or empty($_POST['confirm_password'])
    or empty($_POST['email'])
) {
    echo "<script type='text/javascript'>
        alert('un des champs est vide');
        window.location.href='./';
        </script>";
    exit(1);
} elseif (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['password'])
    && !empty($_POST['confirm_password'])
    && !empty($_POST['email'])
) {
    if ($password != $confirm_password) {
        echo "<script type='text/javascript'>
            alert('Le mot de passe est different');
            window.location.href='./';
            </script>";
        exit(1);
    }
    $req = "SELECT * FROM utilisateur WHERE email='" . $email . "'";
    $exe = $bdd->query($req);
    $nbre = $exe->rowcount();
    if ($nbre != 0) {
        echo "<script type='text/javascript'>
            alert(' ');
            window.location.href='./';
            </script>";
        exit(1);
    } elseif ($nbre == 0) {
        $_SESSION['root'] = $email;
        $etat = 1;
        $deletable = 0;
        $sql = $bdd->prepare('INSERT INTO utilisateur(id_user,nom,prenom,password,groupe,email,date_enreg,etat,deletable)
VALUES(:id_user,:nom,:prenom,:password,:groupe,:email,:date_enreg,:etat,:deletable)');
        $sql->bindValue('id_user', '', PDO::PARAM_INT);
        $sql->bindValue('nom', $nom, PDO::PARAM_STR);
        $sql->bindValue('prenom', $prenom, PDO::PARAM_STR);
        $sql->bindValue('password', md5($password), PDO::PARAM_STR);
        $sql->bindValue('groupe', $groupe, PDO::PARAM_INT);
        $sql->bindValue('email', $email, PDO::PARAM_STR);
        $sql->bindValue('date_enreg', $date);
        $sql->bindValue('etat', $etat, PDO::PARAM_INT);
        $sql->bindValue('deletable', $deletable, PDO::PARAM_INT);
        $sql->execute() or die(print_r($sql->ERRORInfo()));
        echo "<script type='text/javascript'>
            alert('Utilisateur ajouter avec success');
            window.location.href='./';
            </script>";
        die();
    }
}
