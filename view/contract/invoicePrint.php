<?php
 session_start();
 if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
 {
   header('location:index.php?lmsg=true');
   exit;
 }		
 require_once('./../../controller/user/userController.php'); 
 require_once('./../../controller/contract/contractController.php'); 
 require_once('./header.php');
 require_once('./../../controller/contract/invoiceController.php');

// data importing
$con = new Contract();
$invoice = new Invoice();

if(!empty($_GET['invo_id']) && $_GET['invo_id']) {
	echo $_GET['invo_id'];
	$invoiceValues = mysqli_fetch_array($invoice->getInvoice($_GET['invo_id']));		
	$invoiceItems = $invoice->getInvoiceItems($_GET['invo_id']);
    
    $row = mysqli_fetch_array($invoiceItems);
    
}
$invoiceDate = date("d/M/Y", strtotime($invoiceValues['date']));

$html = '';
$html .= '
    
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="65%">
	To,<br />
	<b>RECEIVER (BILL TO)</b><br />
	Name : '.$invoiceValues['company_name'].'<br /> 
	Billing Address : '.$invoiceValues['company_name'].'<br />
	</td>
	<td width="35%">         
	Invoice No. : '.$invoiceValues['invo_id'].'<br />
	Invoice Date : '.$invoiceDate.'<br />
	</td>
	</tr>
	</table>
	<br />
	<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">Sr No.</th>
	<th align="left">Item Code</th>
	<th align="left">Item Name</th>
	<th align="left">Quantity</th>
	<th align="left">Price</th>
	<th align="left">Actual Amt.</th> 
	</tr>';
     
    $a = 0;
      
    while($invoiceItem = mysqli_fetch_array($invoiceItems)) {
        $count = 0;
        $a++;
	    $html .= '
	    <tr>
	        <td align="left">'.$a.'</td>
	        <td align="left">'.$invoiceItem["item_id"].'</td>
	        <td align="left">'.$invoiceItem["item_name"].'</td>
	        <td align="left">'.$invoiceItem["item_quantity"].'</td>
	        <td align="left">'.$invoiceItem["item_price"].'</td>
	        <td align="left">'.$invoiceItem["item_final_amount"].'</td>   
	    </tr>';
        $count++;
    }
$html .= '
	<tr>
	<td align="right" colspan="5"><b>Sub Total</b></td>
	<td align="left"><b>'.$invoiceValues['total_before_tax'].'</b></td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Tax Rate :</b></td>
	<td align="left">'.$invoiceValues['tax_per'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Tax Amount: </td>
	<td align="left">'.$invoiceValues['total_tax'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Total: </td>
	<td align="left">'.$invoiceValues['total_after_tax'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5">Amount Paid:</td>
	<td align="left">'.$invoiceValues['amount_paid'].'</td>
	</tr>
	<tr>
	<td align="right" colspan="5"><b>Amount Due:</b></td>
	<td align="left">'.$invoiceValues['amount_due'].'</td>
	</tr>';
$html .= '
	</table>
	</td>
	</tr>
	</table>';
// create pdf of invoice	
$filename = 'Invoice-'.$invoiceValues['invo_id'].'.pdf';
require_once 'dompdf/autoload.inc.php';
Dompdf\Autoloader::register();
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($filename, array("Attachment"=>0));

$output = $dompdf->output();
file_put_contents("$filename", $output);

?> 