<?php 
  session_start();
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/quotationController.php');
  $quo = new Quotation();
  $result = $quo->getAllQuotation();
  
?>

<div class="container"> 
  <h1>Quotation</h1>
  <h2>Quotation Gallery</h2>
  <h6>Quotation gallery includes the main product quotation samples inside the business environment which may important for the future reference</h6>

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
    
  <h2>Create Custom Quotation</h2>
  <!-- Form Starts -->
  <form method="post" action="./../../controller/contract/quotationController.php">
    <div class="form-group field">
      <input type="text" class="form-field" id="q_name" name="q_name">
      <label for="q_name" class="form-label">Quotation Name</label>
      <small id="" class="form-text text-muted">Provide a suitable quotation name </small>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" id="q_desc" name="q_budget">
      <label for="q_budget" class="form-label">Quotation Budget</label>
    </div>
    <div class="form-group field">
      <input type="text" class="form-field" name="q_budget" id="q_desc">  
      <label for="q_desc" class="form-label">Quotation Description</label>
    </div>
    <div class="form-group field">
      <input type="file" class="form-field" id="q_img" name="q_img">
      <label for="q_img" class="form-label">Quotation Image</label>
      <small id="" class="form-text text-muted">If you have a image of prove of quotation</small>
    </div>
    <div class="right">
      <button type="submit" class="btn btn-primary" name ="quotationAdd">Add Quotation</button>
    </div>
  </form>
  <!-- Form Ends -->
</div>    

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	