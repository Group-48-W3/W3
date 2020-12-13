<?php 
  session_start();
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/quotationController.php');
  $quo = new Quotation();
  $result = $quo->getAllQuotation();
  
?>

<div class="container"> 
  <h1>Add New Quotation</h1>
  
    
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