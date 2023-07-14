<?php include("./config.php");
$email = $_POST['email'];
$req = "SELECT email FROM utilisateur WHERE email='" . $email . "'";
$exe = $bdd->query($req);
$nbre = $exe->rowcount();
if ($nbre == 0) {
    echo "<script type='text/javascript'>
        alert('Email introuvable');
        window.location.href='./reset.php';
        </script>";
    exit(1);
} elseif ($nbre != 0) {
    $destinataire = $email;
    $dest=md5($email);
    $objet = " Reinitialisation de votre mot de passe ";
    $message = " Merci de recevoir si join le mail de  <a href='http://localhost/decoupe/backoffice/reset-pass.php?id='$dest' '>reinitialisation de votre mot de passe</a>
    </br> Ci cette demande de reinitialisation n'a pas etait effectuer par vous merci de le signaler a notre service technique 
    </br> ";
    $entetes = " From: Assistant personnel < creatorsgroup@gmail.com >";
    $entetes .= "Cc: Creators Friend < creators@gmail.com >";
    $entetes .= "Content-type: text/html; charset='iso-8859-1'; ";
    if(mail( $destinataire, $objet, $message, $entetes )){
        echo "<script type='text/javascript'>
        alert(' Vous venez de recevoir un mail de reinitialisation ');
        window.location.href='./reset.php';
        </script>";
        exit(1); 
    }
    else{
        echo "<script type='text/javascript'>
        alert(' Echec lors de l'envoie du mail. Veuillez reessayer ');
        window.location.href='./reset.php';
        </script>";
        exit(1);  
    }   
}
