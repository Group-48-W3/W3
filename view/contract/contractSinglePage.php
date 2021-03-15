<?php
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/contract/quotationController.php');
  require_once('./../../controller/contract/activityController.php');

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

  if(isset($_POST['add_activity'])){
    //
    $contract_id = $_SESSION['contract_id'];
    
  }

?>

<div class="container">
<h1>Contract <?php echo " ".$row["con_name"]; ?></h1>
<div class="row">
  <div class="col-sm">
    <!-- Contract Section -->
    <h2>Step 01 : Contract Details</h2>
    
    <h5>Contract :  <?php echo $row["con_name"]; ?></h5>
    <h5>Description    : <?php echo $row["con_desc"]; ?></h5>
    <h5>Location       : <?php echo $row["location"]; ?></h5>
    <h5>Payment Method : <?php echo $row["payment_method"]; ?></h5>
    <br>
    <!-- Client Section -->
    <h2>Step 02 : Client Details</h2>
    <h5>Name : <?php echo $row_client["c_name"]; ?></h5>
    <h5>Company : <?php echo $row_client["c_company"]; ?></h5>
    <h5>Address : <?php echo $row_client["c_address"]; ?></h5>
    <h5>Email : <?php echo $row_client["c_email"]; ?></h5>
    <h5>Contact : <?php echo $row_client["c_mobile"]; ?></h5>

    <br>
  </div>
  <div class="col-sm">
    <!-- Progress starts -->
    <h2>Progress Measures</h2>
    <div class="circles">
      <div class="second circle">
        <!-- <strong></strong> -->
        <b></b>
        <span><br>Overall Contracts progress</span>
      </div>
      <br>
      <div class="third circle">
        <strong></strong>
        <span><br><?php echo $row["con_name"]." "; ?>progress</span>
      </div>
    </div>
    <!-- Progress ends -->
  </div>
</div>
    
    <hr>
    <!-- Quotation details -->
    <h2>Step 03 : Quotation Details</h2>
    <div class="container">
      <div id="currentQuo">
        <h2>Current Quotation</h2>
        <!-- Quotation Table -->
        <table>
          <thead>
            <tr>
              <th>Item</th>
              <th>Description</th>
              <th>Budget</th>
              <th>Image</th>
              <th>Progress</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <td data-label="Contract"><a>Diwan #M001</a></td>
            <td data-label="Name">StairCase Model #MC10</td>
            <td data-label="Weight">150,000</td>
            <td data-label="Description"><i>Image</i></td>
            <td data-label="Progress">40%</td>
            </tr>
          </tbody>
        </table>
        <hr>
      </div>
      <div id="addQuo">
        <h2>Add a new Quotation</h2>
          <!-- Add new quotation -->
          <small class="form-text text-muted">Need to create a need one? click the following button</small>
          <div class="quotation">
          <a class="btn btn-success" href="./quotationAdd.php?quo_con_id=<?php echo $row["con_id"]; ?>">Create a new Quotation</a>
          </div>
        </div>
        </form>
    </div>
    <!-- Quotation Details ends -->
    <!-- Activity Details -->
    <h2>Step 04 : Activity Details</h2>
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
                <th>Activity</th>
                <th>Item</th>
                <th>Description</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td data-label="Name">Setup the workspace</td>
              <td data-label="Description">section 1</td>
              <td data-label="abc">High Comfortable Chair Model for Hotels</td>
              <td data-label="status">
              <input type="checkbox" id="vehicle1" name="vehicle1" checked = "checked" value="Bike">
              </td>
              </tr>
              <tr>
              <td data-label="Name">Load the machine</td>
              <td data-label="Description">section 1</td>
              <td data-label="abc">High Comfortable Chair Model for Hotels</td>
              <td data-label="status">
              <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
              </td>
              </tr>
              <tr>
              <td data-label="Name">Primary wood cutting</td>
              <td data-label="Description">wood </td>
              <td data-label="abc">High Comfortable Chair Model for Hotels</td>
              <td data-label="status">
              <input type="checkbox" id="vehicle1" name="vehicle1" checked = "checked" value="Bike">
              </td>
              </tr>
            </tbody>
          </table>
        <hr>
      </div>
      <div id="addActivity" class="tabcontent">
      <h3>Set Activities</h3>
        <!-- Activity Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          
          <div class="form-group">
            <input type="text" class="form-field" id="activityName" name="act_name">
            <label for="activityName" class="form-label">Activity Name</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="act_des" id="activityDescription">
            <label for="activityDescription" class="form-label">Activity Description</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="act_weight" id="activityWeight" value="1">
            <label for="activityWeight" class="form-label">Activity Weight</label>
            <small class="form-text text-muted">Weight describes the work load of the work done (Weight eg:- 2 Units put as 2)</small>
          </div>
          <div class="form-group">
            <input type="date" class="form-field" name="act_date" id="activityDate">  
            <label for="activityDate" class="form-label">Date</label>
          </div>
          <div class="right">
            <button type="submit" name="add_activity" class="btn btn-primary">Add Activity</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Activity Deatils ends -->
    <br>
    <h2>Contract Settings</h2>
    <div class="container">
    
      <div class="row">
        <div class="col">
        <h5>Update contract details</h5>
        <!-- Update Navigation -->
        <a href="./contractUpdate.php?con_id=<?php echo $row["con_id"]; ?>" class="btn btn-warning">Update <?php echo $row["con_name"]; ?></a>
        </div>
        <div class="col">
          <!-- Delete Navigation to home -->
          <h5>Delete this particular contract</h5>
          <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Delete <?php echo $row["con_name"]; ?></button>
        </div>
      </div>
    </div>
    <!-- Workflow Animation -->
    <!-- <h2>Contract Origanization</h2>
    <div class="tree">
      <ul>
        <li>
          <a href="#"><?php echo $row['con_name'];?></a>
          <ul>
            <li>
              <a href="#">2</a>
              <ul>
                <li>
                  <a href="#">2.1</a>  
                </li>
                <li>
                  <a href="#">2.2</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#">3</a>
              <ul>
                <ul>
                <li>
                  <a href="#">3.1</a>
                  <ul>
                <li>
                  <a href="#">3.1.1</a>
                </li>
                <li>
                  <a href="#">3.1.2</a>
                </li>
              </ul>
                </li>
                <li>
                  <a href="#">3.2</a>
                </li>
              </ul>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <br> -->
    <!-- Workflow Animation ends -->
    
    
    <!-- Prompt Box -->
    <div id="id01" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Delete Contract</h1>
        <p>Are you sure you want to delete your contract?</p><br>
        <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
          <button type="submit" name="delete_con" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
    <!-- End Prompt Box -->
    <!-- Second Prompt Box -->
    <div id="id02" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Change Status Contract</h1>
        <p>Are you sure you want to change the status your contract?</p><br>
        <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
          <button type="submit" name="delete_con" class="btn btn-warning">Set Inactive</button>
        </div>
      </form>
    </div>
    <!-- End of Prompt Box -->
    <br><br>
</div>
<?php 
 require_once('leftSidebar.php'); 
 require_once('footer.php'); 
?>