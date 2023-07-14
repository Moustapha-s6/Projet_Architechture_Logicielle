<?php
if (isset($_GET['id_user'])) {
  $nom = "";
  $prenom = "";
  $email = "";
  $groupe = "";
  $ids = $_GET['id_user'];
  $sql = "SELECT * FROM utilisateur WHERE id_user='" . $ids . "'";
  $exe = $bdd->query($sql);
  $row = $exe->rowcount();
  if ($row != 0) {
    ($line = $exe->FETCH(PDO::FETCH_ASSOC));
    extract($line);
    $nom = $line['nom'];
    $prenom = $line['prenom'];
    $email = $line['email'];
    $groupe = $line['groupe'];
  }
?>
  <!-- Content Header (Page header) -->
  <div class="content-header sty-one">
    <h1 class="text-black"><?php echo $c ?></h1>
    <ol class="breadcrumb">
      <li><a href="#">Home</a></li>
      <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $p ?></li>
      <li><i class="fa fa-angle-right"></i> <?php echo $c ?></li>
    </ol>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline">
          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0">Modifier<a href="./?page=utilisateur&c=lister" class="btn btn-success pull-right"><i class="fa fa-tasks"></i> lister </a></h5>
          </div>
          <div class="card-body">
            <form action="./exe/edit/update_Utilisateur.php" enctype="multipart/form-data" method="POST">

              <div class="form-group">
                <label for="exampleInputEmail1"> <?php if ($image != "") { ?><img src="./dist/img/image/<?php echo $image ?>" width="100" height="100">
                  <?php } elseif ($image == "") { ?><img src="./dist/img/image/default.jpg" width="100" height="100">
                  <?php } ?></label>
                <input type="file" name="image" class="form-control" id="">
              </div>
              <input type="hidden" name="id_user" value="<?php echo $ids; ?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Prenom</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $prenom; ?>" name="prenom">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom </label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $nom; ?>" name="nom">
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="emailtion" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" name="email">
              </div>
              <div class="form-group">
                <label for="Capt">Groupe : </label>
                <select class="form-control" id="" placeholder="Captions" name="groupe">
                  <?php
                  $sql = "SELECT * FROM groupe WHERE etat = 1 order by id_groupe ASC ";
                  $exe = $bdd->query($sql);
                  $row = $exe->rowCount();
                  if ($row != 0) {
                    while ($line = $exe->FETCH(PDO::FETCH_ASSOC)) {
                      extract($line);
                      $nom = $line['nom_groupe'];
                      $ids = $line['id_groupe'];
                      echo "<option value='$ids'> $nom </option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox">
                  Check me out </label>
              </div>
              <button type="submit" class="btn btn-success">Modifier</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php
} elseif (!isset($_GET['id'])) {
}
?>