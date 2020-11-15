<?php 
  
  session_start();
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/user/userController.php');
  require_once('header.php');
  $con = new Contract();
  $result = $con->getAllActiveContracts();
?>

  <div class="container">
    <!-- Heading  -->
    <h1>Contract Home</h1>
    <!-- Start the card View  -->
    <div class="row">
      <!-- 1st card -->
      <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">5</h1>
            <p class="card-text">Contracts</p>
          </div>
        </div>
      </div>
      <!-- end card 1 -->
      <!-- 2nd card -->
      <div class="col-sm">
        <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">45</h1>
            <p class="card-text">Activities</p>
          </div>
        </div>
      </div>
      <!-- end card 2 -->
      <!--3rd card  -->
      <div class="col-sm">
        <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title">29</h1>
            <p class="card-text">Quotations</p>
          </div>
        </div>
      </div>
      <!-- end card 3 -->
      <!-- 4th card  -->
      <div class="col-sm">
        <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 id="value" class="card-title">0</h1>
            <p class="card-text">Invoices</p>
          </div>
        </div>
      </div>
      <!-- end 4 -->
    </div>
    <!-- end of row -->

    <div class="form-group field">
      <input type="text" class="form-field" id="find-repo" placeholder="Find a Contract by Name">
      <label for="find-repo" class="form-label">Find a Contract</label>
      <div class="container">
      <br>
      <a class="btn btn-primary" href="./contractAdd.php">Add New Contract</a>
      </div>
     
    </div>
    <!--Contrat Summary Details  -->
    <h1>Ongoing Contracts</h1>
    <p>Contracts that are Active</p>
    <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {

    ?>
    <!-- Contract Item -->
    <div class="container card text-white bg-primary" onclick="location.href='./contractSinglePage.php?con_id=<?php echo $row["con_id"]; ?>';" style="cursor: pointer;">
      <br>
      <h4 style="margin: 0px"><?php echo $row["con_name"]; ?></h4>
      <h6 style="margin: 0px"><?php echo $row["con_desc"]; ?></h6>
      <h6 style="margin: 0px">Start Date :<?php echo $row["startdate"]; ?>Upto End date : <?php echo $row["enddate"]; ?></h6>
      <h6 style="margin: 0px"><?php echo $row["location"]; ?></h6>
      <p style="text-align:right;"><?php echo $row["status"]; ?></p>
      <br>
    </div>
    <!-- Contract Item Ends -->
    <?php
      $i++;
      }
      if($i==0){
          echo "No results ";
      }
    ?>
  </div> 
  <div class="container">
  <h1>Finished Contracts</h1>
  <p>Contracts that are finished already</p>
  </div>
  

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	