<?php
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/contract/quotationController.php');

  if (isset($_GET['con_id'])) {
    $con = new Contract();
    $quo = new Quotation();
    $con_details = $con->getSingleActiveContract($_GET['con_id']);

    $row = mysqli_fetch_array($con_details);
    
    $client_details = $con->getSingleClient($row['c_id']);

    $row_client = mysqli_fetch_array($client_details);

    $quo_details = $quo->getAllQuotation();
  }
?>

<?php include_once('header.php'); ?>

<div class="container">
    <h2>Contract <?php echo $row["con_name"]; ?></h2>
    <h5>Description    : <?php echo $row["con_desc"]; ?></h5>
    <h5>Location       : <?php echo $row["location"]; ?></h5>
    <h5>Payment Method : <?php echo $row["payment_method"]; ?></h5>
    
    <br>
    <h3>Client Details</h3>
    <h5>Name : <?php echo $row_client["c_name"]; ?></h5>
    <h5>Company : <?php echo $row_client["c_company"]; ?></h5>
    <h5>Address : <?php echo $row_client["c_address"]; ?></h5>
    <h5>Email : <?php echo $row_client["c_email"]; ?></h5>
    <h5>Contact : <?php echo $row_client["c_mobile"]; ?></h5>

    <br>
    <hr>
    <h3>Quotation Details</h3>
    <form action="./../../controller/contract/quotationController.php">
      <div class="form-group field">
          <select name="quotation" id="quotation" class="form-field">
            <?php
              $i=0;
              while($row_quo = mysqli_fetch_array($quo_details)) {
            ?>
              <option value="<?php echo $row_quo["q_id"];?>"><?php echo $row_quo["q_name"];?></option>
            <?php
              $i++;
              }
              if($i==0){
                  echo "No results ";
              }
            ?>
          </select>
          <label for="quotation" class="form-label">Select Quotation</label>
      </div>
      <div class="form-group field">
        <input type="text" class="form-field" name="q_quantity" id="q_quantity">
        <label for="q_quantity" class="form-label">Quantity</label>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <small>Need to create a need one? click the following button</small>
            <button class="btn-secondary" href="./../../view/contract/quotationAdd.php">Quotation Gallery</button>
          </div>
          <div class="col right">
            <button type="submit" name="quotation_contract" class="btn-primary">Add Quotation</button>
          </div>
        </div>
      </div>
    </form>
    
    <br>
    <hr>
    <h3>Set Activities</h3>
    <!-- Activity Form -->
    <form method="post" action="./../../controller/contract/contractController.php">
      <div class="form-group">
        <input type="text" class="form-field" name="c_id" id="c_id">
        <label for="c_id" class="form-label">Contract Name</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-field" id="activityName" name="start_date">
        <label for="activityName" class="form-label">Activity Name</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-field" name="end_date" id="activityDescription">
        <label for="activityDescription" class="form-label">Activity Description</label>
      </div>
      <div class="form-group">
        <input type="text" class="form-field" name="location" id="activityWeight">
        <label for="activityWeight" class="form-label">Activity Weight</label>
        <small class="form-text text-muted">Weight describes the work load of the work done (Weight eg:- 2 Units put as 2)</small>
      </div>
      <div class="form-group">
        <input type="text" class="form-field" name="description" id="activityDate">  
        <label for="activityDate" class="form-label">Date</label>
      </div>
      <div class="right">
        <button type="submit" class="btn btn-primary">Add Activity</button>
      </div>
    </form>
    <br>
    <hr>
    <h3>Contract Settings</h3>
    <h5>Want to update contract?</h5>
    <!-- Update Navigation -->
    <a href="./contractUpdate.php?con_id=<?php echo $row["con_id"]; ?>" class="btn btn-warning">Update</a><br>
    <!-- Sset Inactive Navigation -->
    <h5>Want to set to inactive state contract?</h5>
    <button class="btn btn-danger">Set Inactive</button><br>
    <!-- Delete Navigation to home -->
    <h5>Want to delete this particular contract?</h5>
    <a href="./contractUpdate.php?con_id=<?php echo $row["con_id"]; ?>" class="btn btn-danger">Delete <?php echo $row["con_name"]; ?></a>
    
    
    <br>
    <br>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	