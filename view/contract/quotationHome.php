<?php 
  session_start();
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/quotationController.php');
  $quo = new Quotation();
  $result = $quo->getAllQuotation();
  
?>

<div class="container"> 
  <h2>Quotation Home</h2>
  <h6>Quotation gallery includes the main product quotation samples inside the business environment which may important for the future reference</h6>
  <!-- Add a new Contract -->
  <h2 style="margin: 0px">Add a new Quotation</h2>
  <a class="btn btn-primary" href="./quotationAdd.php">Add New Quotation</a>
  <!-- End add contract -->
  <div class="container">
  <br>
  </div> 
  <?php
    $i=0;
    while($row = mysqli_fetch_array($result)) {
  ?>
  <!-- Quotation Item Starts-->
  <div class="container card text-white bg-primary" onclick="location.href='./quotationSinglePage.php?q_id=<?php echo $row["q_id"]; ?>';" style="cursor: pointer;">
    <br>
    <h4><?php echo $row["q_name"]; ?></h4>
    <h6 style="margin: 0px">Description :<?php echo $row["q_desc"]; ?></h6>
    <h6 style="margin: 0px">Budget : <?php echo $row["q_budget"]; ?></h6>
    <h6 style="margin: 0px">Item Count : </h6>
    <br>
  </div>
  <!-- Quotation Item Ends -->
  <?php
    $i++;
    }
    if($i==0){
        echo "No results ";
    }
  ?>
  
</div>    

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	