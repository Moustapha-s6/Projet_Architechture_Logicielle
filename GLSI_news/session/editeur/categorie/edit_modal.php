<?php
require_once ("../../../autoload.php");

$id = $_GET["id"];
//creation d'une categorie
$categorie = new Categorie();
//fiche de la categorie
$fiche = $categorie->details($id);
extract($fiche);
?>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border: 2px solid ;border-radius: 5px;margin-top: 5%;">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Modifier la Catégorie</h4></center>
            </div>
            <center><div class="modal-body">
            <div class="container-fluid">
            <form method="POST" action="edit.php">
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">ID:</label>
                    </div><br>
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label" style="position:relative; top:7px;">Libellé:</label>
                    </div><br>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="libelle" value="<?php echo $libelle; ?>">
                    </div>
                </div>
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span><a href="index.php" style="text-decoration: none;"> Cancel</a></button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
            </form>
            </div><br>
            </center>
        </div>
    </div>
</div>
   