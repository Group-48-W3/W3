<?php
 session_start();
 if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
 {
   header('location:index.php?lmsg=true');
   exit;
 }		
 require_once('./../../controller/contract/contractController.php'); 
 require_once('./../../controller/contract/invoiceController.php');

// data importing
$con = new Contract();
$invoice = new Invoice();

if(!empty($_GET['invo_id']) && $_GET['invo_id']) {
	//echo $_GET['invo_id'];
	$invoiceValues = mysqli_fetch_array($invoice->getInvoice($_GET['invo_id']));		
	$invoiceItems = $invoice->getInvoiceItems($_GET['invo_id']);
    
}
$invoiceDate = date("d/M/Y", strtotime($invoiceValues['date']));

require('./fpdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
// Column headings
$header = array('ID', 'Name', 'Qty', 'Unit Price','Final Amount');
// Data loading
//$data = $pdf->LoadData();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,'',0);
$pdf->Image('logo.png',91,6,30,'C');
$pdf->Ln();
$pdf->Cell(50,10,'Invoice DataSheet',0,1,'L');
$pdf->Ln();
//print table settings
//receiver address
$pdf->Cell(100,5,'Invoice To: ',0);
$pdf->Ln();
$pdf->Cell(100,5,'Name : '.$invoiceValues['company_name'],0);
$pdf->Ln();
$pdf->Cell(100,5,'Address : '.$invoiceValues['company_name'],0);
$pdf->Ln();
$pdf->Cell(100,5,'Invoice No : '.$invoiceValues['invo_id'],0);
$pdf->Ln();
$pdf->Cell(100,5,'Invoice Date : '.$invoiceDate,0);
$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$w = array(10, 65, 20, 40, 40);
// Header
for($i=0;$i<count($header);$i++){
	$pdf->Cell($w[$i],7,$header[$i],1,0,'C');
}
$pdf->Ln();

while($invoiceItem = mysqli_fetch_array($invoiceItems)){
  $pdf->Cell($w[0],7,$invoiceItem["item_id"],1,0,'C');
  $pdf->Cell($w[1],7,$invoiceItem["item_name"],1,0,'C');
  $pdf->Cell($w[2],7,$invoiceItem["item_quantity"],1,0,'C');
  $pdf->Cell($w[3],7,$invoiceItem["item_price"],1,0,'C');
  $pdf->Cell($w[4],7,$invoiceItem["item_final_amount"],1,0,'C');
  $pdf->Ln();
}
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Cell($w[1],7,'Sub total : '.$invoiceValues['total_before_tax'],0,'L');
$pdf->Ln();
$pdf->Cell($w[1],7,'Tax rate  : '.$invoiceValues['tax_per'].' %',0,'L');
$pdf->Ln();
$pdf->Cell($w[1],7,'Tax Amount : '.$invoiceValues['total_tax'],0,'L');
$pdf->Ln();
$pdf->Cell($w[1],7,'Total : '.$invoiceValues['total_after_tax'],0,'L');
$pdf->Ln();
$pdf->Cell($w[1],7,'Amount Paid : '.$invoiceValues['amount_paid'],0,'L');
$pdf->Ln();
$pdf->Cell($w[1],7,'Amount Due : '.$invoiceValues['amount_due'],0,'L');
$pdf->Ln();
//$pdf->ImprovedTable($header,$data);
$pdf->Output();

?> 