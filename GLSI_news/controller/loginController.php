<?php 
session_start(); 
include "../connexion_db/conn_db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: ../login.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: ../login.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM utilisateur WHERE email='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $uname && $row['password'] === $pass && $row['titre'] === 'visiteur') {
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['id_user'] = $row['id_user'];
                header("Location: ../session/visiteur/index.php");
                exit();
            }else if ($row['email'] === $uname && $row['password'] === $pass && $row['titre'] === 'editeur') {
                $_SESSION['email'] = $row['email'];
                $_SESSION['prenom'] = $row['prenom'];
                $_SESSION['nom'] = $row['nom'];
                $_SESSION['id_user'] = $row['id_user'];
                header("Location: ../session/editeur/index.php");
                exit();
            }else{
                header("Location: ../login.php?error=Incorect User name or password");
                exit();
            }
        }
    
    }
}