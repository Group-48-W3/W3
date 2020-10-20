<?php
 require_once('./contractHeader.php');
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
    <div class="form-group">
        <label>Select Quotation :</label>
        <select name="quotation" id="quotation">
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
    </div>
    <label>Quantity :</label>
    <input type="text" class="form-control" placeholder="Description" name="q_quantity">
     
    <button type="submit" name="quotation_contract">Add Quotation</button>
    
    </form>
    <h6>Need to create a need one? click the following button</h6> 
    <a class="btn btn-primary" href="./../../view/contract/quotationAdd.php">Quotation Gallery</a>
    <br>
    <hr>
    <h3>Set Activities</h3>
        <!-- Activity Form -->
        <form method="post" action="./../../controller/contract/contractController.php">
        <div class="form-group">
          <label>Contract Name : </label>
          <input type="text" class="form-control" placeholder="Select Contract" name="c_id">
          <small id="" class="form-text text-muted">Select Contract: </small>
        </div>
        <div class="form-group">
          <label>Activity Name : </label>
          <input type="text" class="form-control" id="" placeholder="Activity Name" name="start_date">
        </div>
        <div class="form-group">
          <label>Activity Description : </label>
          <input type="text" class="form-control" placeholder="Description" name="end_date">
          
        </div>
        <div class="form-group">
          <label >Activity Weight : </label>
          <input type="text" class="form-control" placeholder="Weight eg:- 2 Units put as 2" name="location">
          <small class="form-text text-muted">Weight describes the work load of the work done</small>
        </div>
        <div class="form-group">
          <label>Date: </label>
          <input type="text" class="form-control" placeholder="Date" name="description">  
        </div>
        <button type="submit" class="btn btn-primary">Add Activity</button>
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