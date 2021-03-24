<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../../controller/user/userController.php');
  require_once('header.php');
?>

<h2>Maintenance</h2>
<div class="container">
  <h3>Add tool/machine to maintenance</h3>
  <div class="search">
    <div class="search-text">
      <div class="form-group field">
        <input class="form-field" id="search">
        <label for="search" class="form-label">Search tool/machine</label>
      </div>
    </div>
    <div class="search-button">
        <svg 
          aria-hidden="true" 
          focusable="false" 
          data-prefix="fas" 
          data-icon="search" 
          class="svg-inline--fa fa-search fa-w-16" 
          role="img" 
          xmlns="http://www.w3.org/2000/svg" 
          viewBox="0 0 512 512">
          <path 
            fill="currentColor" 
            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
          </path>
        </svg>
    </div>
    <div class="search-result">
      <table>
        <thead>
          <tr>
            <th>Registered ID</th>
            <th>Category</th>
            <th>Image</th>
            <th>Manufacturer</th>
            <th width="15%">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td data-label="Registered ID"><i>Tool ID</i></td>
            <td data-label="Category"><i>Tool Category</i></td>
            <td data-label="Image"><i>Image of Tool</i></td>
            <td data-label="Manufacturer"><i>Manufacturer</i></td>
            <td data-label="Action"><button class="btn btn-secondary" onclick="document.getElementById('addMn').style.display='block'">+ Add to maintenance</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<div class="container">
  <h3>Items in maintenance</h3>
  <table>
    <thead>
      <tr>
        <th width="10%">Tool ID</th>
        <th width="10%">Category</th>
        <th width="15%">Maintaner</th>
        <th width="30%">Reason</th>
        <th width="20%">Date of pickup</th>
        <th width="15%">Option</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-label="Item Code">MT4544f</td>
        <td data-label="Item Code">Nail Gun</td>
        <td data-label="Maintaner">Liyanage Workshop</td>
        <td data-label="Cost Code">Failure in motor. Doesn't work when powered</td>
        <td data-label="Date of Pickup">2021:01:23</td>
        <td data-label="Option"><button class="btn btn-secondary" onclick="document.getElementById('remMn').style.display='block'">Remove from maintenance</button></td>
      </tr>
    </tbody>
  </table>
</div>
<br>
<div class="container">
  <h3>Previous maintenance details</h3>
  <table>
    <thead>
      <tr>
        <th width="10%">Tool ID</th>
        <th width="10%">Category</th>
        <th width="15%">Maintaner</th>
        <th width="30%">Reason</th>
        <th width="20%">Date of pickup</th>
        <th width="15%">Option</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-label="Item Code">MT4544f</td>
        <td data-label="Item Code">Nail Gun</td>
        <td data-label="Maintaner">Liyanage Workshop</td>
        <td data-label="Cost Code">Failure in motor. Doesn't work when powered</td>
        <td data-label="Date of Pickup">2021:01:23</td>
        <td data-label="Option"><button class="btn btn-secondary" onclick="document.getElementById('remMn').style.display='block'">Remove from maintenance</button></td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Prompt Boxes -->
<div id="addMn" class="confirm-box">
  <div class="right" style="margin-right:25px;">
    <span onclick="document.getElementById('addMn').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <h1>Add to maintenance</h1>
    <p>You are about to add this tool to maintenance. Please enter the following deatils</p>
    <div class="container">
      <div class="row">
        <div class="col-10">
          <div class="form-group field">
            <input class="form-field" id="reason" name="reason">
            <label for="reason" class="form-label">Reason for maintenance</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10">
          <div class="form-group field">
            <input class="form-field" id="maintainer" name="maintainer">
            <label for="maintainer" class="form-label">Details of maintainer</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10">
          <div class="form-group field">
            <input type="date" class="form-field" id="pickup" name="pickup">
            <label for="pickup" class="form-label">Expected pickup date</label>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix right">
      <button type="button" class="btn btn-secondary" onclick="document.getElementById('addMn').style.display='none'">Cancel</button>
      <button type="submit" name="addMaintenance" class="btn btn-warning">Add to mainteance</button>
    </div>
  </form>
</div>
<div id="remMn" class="confirm-box">
  <div class="right" style="margin-right:25px;">
    <span onclick="document.getElementById('remMn').style.display='none'" class="close" title="Close Modal">&times;</span>
  </div>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
  <h1>Are you sure?</h1>
  <p>You are about to remove this tool from maintenance. Please enter the following deatails</p>
  <div class="container">
    <div class="row">
      <div class="col-10">
        <div class="form-group field">
          <input class="form-field" id="cost" name="cost">
          <label for="cost" class="form-label">Cost for maintenance</label>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix right">
    <button type="button" class="btn btn-secondary" onclick="document.getElementById('remMn').style.display='none'">Cancel</button>
    <button type="submit" name="delete_con" class="btn btn-warning">Remove from maintenance</button>
  </div>
  </form>
</div>
<!-- End Prompt Boxes -->

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	