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


<div class="container content-invoice">
<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
<div class="load-animate animated fadeInUp">
<div class="row">
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<h1 class="title">PHP Invoice System</h1>
<?php include('menu.php');?>
</div>
</div>
<input id="currency" type="hidden" value="$">
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<h3>From,</h3>
<?php echo $_SESSION['user']; ?><br>
<?php echo $_SESSION['address']; ?><br>
<?php echo $_SESSION['mobile']; ?><br>
<?php echo $_SESSION['email']; ?><br>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
<h3>To,</h3>
<div class="form-group">
<input value="<?php echo $invoiceValues['order_receiver_name']; ?>" type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
</div>
<div class="form-group">
<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"><?php echo $invoiceValues['order_receiver_address']; ?></textarea>
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
<?php
$count = 0;
foreach($invoiceItems as $invoiceItem){
$count++;
?>
<tr>
<td><input class="itemRow" type="checkbox"></td>
<td><input type="text" value="<?php echo $invoiceItem["item_code"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
<td><input type="text" value="<?php echo $invoiceItem["item_name"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
<td><input type="number" value="<?php echo $invoiceItem["order_item_quantity"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control quantity" autocomplete="off"></td>
<td><input type="number" value="<?php echo $invoiceItem["order_item_price"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control price" autocomplete="off"></td>
<td><input type="number" value="<?php echo $invoiceItem["order_item_final_amount"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control total" autocomplete="off"></td>
<input type="hidden" value="<?php echo $invoiceItem['order_item_id']; ?>" class="form-control" name="itemId[]">
</tr>
<?php } ?>
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
<textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Your Notes"><?php echo $invoiceValues['note']; ?></textarea>
</div>
<br>
<div class="form-group">
<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
<input type="hidden" value="<?php echo $invoiceValues['order_id']; ?>" class="form-control" name="invoiceId" id="invoiceId">
<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Save Invoice" class="btn btn-success submit_btn invoice-save-btm">
</div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
<span class="form-inline">
<div class="form-group">
<label>Subtotal:  </label>
<div class="input-group">
<div class="input-group-addon currency">$</div>
<input value="<?php echo $invoiceValues['order_total_before_tax']; ?>" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
</div>
</div>
<div class="form-group">
<label>Tax Rate:  </label>
<div class="input-group">
<input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
<div class="input-group-addon">%</div>
</div>
</div>
<div class="form-group">
<label>Tax Amount:  </label>
<div class="input-group">
<div class="input-group-addon currency">$</div>
<input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
</div>
</div>
<div class="form-group">
<label>Total:  </label>
<div class="input-group">
<div class="input-group-addon currency">$</div>
<input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
</div>
</div>
<div class="form-group">
<label>Amount Paid:  </label>
<div class="input-group">
<div class="input-group-addon currency">$</div>
<input value="<?php echo $invoiceValues['order_amount_paid']; ?>" type="number" class="form-control" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
</div>
</div>
<div class="form-group">
<label>Amount Due:  </label>
<div class="input-group">
<div class="input-group-addon currency">$</div>
<input value="<?php echo $invoiceValues['order_total_amount_due']; ?>" type="number" class="form-control" name="amountDue" id="amountDue" placeholder="Amount Due">
</div>
</div>
</span>
</div>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
