<!-- Content Header (Page header) -->

<div class="content-header sty-one">
  <h1 class="text-black"><?php echo $p ?></h1>
  <ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $p ?></li>
    <li><i class="fa fa-angle-right"></i> <?php echo $c ?></li>
  </ol>
</div>
<script src="fonctionnalites/Utilisateur/table2excel.js"></script>
<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-outline">
        <div class="card-header bg-blue">
          <h5>Liste des utilisateurs
            <a href="./?page=utilisateur" class="btn btn-success pull-right">
              <i class="fa fa-plus-square"></i> Ajouter
            </a>
            <a class="btn btn-info pull-right">
              <span id="dl-json">Export to JSON</span>
            </a>
            <a class="btn btn-info pull-right">
              <span id="dl-excel">Export to Excel</span>
            </a>
            <a href="fonctionnalites/Utilisateur/user_xml.php" class="btn btn-info pull-right">
              <span id="dl-xml">Export to XML</span>
            </a>
          </h5>
          <!--<button id="dl-json">Download as JSON</button>
          <button id="dl-excel">Download as EXCEL</button>
          <button id="dl-xml"><a href="fonctionnalites/Utilisateur/user_xml.php">Download as XML</a></button>-->
        </div>
        <div class="info-box">
          <h4 class="text-black">Table</h4>
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>image</th>
                  <th>Prenom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Date enregistrement</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $requete = "SELECT * FROM utilisateur WHERE deletable='0'order by id_user ASC";
                $exe = $bdd->query($requete);
                $nbre = $exe->rowcount();
                if ($nbre != 0) {
                  while ($line = $exe->FETCH(PDO::FETCH_ASSOC)) {
                    extract($line);
                    $id = $line['id_user'];
                    $image = $line['image'];
                    $prenom = $line['prenom'];
                    $nom = $line['nom'];
                    $email = $line['email'];
                    $date = $line['date_enreg'];
                ?>
                    <tr>
                      <td> <?php if ($image != "") { ?><img src="./dist/img/image/<?php echo $image ?>" width="50" height="50">
                        <?php } elseif ($image == "") { ?><img src="./dist/img/image/default.jpg" width="50" height="50">
                        <?php } ?></td>
                      <td><?php echo $prenom ?></td>
                      <td><?php echo $nom ?> </td>
                      <td><?php echo $email ?></td>
      
                      <td> <?php echo $date ?></td>
                      <td>
                        <a href="./?page=utilisateur&c=voir&id_user=<?php echo $id; ?>" class="btn btn-success">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="./?page=utilisateur&c=modifier&id_user=<?php echo $id; ?>" class="btn btn-primary">
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href="./exe/delete/delete_Utilisateur.php?id_user=<?php echo $id; ?>" class="btn btn-danger" id="delete" onclick="return confirmer()">
                          <i class="fa fa-trash">
                            <input type="hidden" name="delete" value="<?php echo $id; ?>" class="del">
                          </i>
                        </a>
                        <a href="./exe/state/state_Utilisateur.php?id_user=<?php echo $id; ?>">
                          <?php if ($etat == 0) {
                            echo "<div class='btn btn-danger'><i class='fa fa-thumbs-down'></i></div>";
                          } elseif ($etat == 1) {
                            echo "<div class='btn btn-success'><i class='fa fa-thumbs-up'></i></div>";
                          }
                          ?>
                        </a>
                      </td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function confirmer() {
      if (confirm(" confirmez-vous la suppression"))
        return true;
      else
        return false;
    }
  </script>
  <script>
      document.getElementById('dl-excel').addEventListener('click', function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#example1"));
      });
    </script>
  <?php 
    include("download_files.php");
  ?>
</div>