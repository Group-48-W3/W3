<?php require_once('./contractHeader.php');


require_once('./../../controller/contract/contractController.php');

$con = new Contract();
$result = $con->getAllActiveContracts();
?>

<div class="container">
<h1>Invoice</h1>
<div class="container">
<div class="row">
<div class="col-8">
<!-- Form Starts -->
<form method="post" action="./../../controller/contract/contractController.php">
        <h3>Step 01 : Contract Details</h3>
        <div class="form-group">
          <label>Contract Name : </label>
          <select name="contract" id="con">
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
          <small id="" class="form-text text-muted">Select the Contract Name</small>
        </div>
        <h3>Step 02 : Client Details</h3>
        <div class="form-group">
          <label>Client Name : </label>
          <input type="text" class="form-control" placeholder="Client Name" name="" value=<?php echo $row_quo["con_name"]; ?>>
          <small id="" class="form-text text-muted">Select the client</small>
        </div>
        <h3>Step 03 : Invoice Details</h3>
        <div class="form-group">
          <label >Date : </label>
          <input type="text" class="form-control" placeholder="Date of Issue" name="c_id"> 
        </div>
        <div class="form-group">
          <label>Payment Type :</label>
          <input type="text" class="form-control" id="" placeholder="Payment Type" name="start_date">
        </div>
        <div class="form-group">
          <label >Purpose : </label>
          <input type="text" class="form-control" placeholder="Purpose" name="end_date">  
        </div>
        <div class="form-group">
          <label>Amount : </label>
          <input type="text" class="form-control" placeholder="Amount" name="end_date">  
        </div>
        <h3>Item Details to be included:</h3>
        <button type="submit" class="btn btn-primary"><a href="./invoicePrint.php">Create Invoice</a></button>
</form>
<!-- Form Ends -->
</div>
</div>
</div>

</div>  
</body>
</html>