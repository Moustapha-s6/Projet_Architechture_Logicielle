<?php 
session_start();

if (isset($_SESSION['id_user']) && isset($_SESSION['email']) && isset($_SESSION['prenom']) && isset($_SESSION['nom'])) {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>GLSI-News-Editeur</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../asset/img/logo2.jpg" rel="icon">
  <link href="../../asset/img/logo2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../../asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../asset/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../../asset/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../../asset/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../asset/css/session.css" rel="stylesheet">

</head>

<body style="background-image: url('../../asset/img/news.png') top center;background-size: cover;">

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../../asset/img/visiteur.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html"><?php echo $_SESSION['prenom']; ?> <?php echo $_SESSION['nom']; ?></a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          
          <!--<li><a href="patient-rdv.php"><i class="bx bx-book-content"></i> Mes Rendez-vous</a></li>-->
          <li><a href="actu.php"><i class="bx bx-book-content"></i> <span>Actualités</span></a></li>
          <li><a href="article/index.php"><i class="bx bx-book-content"></i> <span>Gestion Articles</span></a></li>
          <li><a href="categorie/index.php"><i class="bx bx-book-content"></i> <span>Gestion Catégories</span></a></li>
          <li><a href="logout.php"><i class="bx bx-exit"></i> <span>Se Déconnecter</span></a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      
      <div class="copyright">
        &copy; Copyright <strong><span>VirtalSpace</span></strong>
      </div>
      <div class="credits">
        Designed by <a href="">TraumaTeam</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../asset/vendor/jquery/jquery.min.js"></script>
  <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../../asset/vendor/php-email-form/validate.js"></script>
  <script src="../../asset/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../../asset/vendor/counterup/counterup.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../asset/vendor/venobox/venobox.min.js"></script>
  <script src="../../asset/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../../asset/vendor/typed.js/typed.min.js"></script>
  <script src="../../asset/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/js/main.js"></script>

</body>

</html>
<?php 
}else{
     header("Location: ../../login.php");
     exit();
}
 ?>