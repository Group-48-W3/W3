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
$a = 0;
$con = new Contract();
$invoice = new Invoice();
$con_details = $con->getAllActiveContracts();

$invo_list = $invoice->getAllInvoice();
$row = mysqli_fetch_array($invo_list);

if(isset($_GET['delete_id'])){
  $id = $_GET['delete_id'];
  $invoice->deleteInvoice($id);
  //echo "perform delete".$id;
  $a = 2;
  //header('location: invoiceList.php');
}
//echo $_SERVER["DOCUMENT_ROOT"];
?>

<div class="container">
  <?php if($a == 2){?>
    <div class="alert alert-danger" style="background-color: red;">
			<a href="#" style="text-decoration: none; color: white;">Invoice Deleted successfully</a>
		</div>
  <?php }?>  
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
                <td><a class="btn btn-warning" href="invoicePrint.php?invo_id='.$invoiceDetails["invo_id"].'" title="Print Invoice">🖨️</a></td>
                <td><a class="btn btn-warning" href="invoiceUpdate.php?update_id='.$invoiceDetails["invo_id"].'"  title="Edit Invoice">🔃</a></td>
                <td><a class="btn btn-danger" href="./invoiceList.php?delete_id='.$invoiceDetails["invo_id"].'" class="deleteInvoice"  title="Delete Invoice">❌</a></td>
              </tr>
            ';
        }       
        ?>
      </table>	
</div>

<div class="container">
    <h2>Print Invoice</h2>
    <h6>View of the printable invoice</h6>
    <img src="./../../public/img/invo.jpg" alt="Invoice">
</div>
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	