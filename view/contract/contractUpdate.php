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

 if (isset($_GET['con_id'])){
    $this_contract = $_GET['con_id'];
    
    $con = new Contract();
    $con_details = $con->getSingleActiveContract($_SESSION['contract_id']);
    
    $row = mysqli_fetch_array($con_details);
    $_SESSION['client_id'] = $row['c_id'];
    $client_details = $con->getSingleClient($_SESSION['client_id']);

    $row_client = mysqli_fetch_array($client_details);
 }

 // update contract validations
 if (isset($_POST['contractUpdate'])){
    $con = new Contract();
    
    $con_update = $con->updateContract($_SESSION['contract_id'],$_POST['con_name'],$_POST['con_start_date'],$_POST['con_end_date'],
    $_POST['con_location'],$_POST['con_description'],$_POST['con_payment'],
    $_SESSION['client_id'],$_POST['c_name'],$_POST['c_address'],$_POST['c_company'],$_POST['c_mobile'],$_POST['c_email']);
    
 }
 ?>

<div class="container">
   <!-- <?php echo $_SESSION['contract_id']; ?> -->
    <h2>Update Contract<?php echo " ".$row['con_name']; ?></h2>
    <!-- Contract details start -->
    <!-- Step 01 -->
    <h4>Step 01 : Update Contract Details</h4>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group field">
          <input type="text" class="form-field" name="con_name" id="con_name" value="<?php echo $row['con_name'];?>" required>
          <label for="con_name" class="form-label">Contract Name</label>
        </div>
        <div class="form-group field">
          <input type="date" class="form-field" name="con_start_date" id="con_start_date" value="<?php echo $row['startdate'];?>" required>
          <label for="con_start_date" class="form-label">Start Date</label>
        </div>
        <div class="form-group field">
          <input type="date" class="form-field" name="con_end_date" id="con_end_date" value="<?php echo $row['enddate'];?>" required>
          <label for="con_end_date" class="form-label">End Date</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="con_location" id="con_location" value="<?php echo $row['location'];?>" required>
          <label for="con_location" class="form-label">Location</label>
          <small id="" class="form-text text-muted">Provide the location by nearest main town (Location eg:- Colombo 7)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="con_description" id="con_description" value="<?php echo $row['con_desc'];?>" required>
          <label for="con_description" class="form-label">Description</label>
        </div>
        
        <div class="form-group field">
          <input type="text" class="form-field" name="con_payment" id="con_payment" value="<?php echo $row['payment_method'];?>" required>
          <label for="con_payment" class="form-label">Payment Method</label>
        </div>
        
        <!-- Step 02 -->
        <h4>Step 02 : Update Client Details</h4>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_name" id="c_name" value="<?php echo $row_client['c_name'];?>">
          <label for="c_name" class="form-label">Client Name</label>
          <small id="" class="form-text text-muted">Give a fullname name for your client in lower case (eg:- nipun fernando)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_address" id="c_address" value="<?php echo $row_client['c_address'];?>" >
          <label for="c_address" class="form-label">Client Address</label>
          <small id="" class="form-text text-muted">eg:- Reid Avenue, Colombo 7</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_company" id="c_company" value="<?php echo $row_client['c_company'];?>">
          <label for="c_company" class="form-label">Client Company</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_mobile" id="c_mobile" value="<?php echo $row_client['c_mobile'];?>">
          <label for="c_mobile" class="form-label">Client Mobile</label>
          <small class="form-text text-muted">provide mobile number +94 notation (eg:- +94123456789)</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="c_email" id="c_email" value="<?php echo $row_client['c_email'];?>">
          <label for="c_email" class="form-label">Client Email</label>
        </div> 
        <!-- Update Button to update the contract details -->
        <input type="submit" class="btn btn-warning" name="contractUpdate" value="Update Contract">
      </form>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	