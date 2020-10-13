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

    <button class="btn btn-warning">Update</button>
    <button class="btn btn-danger">Set Inactive</button>
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
        <small class="form-text text-muted">Provide a suitable quotation name</small>
    </div>
    <label>Quantity :</label>
    <input type="text" class="form-control" placeholder="Description" name="q_quantity">  
    <button class="btn btn-info">Create New Quotation</button>
    
    </form>
    
    <br>
    <hr>
    <h3>Set Activities</h3>
    <br>
    <h3>Contract Employees Details</h3>
    <br>
</div>