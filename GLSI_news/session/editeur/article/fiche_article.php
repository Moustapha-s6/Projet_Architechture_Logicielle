<?php
require_once ("../../../autoload.php");

$id = $_GET["id"];
//creation d'un article
$article = new Article();
//fiche du article
$fiche = $article->details($id);
extract($fiche);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulaire d'Ajout</title>
    <link rel="stylesheet" href="../../../asset/css/styleform.css">
</head>
<body>
<form method="post" action="modif_article.php">
    <h2>Formulaire d'Ajout</h2>
    <div class="field">
        <label>Titre</label>
        <input type="text" name="titre" value="<?php echo $titre ?>">
    </div>
    <div class="field">
        <label>contenu</label>
        <input type="text" name="contenu" value="<?= $contenu ?>">
    </div>
    <div class="field">
        <label>contenu Complet</label>
        <input type="text" name="contenuComplet" value="<?= $contenuComplet ?>">
    </div>
    
    <div class="field">
        <label>Catégorie</label>
        <select name="categorie">
            <option></option>
            <option value="1">Sport</option>
            <option value="2">Santé</option>
            <option value="3">Education</option>
            <option value="4">Politique</option>
        </select>
    </div>
    <div class="field">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input id="bouton" type="submit" name="bModif" value="Modifier">
    </div>
</form>
</body>
</html>
