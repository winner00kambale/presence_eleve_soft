<?php
require('fpdf/fpdf.php');
require_once'db/database.php';

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('fpdf/tutorial/entete2.jpg',2,2,206,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(30);
    // Titre
    // $this->Cell(180,10,'Titre',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Tableau simple
function BasicTable($header, $data)
{
    // En-tête
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}







// function headerTable(){
//     $this->setFont('Times','B',8);
//     $this->cell(95,10,'Section: ',1,0,'L');
//     $this->Ln();
// }


function montant(){
    include 'db/database.php';
    $this->setFont('Arial','B',10);
        $this->cell(70,6,'Noms',1,0,'L');
        $this->cell(30,6,'classe',1,0,'L');
        $this->cell(30,6,'option',1,0,'L');
        $this->cell(30,6,'annee',1,0,'L');
        $this->cell(30,6,'status',1,0,'L');
        $this->Ln();
    
    $date = $_GET['date'];
    $sql = $db->query("SELECT * FROM rapport_presenec WHERE LOGDATE=$date ");
    
    
    foreach($sql as $row){
        $this->setFont('Arial','B',8);
        $this->cell(70,10,$row['noms'],1,0,'L');
        $this->cell(30,10,$row['classe'],1,0,'L');
        $this->cell(30,10,$row['option_'],1,0,'L');
        $this->cell(30,10,$row['annee'],1,0,'L');
        $this->cell(30,10,$row['statut'],1,0,'L');
        $this->Ln();
    }
}


function viewTable(){
    $this->setFont('Arial','B',12);
}

}

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',8);
    $pdf->AddPage();
    // $pdf->headerTable();
    $pdf->montant();
    
    $pdf->viewTable();
    $pdf->Cell(0,8,'Fait a GOMA, le '.date('d-m-Y'),0,1);
    $pdf->Output();
?>