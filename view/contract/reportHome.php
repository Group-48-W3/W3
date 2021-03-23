<?php 
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  // data imports
  require_once('./../../controller/contract/contractController.php');
  $con = new Contract();
  $result = $con->getAllActiveContracts();

  if(isset($_POST['basic_report'])){
    
    
    $_SESSION['rcon_name'] = $_POST['con_name'];
    $_SESSION['rstart_date'] = $_POST['report_start_date'];
    $_SESSION['rend_date'] = $_POST['report_end_date'];

    header('location: ./reportView.php');

  }

?>

<div class="container">
  <h1>Reports & Statistics</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="form-group field">
      <select class="form-field" name="con_name" id="con_name">
      <?php
        $i=0;
        while($row_quo = mysqli_fetch_array($result)) {
      ?>
      <option value="<?php echo $row_quo["con_id"];?>"><?php echo $row_quo["con_name"];?></option>
      <?php
        $i++;
        }
        if($i==0){
          echo "No results ";
        }
        ?>
      </select>
      <label for="con_name" class="form-label">Select Contract</label>
  </div>
  <div class="form-group field">
    <input type="date" class="form-field" name="report_start_date" id="start_date" required>
    <label for="report_start_date" class="form-label">Start Date</label>
  </div>
  <div class="form-group field">
    <input type="date" class="form-field" name="report_end_date" id="end_date" required>
    <label for="report_end_date" class="form-label">End Date</label>
  </div>
  <!-- selection of reports -->
  <div class="row">
    <div class="col-sm">
      <h3>Basic Reports</h3>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <button type="submit" class="btn btn-success" name="basic_report">
        <div class="card-body">
          <h1 class="card-title">Master Report</h1>
          <p class="card-text">About Contracts,Quotation,Activity</p>
        </div>
        </button>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <button type="submit" class="btn btn-success" name="storage_report">
        <div class="card-body">
          <h1 class="card-title">Storage Report</h1>
          <p class="card-text">About Inventory Details</p>
        </div>
        </button>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <button type="submit" class="btn btn-success" name="account_report">
        <div class="card-body">
          <h1 class="card-title">Account Report</h1>
          <p class="card-text">Money Inflow/Outflow (Expense/Income)</p>
        </div>
        </button>
      </div>
      <br>
    </div> 
    <div class="col-sm">
      <h3>Non Basic Reports</h3>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <button type="submit" class="btn btn-success" name="progress_report">
        <div class="card-body">
          <h1 class="card-title">Progress Report</h1>
          <p class="card-text">Select a Specific Contract to Continue</p>
        </div>
        </button>
      </div>
      <br>
      <div class="card bg-success mb-3" style="max-width: 20rem;">
        <!-- <div class="card-header">Header</div> -->
        <button type="submit" class="btn btn-success" name="employee_report">
        <div class="card-body">
          <h1 class="card-title">Employee Report</h1>
          <p class="card-text">Employee Information and Staff</p>
        </div>
        </button>
      </div>
      <br>
    </div>  
  </div>
  <!-- end of report selection -->
  </form>
</div>

<?php
  require_once('leftSidebarReport.php'); 
  require_once('footer.php'); 
?>	