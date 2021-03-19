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
$con_details = $con->getAllActiveContracts();

?>

<div class="container">
  <h1>Invoice</h1>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <!-- Form Starts -->
        <form method="post" action="./../../controller/contract/contractController.php">
          <h3>Step 01 : Contract Details</h3>
          <div class="form-group field">
          <!-- contract selection -->
            <select name="contractname" id="contractname" class="form-field">
              <?php
                $i=0;
                while($row = mysqli_fetch_array($con_details)) {
              ?>
                <option value="<?php echo $row["con_name"];?>"><?php echo $row["con_id"]." ".$row["con_name"];?></option>
              <?php
                $i++;
                }
                if($i==0){
                    echo "No results ";
                }
              ?>
            </select>
            <label for="c_id" class="form-label">Contract Name</label>
            <small id="" class="form-text text-muted">Select the Contract Name</small>
          </div>
          <h3>Step 02 : Client Details</h3>
          <div class="form-group">
            <input type="text" class="form-field" name="" id="cName">
            <label for="cName" class="form-label">Client Name</label>
            <small id="" class="form-text text-muted">Select the client</small>
          </div>
          <h3>Step 03 : Invoice Details</h3>
          <div class="form-group">
            <input type="text" class="form-field" name="c_id" id="dateOfIssue" value="<?php echo date("Y-m-d");?>"> 
            <label for="dateOfIssue" class="form-label">Date of Issue</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" id="paymentType" name="start_date">
            <label for="paymentType" class="form-label">Payment Type</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="end_date" id="purpose">
            <label for="purpose" class="form-label">Purpose</label>  
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="end_date" id="amount">
            <label for="amount" class="form-label">Amount</label>
          </div>
          <h3>Item Details to be included:</h3>
          <div class="form-group">
            <input type="text" class="form-field" name="c_id"> 
            <label for="dateOfIssue" class="form-label">Item Name</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="start_date">
            <label for="paymentType" class="form-label">Item Description</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="end_date">
            <label for="purpose" class="form-label">quantity</label>  
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="end_date">
            <label for="amount" class="form-label">Unit Price</label>
          </div>
          <a class="btn btn-primary" href="./invoicePrint.php">Create Invoice</a>
        </form>
        <!-- Form Ends -->
      </div>
    </div>
  </div>

  <!-- Invoice List -->
  <div class="container">
    <h2 class="title">PHP Invoice System</h2>

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
      $invoice = new Invoice();
      $invoiceList = $invoice->getInvoiceList();
      foreach($invoiceList as $invoiceDetails){
      $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["order_date"]));
      echo '
      <tr>
      <td>'.$invoiceDetails["order_id"].'</td>
      <td>'.$invoiceDate.'</td>
      <td>'.$invoiceDetails["order_receiver_name"].'</td>
      <td>'.$invoiceDetails["order_total_after_tax"].'</td>
      <td><a href="print_invoice.php?invoice_id='.$invoiceDetails["order_id"].'" title="Print Invoice"><span class="glyphicon glyphicon-print"></span></a></td>
      <td><a href="edit_invoice.php?update_id='.$invoiceDetails["order_id"].'" title="Edit Invoice"><span class="glyphicon glyphicon-edit"></span></a></td>
      <td><a href="#" id="'.$invoiceDetails["order_id"].'" class="deleteInvoice" title="Delete Invoice"><span class="glyphicon glyphicon-remove"></span></a></td>
      </tr>
      ';
      }
      ?>
    </table>
  </div>
  <!-- Invoice list ends -->
  <!-- Invoice create starts -->
  
    <div class="container content-invoice">
      <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
      <div class="load-animate animated fadeInUp">
        <div class="row">
          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <h2 class="title">PHP Invoice System</h2>
            <!-- <?php include('menu.php');?> -->
          </div>
        </div>
        <input id="currency" type="hidden" value="$">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h3>From,</h3>
            <?php echo "W3 Interior Pvt Ltd,"; ?><br>
            <?php echo "No 65/16 Willorawatta, Moratuwa"; ?><br>
            <?php echo "+9423786451"; ?><br>
            <?php echo "lwdfernando@gmail.com"; ?><br>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
            <h3>To,</h3>
            
            <div class="form-group">
            <input type="text" class="form-field" name="" id="cName" autocomplete="off">
            <label for="cName" class="form-label">Client Name</label>
            </div>
            <div class="form-group">
            <input type="text" class="form-field" name="" id="cCompany" autocomplete="off">
            <label for="cName" class="form-label">Client Company</label>
            </div>
          
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-bordered table-hover" id="invoiceItem">
            <tr>
              <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
              <th width="15%">Item No</th>
              <th width="38%">Item Name</th>
              <th width="15%">Quantity</th>
              <th width="15%">Price</th>
              <th width="15%">Total</th>
            </tr>
            <tr>
              <td><input class="itemRow" type="checkbox"></td>
              <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
              <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>
              <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
              <td><input type="number" name="price[]" id="price_1" class="form-control price" autocomplete="off"></td>
              <td><input type="number" name="total[]" id="total_1" class="form-control total" autocomplete="off"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <button class="btn btn-danger delete" id="removeRows" type="button">- Delete</button>
            <button class="btn btn-success" id="addRows" type="button">+ Add More</button>
          </div>
        </div>
        <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <h3>Notes: </h3>
    <div class="form-group">
    <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"></textarea>
    </div>
    <br>
    <div class="form-group">
    <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
    <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
    </div>
    </div>
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <span class="form-inline">
    <div class="form-group">
    <label>Subtotal:  </label>
    <div class="input-group">
    <div class="input-group-addon currency">$</div>
    <input value="" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
    </div>
    </div>
    <div class="form-group">
    <label>Tax Rate:  </label>
    <div class="input-group">
    <input value="" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
    <div class="input-group-addon">%</div>
    </div>
    </div>
    <div class="form-group">
    <label>Tax Amount:  </label>
    <div class="input-group">
    <div class="input-group-addon currency">$</div>
    <input value="" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
    </div>
    </div>
    <div class="form-group">
    <label>Total:  </label>
    <div class="input-group">
    <div class="input-group-addon currency">$</div>
    <input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
    </div>
    </div>
    <div class="form-group">
    <label>Amount Paid:  </label>
    <div class="input-group">
    <div class="input-group-addon currency">$</div>
    <input value="" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
    </div>
    </div>
    <div class="form-group">
    <label>Amount Due:  </label>
    <div class="input-group">
    <div class="input-group-addon currency">$</div>
    <input value="" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
    </div>
    </div>
    </span>
    </div>
    </div>
    <div class="clearfix"></div>
    </div>
    </form>
    </div>

    
  <!-- Invoice add ends -->
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	