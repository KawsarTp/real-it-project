<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',25);
    // Move to the right
     $this->SetTextColor(220,50,50);
    $this->Cell(80);
    // Title
    $this->Cell(70,10,'REAL INFORMATION TECHNOLOGY',0,0,'C');
    // Line break
    $this->Ln(20);
}

function FancyTable()
{
    $this->cell(36,5,"kawsar",1,0);
    $this->cell(36,5,"kawsar",1,0);
    $this->cell(36,5,"kawsar",1,0);
    $this->cell(36,5,"kawsar",1,0);
    $this->cell(36,5,"kawsar",1,0);
    $this->SetFont('Arial','B',20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->FancyTable();
$pdf->Output();
?>