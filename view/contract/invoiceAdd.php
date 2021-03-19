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

$header = "W3 Contracts Pvt Ltd";
$address = "No 131/1,Willorawatte Road, Moratuwa";
$mobile = "+94710360505";
$fax = "+94112651557";
$email = "lwwfernando@gmail.com";

if(isset($_POST['invoice_save'])){
  if(!empty($_POST['c_id']) && $_POST['c_company'] && $_POST['c_client']) {	
    $invoice->saveInvoice($_POST);
    header("location:invoicePrint.php");	
  }else{
    echo "Error on save invoice";
  }  
}


?>
<div class="container">
  <h1>Add Invoice</h1>
  <a class="btn btn-primary" href="./invoicePrint.php">View All Invoice</a>	
<div>
<!-- /////////////////////////////////////////invoice template////////////////////////////////////////// -->
<div class="container content-invoice">
	<form action="<?php echo $_SERVER['PHP_SELF']?>" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
		<div class="load-animate animated fadeInUp">
			<div class="row">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
					<h2 class="title">Invoice Template</h2>	
				</div>		    		
			</div>
			<input id="currency" type="hidden" value="$">
			<div class="row">
				<div class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
					<h3>From,</h3>
					<?php echo $header; ?><br>	
					<?php echo $address; ?><br>	
					<?php echo $mobile; ?><br>
					<?php echo $email; ?><br>
          <?php echo date("Y-m-d");?>
          	
				</div>      		
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
					<h3>To,</h3>
          <div class="form-group field">
          <!-- contract selection -->
            <select name="c_id" id="c_id" class="form-field">
              <?php
                $i=0;
                while($row = mysqli_fetch_array($con_details)) {
              ?>
                <option value="<?php echo $row["con_id"];?>"><?php echo $row["con_id"]." ".$row["con_name"];?></option>
              <?php
                $i++;
                }
                if($i==0){
                    echo "No results ";
                }
              ?>
            </select>
            <label for="c_id" class="form-label">Contract Name</label>
          </div>
					<div class="form-group">
						<input type="text" class="form-field" name="c_company" id="companyName" placeholder="Company Name" autocomplete="off">
            <label for="paymentType" class="form-label">company name</label>
					</div>
					<div class="form-group">
						<textarea class="form-field" rows="3" name="c_client" id="address" placeholder="Address"></textarea>
            <label for="paymentType" class="form-label">client name</label>
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
					<button class="btn btn-primary" id="addRows" type="button">+ Add More</button>
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-10 col-sm-6 col-md-6 col-lg-6">
					<h3>Notes: </h3>
					<div class="form-group">
						<textarea class="form-field" rows="2" name="notes" id="notes" placeholder="Your Notes"></textarea>
					</div>
					<br>
					<div class="form-group">
						<input type="hidden" value="<?php echo $_SESSION['u_id']; ?>" class="form-control" name="userId">
						<input data-loading-text="Saving Invoice..." type="submit" name="invoice_save" value="Save Invoice" class="btn btn-success">  					
					</div>
					
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<span class="form-inline">
						<div class="form-group">
							<label>Subtotal: &nbsp; LKR</label>
							<div class="input-group">
								<!-- <div class="input-group-addon currency">$</div> -->
								<input value="" type="number" class="form-field" name="subTotal" id="subTotal" placeholder="Subtotal">
							</div>
						</div>
						<div class="form-group">
							<label>Tax Rate: &nbsp; %</label>
							<div class="input-group">
								<input value="" type="number" class="form-field" name="taxRate" id="taxRate" placeholder="Tax Rate">
								<!-- <div class="input-group-addon">%</div> -->
							</div>
						</div>
						<div class="form-group">
							<label>Tax Amount: &nbsp; LKR</label>
							<div class="input-group">
								<!-- <div class="input-group-addon currency">$</div> -->
								<input value="" type="number" class="form-field" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
							</div>
						</div>							
						<div class="form-group">
							<label>Total: &nbsp; LKR</label>
							<div class="input-group">
								<!-- <div class="input-group-addon currency">$</div> -->
								<input value="" type="number" class="form-field" name="totalAftertax" id="totalAftertax" placeholder="Total">
							</div>
						</div>
						<div class="form-group">
							<label>Amount Paid: &nbsp; LKR</label>
							<div class="input-group">
								<!-- <div class="input-group-addon currency">$</div> -->
								<input value="" type="number" class="form-field" name="amountPaid" id="amountPaid" placeholder="Amount Paid">
							</div>
						</div>
						<div class="form-group">
							<label>Amount Due: &nbsp; LKR</label>
							<div class="input-group">
								<!-- <div class="input-group-addon currency">$</div> -->
								<input value="" type="number" class="form-field" name="amountDue" id="amountDue" placeholder="Amount Due">
							</div>
						</div>
					</span>
				</div>
			</div>
			<div class="clearfix"></div>		      	
		</div>
	</form>			
</div>
</div>	
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////// -->
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	