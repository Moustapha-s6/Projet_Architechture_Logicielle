<?php include("../../config.php");
if (isset($_GET['id'])) {
  $ids = $_GET['id'];
  $etats = "";
  $sql = "SELECT etat FROM module WHERE id='" . $ids . "' and deletable ='0'";
  $exe = $bdd->query($sql);
  $row = $exe->rowcount();
  if ($row != 0) {
    ($line = $exe->FETCH(PDO::FETCH_ASSOC));
    extract($line);
    $etat = $line['etat'];
    if ($etat == 1) {
      $etats = 0;
      $message = "module desactivé";
    } elseif ($etat == 0) {
      $etats = 1;
      $message = "module activé";
    }
    $up = "UPDATE module set etat='" . $etats . "' WHERE id='" . $ids . "' ";
    $ex = $bdd->query($up);
    echo "<script type='text/javascript'>
alert('$message');
window.location.href='../../?page=module&c=lister';
</script>";
    die();
  } elseif ($row == 0) {
    echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=module&c=lister';
</script>";
    die();
  }
} elseif (!isset($_GET['id'])) {
  echo "<script type='text/javascript'>
alert('pas d'enregistrement sur ce numero');
window.location.href='../../?page=module&c=lister';
</script>";
  die();
}
