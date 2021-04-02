<?php
session_start();

if (!isset($_SESSION['u_id'], $_SESSION['r_id'])) {
  header('location:index.php?lmsg=true');
  exit;
}

require_once('../../controller/user/userController.php');
require_once('../../controller/inventory/rawMaterialController.php');
require_once('../../controller/inventory/supplierController.php');
$rawMaterial = new RawMaterial();
$supplier = new Supplier();
require_once('header.php');

$material = $_SESSION['replenishMaterialId'];
$amount = $_SESSION['replenishMaterialAmount'];
$unitPrice = $_SESSION['replenishUnitPrice'];
$supplierID = $_SESSION['replenishSupplier'];
$expire = $_SESSION['replenishPeriod'];
$delivery = $_SESSION['replenishDelivery'];

$supplierResult = $supplier->getSupplier($supplierID);
$supplierDetails = mysqli_fetch_array($supplierResult);

if(isset($_POST['goodrn'])){
      //$to_email = $_POST['supemail'];
      $to_email = "udaraweerasinghe968@gmail.com";
			$subject = "Good Receive Note";
			$body =  "<h1>Good Recieve Note</h1>";
			$headers = "From: w3contracts@gmail.com";
			
			$sendMail = mail($to_email, $subject, $body, $headers);
}

?>


<div id="grn" class="container center" style="border: 1px solid; padding-right:2.5rem;">
  <p>
    <i>W3 Contracts - Willorawatte, Moratuwa</i>
    <br><i>011-2265748 / 071-2554698</i>
  </p>
  <h1>Good Recieve Note</h1>

  <div class="container">
    <hr>
    <h2 class="left">Supplier Details</h2>
    <div class="row">
      <div class="col">
        <div class="left">
          <p>Supplier : <i><?php echo $supplierDetails['sup-name'] ?></i></p>
        </div>
      </div>
      <div class="col">
        <div class="right">
          <p>Address : <i><?php echo $supplierDetails['sup-address'] ?></i></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="left">
          <p>Email : <i><?php echo $supplierDetails['sup-email'] ?></i></p>
        </div>
      </div>
      <div class="col">
        <div class="right">
          <p>Contact : <i><?php echo $supplierDetails['sup-mobile'] ?></i></p>
        </div>
      </div>
    </div>
    <hr>
    <h2 class="left">Item Details</h2>
    <div class="container" style="width:75%;">
      <div class="row">

        <table>
          <thead>
            <th>Item</th>
            <th>Quantity</th>
            <th>Expiry Date</th>
            <th>Unit Price</th>
            <th>Total</th>
            <th>Comment</th>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $material ?></td>
              <td><?php echo $amount ?></td>
              <td><?php echo $expire ?></td>
              <td><?php echo "Rs. " . $unitPrice ?></td>
              <td><?php echo "Rs. " . $unitPrice * $amount ?></td>
              <td>Received</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br>
    <hr>
    <h2 class="left">Delivery Details</h2>
    <div class="row">
      <div class="col">
        <div class="left">
          <p>Delivered by : <i><?php echo $delivery ?></i></p>
        </div>
      </div>
      <div class="col">
        <div class="right">
          <p>Date : <i><?php echo date('Y-m-d'); ?></i></p>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <hr>
    <h2 class="left">Signature</h2>
    <div class="row">
      <div class="col">
        <div class="left">
          <p><i><u>Rahal Weerarathne</u></i><br>Owner<br>W3 Contracts, Willorawatta</p>
        </div>
      </div>
      <div class="col">
        <div class="right">
          <p>Date : <i><?php echo date('Y-m-d'); ?></i></p>
        </div>
      </div>
    </div>
  </div>
  <!--<img src="../../public/img/goodRecieveNote.png" alt="" width="800"><br>-->

</div>
<br>
<div id="editor"></div>
<div class="center">
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <input type="hidden" name="supemail" value="<?php echo $supplierDetails['sup-email'] ?>"> 
  <button type="submit" name="goodrn" class="btn btn-primary">Send as email</button>
 </form>
  
  <button id="downloadPDF" class="btn btn-primary">Download PDF</button>
</div>

<?php
require_once('leftSidebar.php');
require_once('footer.php');
?>