<?php
require_once ("../../../autoload.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des articles</title>
    <link href="../../../asset/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../../../asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <!--<?php include "menu.php" ?>-->
    <?php 
                session_start();
                if(isset($_SESSION['message'])){
                    ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php

                    unset($_SESSION['message']);
                }
            ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-4" style="padding-top: 20px;">
                <a href="../index.php" class="btn btn-primary" data-toggle="modal"><i class="bx bx-exit"></i> Retour</a>
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Ajouter Article</a>
                <a href="../categorie/index.php" class="btn btn-primary" data-toggle="modal"><i class="bx bx-book-content"></i> Liste des Catégories</a>
                <a href="article_xml.php" class="btn btn-primary" data-toggle="modal"><i class="bx bx-book-content"></i> <span id="dl-xml">Export to XML</span></a>
                <a href="article_xml.php" class="btn btn-primary" data-toggle="modal"><i class="bx bx-book-content"></i> <span id="dl-json">Export to JSON</span></a>
            </div>
        </div>
    </div>
<table class="table table-bordered table-striped" style="padding-top:-20px;" id="example1">
    <h1 class="page-header text-center">Gestion des Articles</h1>
    <tr>
        <th style="text-align: center;">Modification</th>
        <th style="text-align: center;">Suppression</th>
        <th style="text-align: center;">Titre</th>
        <th style="text-align: center;">Contenu</th>
        <th style="text-align: center;">Contenu Complet</th>
        <th style="text-align: center;">Catégorie</th>
    </tr>
    <?php
    $articles = new Article();
    $lesarticles = $articles->read();
     foreach($lesarticles as $article){
       extract($article);
       echo"<tr style=''>
       <td style='text-align: center;'><a href='fiche_article.php?id=$id' class='btn btn-success btn-sm'>Editer</a></td>
       <td style='text-align: center;'><a class='btn btn-danger btn-sm' href='supprim_article.php?id=$id'
           onclick=\"return confirm('Voulez vous supprimer $titre ? Oui ou Non?');\">Supprimer</a></td>
                <td>$titre</td>
                <td>$contenu</td>
                <td>$contenuComplet</td>
                <td style='text-align: center;'>$categorie</td>
            </tr>";
      }
    ?>
</table>
<?php include('add_modal.php'); ?>
<?php 
    include("download_files.php");
  ?>
<script src="../../../asset/jquery.min.js"></script>
<script src="../../../asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
