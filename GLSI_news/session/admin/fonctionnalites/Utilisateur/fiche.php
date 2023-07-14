<?php include("../../config.php");
include("../../pdf/fpdf.php");

  $ids = $_GET['id'];
  $prenom = "";
  $nom = "";
  $groupe = "";
  $email = "";
  $date = "";
  $image = "";

  $requete = "SELECT * FROM utilisateur WHERE id_user='".$ids."'";
  $exe = $bdd->query($requete);
  $nbre = $exe->rowCount();
  if ($nbre != 0) {
    ($line = $exe->FETCH(PDO::FETCH_ASSOC));
      extract($line);
      $image = $line['image'];
      $prenom = $line['prenom'];
      $nom = $line['nom'];
      $email = $line['email'];
      $date = $line['date_enreg'];
  }
      class PDF extends FPDF
      {

        // entete
        function Header()
        {
          $this->Setfont('Arial', 'B', 20);
          $this->Cell(180, 6, "Information de l'utilisateur", 0, 0, "C");
          $this->Ln(20);
          $this->Setfont('Arial', 'B', 15);
        }
        // Pied  de page
        function Footer()
        {
        }
      }
      $pdf = new PDF();
      $pdf->AddPage();
      if ($image != "") {
        $pdf->Image("../../dist/img/image/$image",10,20, 50, 60);
      } elseif ($image == "") {
        $pdf->Image("../../dist/img/image/default.jpg", 10,20, 50, 60);
      }
      $pdf->Ln(50);
      $pdf->Cell(65, 6, "Prenom : ", 0, 0, '');
      $pdf->Cell(120, 6, $prenom, 0, 0, '');
      $pdf->Ln();
      $pdf->Cell(65, 6, "Nom  : ", 0, 0, '');
      $pdf->Cell(120, 6, $nom, 0, 0, '');
      $pdf->Ln();
      $pdf->Cell(65, 6, "Email  : ", 0, 0, '');
      $pdf->Cell(120, 6, $email, 0, 0, '');
      $pdf->Ln();
      $pdf->Cell(65, 6, "Date enregistrement  : ", 0, 0, '');
      $pdf->Cell(120, 6, $date, 0, 0, '');
      $pdf->Ln();
      $pdf->Output();
    
  

