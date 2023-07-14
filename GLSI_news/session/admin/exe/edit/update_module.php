<?php
include("../../config.php");
$ids = $_POST['id'];
$nom_module = $_POST['nom_module'];
$cap = $_POST['diminutif'];
$detail = trim(htmlentities($_POST['detail']));
$date = date('y/m/d h:m:s');
$req1 = "SELECT * FROM module WHERE id='" . $ids . "' ";
$ex1 = $bdd->query($req1);
$row = $ex1->rowcount();
if ($row != 0) {
    ($line = $ex1->FETCH(PDO::FETCH_ASSOC));
    $nom1 = $line['nom_module'];
    $captions = $line['diminutif'];
    if ($nom1 == $nom_module) {
        if ($cap == $captions) {
            $maj1 = "UPDATE module SET detail='" . $detail . "' WHERE id='" . $ids . "'";
            $exe2 = $bdd->query($maj1);
            echo "<script type='text/javascript'>
                        alert('Mise à jour a été effectué');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
            die();
        } elseif ($cap != $captions) {
            $ver = "SELECT * FROM module where diminutif='" . $cap . "'";
            $exe3 = $bdd->query($ver);
            $row2 = $exe3->rowcount();
            if ($row2 == 0) {
                $maj2 = "UPDATE module SET detail='" . $detail . "', diminutif='" . $cap . "' WHERE id='" . $ids . "'";
                $exe4 = $bdd->query($maj2);
                echo "<script type='text/javascript'>
                        alert('mis a jour effectué avec succees');
                        window.location.href='../../?page=categorie&c=lister';
                        </script>";
                die();
            } elseif ($row2 != 0) {
                echo "<script type='text/javascript'>
                        alert('Caption existant');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
                die();
            }
        }
    } elseif ($nom1 != $nom_module) {
        if ($cap == $captions) {
            $ver1 = "SELECT * FROM module where nom_module='" . $nom1 . "' and id <>'" . $ids . "'";
            $exe5 = $bdd->query($ver1);
            $row3 = $exe5->rowcount();
            if ($row3 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom module existant');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
                die();
            } elseif ($row3 == 0) {
                $dossier = '../../fonctionnalites/' . $nom1;
                $dossier1 = '../../fonctionnalites/' . $nom_module;
                if (is_dir($dossier)) {
                    rename($dossier, $dossier1);
                }
                $dosadd = '../../exe/add/submit_' . $nom1 . '.php';
                $dosadd1 = '../../exe/add/submit_' . $nom_module . '.php';
                if (file_exists($dosadd)) {
                    rename($dosadd, $dosadd1);
                }
                $dosedit = '../../exe/edit/edit_' . $nom1 . '.php';
                $dosedit1 = '../../exe/edit/edit_' . $nom_module . '.php';
                if (file_exists($dosedit)) {
                    rename($dosedit, $dosedit1);
                }
                $dosstate = '../../exe/state/state_' . $nom1 . '.php';
                $dosstate1 = '../../exe/state/state_' . $nom_module . '.php';
                if (file_exists($dosstate)) {
                    rename($dosstate, $dosstate1);
                }
                $dosdelete = '../../exe/delete/delete_' . $nom1 . '.php';
                $dosdelete1 = '../../exe/delete/delete_' . $nom_module . '.php';
                if (file_exists($dosdelete)) {
                    rename($dosdelete, $dosdelete1);
                }
                $texte = '<?php
                            $p=isset($_GET["c"])?$_GET["c"]:"Ajouter";
                            switch ($p)
                             {
                                   case"Ajouter":
                                       include("' . $dossier1 . './add.php");
                                       break;
                                   case"modifier":
                                       include("' . $dossier1 . './edit.php");
                                       break;
                                   case"lister":
                                       include("' . $dossier1 . './list.php");
                                       break;
                                   case"voir":
                                       include("' . $dossier1 . './view.php");
                                       break;
                                   default:
                                        include("' . $dossier1 . './404.php");
                                        break;                    
                                        
                             }
                           ?>';
                $golo = fopen($dossier1 . '/index.php', "w+"); //lw w+ force de l'ecriture comme a+ force a l'ajout
                fwrite($golo, $texte);
                fclose($golo);
                $url = "./?app" . $nom_module;
                $up = "UPDATE module SET nom_module='" . $nom_module . "', detail='" . $detail . "', diminutif='" . $cap . "' ,url='" . $url . "' , nom_dossier='" . $dossier1 . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
                die();
            }
        } elseif ($cap != $captions) {
            $ver2 = "SELECT * FROM module where diminutif='" . $captions . "' and id <>'" . $ids . "'";
            $exe6 = $bdd->query($ver2);
            $row4 = $exe6->rowcount();
            if ($row4 != 0) {
                echo "<script type='text/javascript'>
                        alert('nom module existant');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
                die();
            } elseif ($row4 == 0) {
                $dossier = '../../fonctionnalites/' . $nom1;
                $dossier1 = '../../fonctionnalites/' . $nom_module;
                if (is_dir($dossier)) {
                    rename($dossier, $dossier1);
                }
                $dosadd = '../../exe/add/submit_' . $nom1 . '.php';
                $dosadd1 = '../../exe/add/submit_' . $nom_module . '.php';
                if (file_exists($dosadd)) {
                    rename($dosadd, $dosadd1);
                }
                $dosedit = '../../exe/edit/edit_' . $nom1 . '.php';
                $dosedit1 = '../../exe/edit/edit_' . $nom_module . '.php';
                if (file_exists($dosedit)) {
                    rename($dosedit, $dosedit1);
                }
                $dosstate = '../../exe/state/state_' . $nom1 . '.php';
                $dosstate1 = '../../exe/state/state_' . $nom_module . '.php';
                if (file_exists($dosstate)) {
                    rename($dosstate, $dosstate1);
                }
                $dosdelete = '../../exe/delete/delete_' . $nom1 . '.php';
                $dosdelete1 = '../../exe/delete/delete_' . $nom_module . '.php';
                if (file_exists($dosdelete)) {
                    rename($dosdelete, $dosdelete1);
                }
                $texte = '<?php
                            $p=isset($_GET["c"])?$_GET["c"]:"Ajouter";
                            switch ($p)
                             {
                                   case"Ajouter":
                                       include("' . $dossier1 . './add.php");
                                       break;
                                   case"modifier":
                                       include("' . $dossier1 . './edit.php");
                                       break;
                                   case"lister":
                                       include("' . $dossier1 . './list.php");
                                       break;
                                   case"voir":
                                       include("' . $dossier1 . './view.php");
                                       break;
                                   default:
                                        include("' . $dossier1 . './404.php");
                                        break;                    
                                        
                             }
                           ?>';
                $golo = fopen($dossier1 . '/index.php', "w+"); //lw w+ force de l'ecriture comme a+ force a l'ajout
                fwrite($golo, $texte);
                fclose($golo);
                $url = "./?app" . $nom_module;
                $up = "UPDATE module SET nom_module='" . $nom_module . "', detail='" . $detail . "', diminutif='" . $cap . "' ,url='" . $url . "' , nom_dossier='" . $dossier1 . "' WHERE id='" . $ids . "'";
                $exe10 = $bdd->query($up);
                echo "<script type='text/javascript'>
                        alert('mise a jour effectue');
                        window.location.href='../../?page=module&c=lister';
                        </script>";
                die();
            }
        }
    }
} elseif ($row == 0) {
    echo "<script type='text/javascript'>
        alert('l'enregistrement n'existe plus');
        window.location.href='../../?page=module&c=lister';
        </script>";
    die();
}
