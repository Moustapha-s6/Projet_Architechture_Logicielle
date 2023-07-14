<?php include("./config.php");
$ver = "SELECT * FROM utilisateur ";
$vex = $bdd->query($ver);
$vor = $vex->rowCount();
if ($vor == 0) {
  include("register.php");
} elseif ($vor != 0) {

  if (!isset($_SESSION['root'])) {
  
    include("./login.php");
  
  } elseif (isset($_SESSION['root'])) {
  
    $login = $_SESSION['root'];
    $nom = "";
    $prenom = "";
    $groupe = "";
    $sql = $bdd->prepare = ("SELECT * FROM utilisateur WHERE email= '" . $login . "'");
    $exe = $bdd->query($sql);
    $row = $exe->rowCount();
    if ($row != 0) {
      $line = $exe->fetch(PDO::FETCH_ASSOC);
      extract($line);
      $nom = $line['nom'];
      $prenom = $line['prenom'];
      $groupe = $line['groupe'];
    }
    $sql = $bdd->prepare = ("SELECT * FROM groupe WHERE id_groupe='" . $groupe . "'");
    $exe = $bdd->query($sql);
    $row = $exe->rowCount();
    if ($row != 0) {
      $line = $exe->fetch(PDO::FETCH_ASSOC);
      extract($line);
      $id = $line['id_groupe'];
    }
?>
    <!DOCTYPE html>
    <html lang="fr">
    <?php include("./pages/head.php") ?>

    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper boxed-wrapper">
        <?php include("./pages/header.php") ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include("./pages/sidebar.php") ?>
        <div class="content-wrapper">
          <!-- Content Wrapper. Contains page content -->
          <?php include("./pages/content.php") ?>
          <!-- js -->
        </div>
        <?php include("./pages/footer.php") ?>
        <?php include("./pages/js.php") ?>
    </body>

    </html>
<?php }
} ?>