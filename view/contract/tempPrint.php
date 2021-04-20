<?php
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
{
  header('location:index.php?lmsg=true');
  exit;
}
require_once('./../../controller/contract/contractController.php');		
require_once('./../../controller/contract/invoiceController.php');
// tutorial 1
// require('./fpdf/fpdf.php');

// $header = array('ID', 'Name', 'Qty', 'Unit Price','Final Amount');

// $pdf = new FPDF('P','mm','A4');
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!',1);
// $pdf->Ln();
// $pdf->Cell(50,10,'Powered by FPDF.',0,1,'C');
// $pdf->Output();

// tutorial 2
// require('./fpdf/fpdf.php');

// class PDF extends FPDF
// {
// // Page header
// function Header()
// {
//     // Logo
//     $this->Image('logo.png',10,6,30);
//     // Arial bold 15
//     $this->SetFont('Arial','B',15);
//     // Move to the right
//     $this->Cell(80);
//     // Title
//     $this->Cell(30,10,'Title',1,0,'C');
//     // Line break
//     $this->Ln(20);
// }

// // Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Page number
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }
// }

// // Instanciation of inherited class
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
// $pdf->Output();
//fpdf version
require('./fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
// Column headings
$header = array('ID', 'Name', 'Qty', 'Unit Price','Final Amount');
// Data loading
//$data = $pdf->LoadData();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'Compnay Logo',1);
$pdf->Ln();
$pdf->Cell(50,10,'Invoice DataSheet',0,1,'C');
//print table settings
$pdf->SetFont('Arial','B',10);
$w = array(30, 45, 20, 40, 40);
// Header
for($i=0;$i<count($header);$i++){
	$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
}
$pdf->Ln();
//$pdf->ImprovedTable($header,$data);
$pdf->Output();


?>