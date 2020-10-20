<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>

<h2>Replenish Stock</h2>
<div class="container">
  <form>
    <div class="container">
      <div class="form-group field">
        <select class="form-field" id="item" name="items" placeholder="Select">  
          <option value="">Select from list</option>  
          <option value="nails">nails</option>
          <option value="woodtype1">t1wood</option>
          <option value="woodtype2">t2wood</option>
          <option value="woodtype3">t3wood</option>      
        </select>
        <label for="item" class="form-label">Select item from the list</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="amount">
        <label for="amount" class="form-label">Enter amount</label>
      </div>
    </div>
    <div class="container right">
      <div class="row">
        <button class="btn-primary" type="cancel" value="cancel">Submit</button> 
        <button class="btn-secondary" type="submit" value="Submit">Cancel</button>
      </div>
    </div>
  </form>
</div>

<div class="container center">
  <div class="row">
    <div class="col-12">
      <a class="btn-primary" href="replenishNewItemSubmit.php">+ Add new items to stock</a> 
    </div>
  </div>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	