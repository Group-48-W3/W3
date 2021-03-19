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
$con_details = $con->getAllActiveContracts();

$invo_list = $invoice->getAllInvoice();
$row = mysqli_fetch_array($invo_list);

?>

<div class="container">		
	  <h2 class="title">Invoice List</h2>
	  		  
      <table id="data-table" class="table table-condensed table-striped">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Create Date</th>
            <th>Customer Name</th>
            <th>Invoice Total</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <?php		
		
        foreach($invo_list as $invoiceDetails){
			$invoiceDate = date("d/M/Y", strtotime($invoiceDetails["date"]));
            echo '
              <tr>
                <td>'.$invoiceDetails["invo_id"].'</td>
                <td>'.$invoiceDate.'</td>
                <td>'.$invoiceDetails["company_name"].'</td>
                <td>'.$invoiceDetails["total_after_tax"].'</td>
                <td><a class="btn btn-warning" href="print_invoice.php?invoice_id='.$invoiceDetails["invo_id"].'" title="Print Invoice">🖨️</a></td>
                <td><a class="btn btn-warning" href="edit_invoice.php?update_id='.$invoiceDetails["invo_id"].'"  title="Edit Invoice">🔃</a></td>
                <td><a class="btn btn-danger" href="#" id="'.$invoiceDetails["invo_id"].'" class="deleteInvoice"  title="Delete Invoice">❌</a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>

<div class="container">
    <h1>Print Invoice</h1>
    <h6>View of the printable invoice</h6>
    <img src="./../../public/img/invo.jpg" alt="Invoice">
</div>
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	