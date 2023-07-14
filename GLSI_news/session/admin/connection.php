<?php 
include("config.php");
$login = trim($_POST['login']);
$pass = trim(md5($_POST['password']));
$sql = $bdd->prepare = ("SELECT email,password, nom, prenom FROM utilisateur WHERE email= '" . $login . "' AND etat=1");
$exe = $bdd->query($sql);
$row = $exe->rowCount(); 

if($row != 0){     
    $line = $exe->fetch(PDO::FETCH_ASSOC);
    extract($line);
    $nom = $line['nom'];
    $prenom = $line['prenom'];
    $login = $line['email'];
    $password = $line['password'];
    if(strcmp($password,$pass)==0){     
        $_SESSION['root'] = $login;
        echo "<script type = 'text/javascript'>
        alert('Bonjour ! $prenom $nom Bienvenue dans votre compte');
        window.location.href='./'; 
        </script>";
        exit(1);
    }
    elseif (strcmp($password,$pass)!=0){
        echo "<script type = 'text/javascript'>
        alert('Veuillez verifier votre mot de passe.');
        window.location.href='./'; 
        </script>";
        exit(1);
    }
} 
elseif ($row==0){
    echo "<script type = 'text/javascript'>
        alert('Connection impossible !');
        window.location.href='./'; </script> ";
    exit(1);
}