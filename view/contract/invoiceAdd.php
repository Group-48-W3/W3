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

//  data importing
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
            <input type="text" class="form-field" name="c_id" id="dateOfIssue"> 
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
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	