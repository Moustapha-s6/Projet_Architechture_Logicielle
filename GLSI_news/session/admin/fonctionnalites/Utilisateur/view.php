<?php if (isset($_GET['id_user'])) {
  $ids = $_GET['id_user'] ?>

  <div class="content">

    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline">
          <div class="card-header bg-blue">
            <h5 class="text-white m-b-0"> Enregistrement <a href="./?page=utilisateur&c=lister" class="btn btn-success">Lister</a></h5>
          </div>


          <div class="info-box">
            <div class="table-responsive">
              <div class="pdf" style="height:1000px">
                <iframe src="./fonctionnalites/Utilisateur/fiche.php?id=<?php echo $ids ?>" frameborder=1 width="100%" height="100%">
                </iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } elseif (!isset($_GET['id_user'])) {
  echo "<script type='text/javascript'> alert ('numero inconnu');
window.location.href='../../?app=Utilisateurs&c=Lister'; </script>";
  die();
}
