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
  <form method="post" action="./../../controller/user/inventoryController.php">
  <div class="form-group field">
  <!-- inventory type selection -->
    <select class="form-field" id="type" name="materialType">
          <option value="">Inventory Type</option>  
          <option value="m_1204">Material</option>
          <option value="m_1204">Machine</option>      
    </select>
    <label for="item" class="form-label">Select inventory type to issue</label>
  </div>
    <div class="form-group field">
        <select class="form-field" id="item" name="materialId">
          <option value="">Select from list</option>  
      <!--
          <//?php while($row = mysqli_fetch_array($result)) ?>
              <option value="<//?php echo $row["materialId"];">
                  <//?php echo $row["materialId"]." - ".$row["materialName"]; ?>
              </option>
          <//?php } ?> 
      -->
          <option value="m_1201">nails</option>
          <option value="m_1202">t1wood</option>
          <option value="m_1203">t2wood</option>
          <option value="m_1204">t3wood</option>      
        </select>
        <label for="item" class="form-label">Select item to issue</label>
      </div>
      <div class="form-group field">
        <input class="form-field" id="amount" name="issueAmount">
        <label for="amount" class="form-label">Enter amount</label>
      </div>
      <div class="form-group field">
        <select class=form-field id="contract" name="issueContract">
          <option value="">Select a contract</option>  
          <option value="contractA">contractA</option>
          <option value="contractB">contractB</option>
          <option value="contractC">contractC</option>
          <option value="contractC">contractC</option>      
        </select>
        <label for="contract" class="form-label">Select a contract</label>
      </div>
      <div class="form-group field">
        <select class=form-field id="cemployee" name="issueEmployee">
          <option value="">Select Employee</option>  
          <option value="emp1">Employee 1</option>
          <option value="emp1">Employee 2</option>
          <option value="emp1">Employee 3</option>
          <option value="emp1">Employee 4</option>
        </select>
        <label for="emlpoyeeDetails" class="form-label">Enter employee details</label>
      </div>
      <div class="right">
        <button class="btn btn-primary" type="submit" value="Submit" name="issueRawMaterial">Issue</button>
        <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
      </div>
  </form>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	