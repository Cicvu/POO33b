<?php

require('lib/fpdf.php');
require('index.php');

// On dÃ©rive la classe mÃ¨re pour dÃ©finir entÃªte et bas de page
class MON_PDF extends FPDF {

    function Header() {
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 15);
        // Titre
        $this->Cell(0, 10, 'Po32', 'B', 0, 'C');
        // Saut de ligne
        $this->Ln(20);
    }

    function Footer() {
        // Positionnement Ã  1,5 cm du bas
        $this->SetY(-15);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(0, 0, 0); // Noir
        // NumÃ©ro de page
        $this->Cell(0, 10, 'VUCIC Antoine Page ' . $this->PageNo() . '/{nb}', 'T', 0, 'C');
    }

}

// Instanciation de l'objet dÃ©rivÃ© (mode portrait)
$pdf = new MON_PDF('P');

// MetadonnÃ©es
$pdf->SetTitle('Liste des voitures avec DAO', true);
$pdf->SetAuthor('A. VUCIC', true);
$pdf->SetSubject('Liste des voitures', true);

// CrÃ©ation d'une page
$pdf->AddPage();

// DÃ©finit l'alias du nombre de pages {nb}
$pdf->AliasNbPages();

// Titre de page
$pdf->SetFont('Times', '', 24);
$pdf->SetTextColor(0, 51, 254); // bleu
$pdf->Cell(0, 20, utf8_decode("Liste des voitures avec DAO"), 0, 1, 'C');
$pdf->Ln(10);


$voitures = $voitureDAO->findAll();

foreach ($voitures as $voiture) {
    $pdf->Cell(60, 15, utf8_decode($voiture->get_id()), 0, 0, 'C', False);
    $pdf->Cell(60, 15, utf8_decode($voiture->get_marque()), 0, 0, 'C', False);
    $pdf->Cell(60, 15, utf8_decode($voiture->get_modele()), 0, 0, 'C', False);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln();
}




// GÃ©nÃ©ration du document PDF
$pdf->Output('lib/outfile/voitures.pdf', 'f');
header('Location: index.php')
?>
