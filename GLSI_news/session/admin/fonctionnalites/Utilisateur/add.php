<!-- Content Header (Page header) -->
<div class="content-header sty-one">
    <h1><?php echo $p ?></h1>
    <ol class="breadcrumb">
        <li><a href="./">Home</a></li>
        <li class="sub-bread"><i class="fa fa-angle-right"></i> <?php echo $p ?></li>
        <li><i class="fa fa-angle-right"></i> <?php echo $c ?></li>
    </ol>
</div>
<!-- Main content -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline">
                <div class="card-header bg-primary">
                    <h5 class="text-white m-b-0">Ajouter un utilisateur
                        <a href="./?page=utilisateur&c=lister" class="btn btn-success pull-right"><i class="fa fa-tasks"></i> Lister </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form action="./exe/add/submit_Utilisateur.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prenom: </label>
                            <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="Prenom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom : </label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email: </label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">mot de passe : </label>
                            <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">mot de passe : </label>
                            <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1" placeholder="confirmer le mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">image : </label>
                            <input type="file" name="image" class="form-control" id="">
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
                        <button type="submit" class="btn btn-success "><i class="fa fa-floppy-o"></i> Enregistré </button>
                        <button type="reset" class="btn btn-danger "><i class="fa fa-remove"></i> Effacer </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->