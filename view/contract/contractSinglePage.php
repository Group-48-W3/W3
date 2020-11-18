<?php
  session_start();
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/contract/quotationController.php');

  if (isset($_GET['con_id'])) {
    $con = new Contract();
    $quo = new Quotation();
    $_SESSION['contract_id'] = $_GET['con_id'];
    $con_details = $con->getSingleActiveContract($_SESSION['contract_id']);
    
    $row = mysqli_fetch_array($con_details);
    
    $client_details = $con->getSingleClient($row['c_id']);

    $row_client = mysqli_fetch_array($client_details);

    $quo_details = $quo->getAllQuotation();
  }

  if(isset($_POST['delete_con'])){
    $con = new Contract();
    $con->deleteContract($_SESSION['contract_id']);
  }
 
?>

<div class="container">
<div class="row">
  <div class="col-sm">
    <!-- Contract Section -->
    <h2>Contract Details</h2>
    
    <h5>Contract <?php echo $row["con_name"]; ?></h5>
    <h5>Description    : <?php echo $row["con_desc"]; ?></h5>
    <h5>Location       : <?php echo $row["location"]; ?></h5>
    <h5>Payment Method : <?php echo $row["payment_method"]; ?></h5>
    <br>
    <!-- Client Section -->
    <h2>Client Details</h2>
    <h5>Name : <?php echo $row_client["c_name"]; ?></h5>
    <h5>Company : <?php echo $row_client["c_company"]; ?></h5>
    <h5>Address : <?php echo $row_client["c_address"]; ?></h5>
    <h5>Email : <?php echo $row_client["c_email"]; ?></h5>
    <h5>Contact : <?php echo $row_client["c_mobile"]; ?></h5>

    <br>
  </div>
  <div class="col-sm">
    <h2>Progress</h2>
    <!-- Animated Progress bar -->
    <section class="row">
    <svg class="radial-progress" data-percentage="82" viewBox="0 0 80 80">
            <circle class="incomplete" cx="40" cy="40" r="35"></circle>
            <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
            <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)">82%</text>
    </svg>
      
    </section>
    <!-- Ends progress -->
  </div>
  
</div>
    
    <hr>
    <!-- Quotation details -->
    <h2>Quotation Details</h2>
    <div class="container">
      <div class="tab">
        <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'currentQuo')">Current Quotation</button>
        <button class="tablinks" onclick="openTab(event, 'addQuo')">Add Quotation</button>
      </div>
      <div id="currentQuo" class="tabcontent">
        <h3>Current Quotation</h3>
        <!-- Quotation Table -->
        <table>
          <thead>
            <tr>
              <th>Contract</th>
              <th>Name</th>
              <th>Weight</th>
              <th>Description</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td data-label="Contract">Bentota 360 Hotel</td>
            <td data-label="Name">Beach Chairs</td>
            <td data-label="Weight">3 Units</td>
            <td data-label="Description">High Comfortable Chair Model for Hotels</td>
            </tr>
          </tbody>
        </table>
        <hr>
      </div>
      <div id="addQuo" class="tabcontent">
        <h2>Add a new Quotation</h2>
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
          <button type="submit" name="quotation_contract" class="btn btn-primary">Add Quotation</button>
        </form>
        <div class="container">
          <small class="form-text text-muted">Need to create a need one? click the following button</small>
            <div class="row">
              <div class="col">
              <a class="btn btn-secondary" href="./quotationAdd.php">Quotation Gallery</a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Quotation Details ends -->
    <!-- Activity Details -->
    <h2>Activity Details</h2>
    <div class="container">
      <div class="tab">
        <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'currentActivity')">Current Activity</button>
        <button class="tablinks" onclick="openTab(event, 'addActivity')">Add Activity</button>
      </div>
      <div id="currentActivity" class="tabcontent">
        <h3>Current Activities</h3>
        <table>
            <thead>
              <tr>
                <th>Contract</th>
                <th>Name</th>
                <th>Weight</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td data-label="Contract">Bentota 360 Hotel</td>
              <td data-label="Name">Beach Chairs</td>
              <td data-label="Weight">3 Units</td>
              <td data-label="Description">High Comfortable Chair Model for Hotels</td>
              </tr>
            </tbody>
          </table>
        <hr>
      </div>
      <div id="addActivity" class="tabcontent">
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
      </div>
    </div>
    <!-- Activity Deatils ends -->
    
    <h2>Contract Settings</h2>
    <h5>Want to update contract?</h5>
    <!-- Update Navigation -->
    <a href="./contractUpdate.php?con_id=<?php echo $row["con_id"]; ?>" class="btn btn-warning">Update <?php echo $row["con_name"]; ?></a><br>
    <!-- set Inactive Navigation -->
    <h5>Want to set to inactive state contract?</h5>
    <a class="btn btn-danger" name="set_inactive">Set Inactive</a><br>
    <!-- Delete Navigation to home -->
    <h5>Want to delete this particular contract?</h5>
    <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Delete <?php echo $row["con_name"]; ?></button>
    
    <!-- Prompt -->
    <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="container">
          <h1>Delete Contract</h1>
          <p>Are you sure you want to delete your contract?</p>

          <div class="clearfix">
            <button type="button" class="btn btn-primary">Cancel</button>
            <button type="submit" name="delete_con" class="btn btn-danger">Delete</button>
          </div>
        </div>
      </form>
    </div>
    <br><br>
</div>
<?php 
 require_once('leftSidebar.php'); 
 require_once('footer.php'); 
?>