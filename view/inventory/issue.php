<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
	 
?>
<?php include_once('header.php'); ?>
<h2>Issue Item</h2>
<div class="container">
  <form>
    <div class="form-group field">
        <select class="form-field" id="item" name="item">
          <option value="">Select from list</option>  
          <option value="nails">nails</option>
          <option value="woodtype1">t1wood</option>
          <option value="woodtype2">t2wood</option>
          <option value="woodtype3">t3wood</option>      
        </select>
        <label for="item" class="form-label">Select item to issue</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="amount">
        <label for="amount" class="form-label">Enter amount</label>
      </div>
      <div class="form-group field">
        <select class=form-field id="contract" name="contract">
          <option value="">Select from list</option>  
          <option value="contractA">contractA</option>
          <option value="contractB">contractB</option>
          <option value="contractC">contractC</option>
          <option value="contractC">contractC</option>      
        </select>
        <label for="contract" class="form-label">Select contract from the list</label>
      </div>
      <div class="form-group field">
        <textarea class="form-field" id="employeeDetails" name="employeeDetails"></textarea>
        <label for="emlpoyeeDetails" class="form-label">Enter employee details</label>
      </div>
      <div class="right">
        <button class="btn-primary" type="submit" value="Submit">Issue</button>
        <button class="btn-secondary" type="cancel" value="cancel">Cancel</button>
      </div>
  </form>
</div>

<?php
  require_once('left_sidebar.php'); 
  require_once('footer.php'); 
?>	