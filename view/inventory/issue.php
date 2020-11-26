<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
  require_once('../../controller/user/userController.php');
  require_once('header.php');
?>

<h2>Issue Item</h2>

<div class="tab">
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, 'rawMaterial')">
			Raw Material
		</button>
		<button class="tablinks" onclick="openTab(event, 'tool')">
			Tool
		</button>
	</div>

<div class="tabcontent" id="rawMaterial">
  <form method="post" action="./../../controller/user/inventoryController.php">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group field">
            <!-- inventory type selection -->
            <select class="form-field" id="type" name="materialType">
                  <option value="">Nail</option>  
                  <option value="m_1204">Hammer</option>
                  <option value="m_1204">Pancil</option>
                  <option value="m_1204">String</option>   
                  <option value="m_1204">Gum</option>   
                  <option value="m_1204">Wood</option>         
            </select>
            <label for="item" class="form-label">Raw material category</label>
          </div>
        </div>
        <div class="col">
        <div class="form-group field">
            <input class="form-field" id="amount" name="issueAmount">
            <label for="amount" class="form-label">Enter amount</label>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group field">
            <select class=form-field id="cemployee" name="issueEmployee">
              <option value="">Select Employee</option>  
              <option value="emp1">Employee 1</option>
              <option value="emp1">Employee 2</option>
              <option value="emp1">Employee 3</option>
              <option value="emp1">Employee 4</option>
            </select>
            <label for="emlpoyeeDetails" class="form-label">Select employee</label>
          </div>
        </div>
        <div class="col">
          <div class="form-group field">
            <select class=form-field id="contract" name="issueContract">
              <option value="">Select a contract</option>  
              <option value="contractA">contractA</option>
              <option value="contractB">contractB</option>
              <option value="contractC">contractC</option>
              <option value="contractC">contractC</option>      
            </select>
            <label for="contract" class="form-label">Select contract</label>
          </div>
        </div>
      </div>
    </div>
    <div class="right">
      <button class="btn btn-primary" type="submit" value="Submit" name="issueRawMaterial">Issue Raw Material</button>
      <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
    </div>
  </form>
</div>
<div class="tabcontent" id="tool">
  <form method="post" action="./../../controller/user/inventoryController.php">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group field">
            <!-- inventory type selection -->
            <select class="form-field" id="type" name="toolType">
                  <option value="">Tool Type</option>  
                  <option value="m_1204">tool</option>
                  <option value="m_1204">Machine</option>      
            </select>
            <label for="item" class="form-label">Select tool category</label>
          </div>
        </div>
        <div class="col">
          <div class="form-group field">
            <select class="form-field" id="item" name="toolId">
              <option value="">Select from list</option>  
              <!--
                  <//?php while($row = mysqli_fetch_array($result)) ?>
                      <option value="<//?php echo $row["toolId"];">
                          <//?php echo $row["toolId"]." - ".$row["toolName"]; ?>
                      </option>
                  <//?php } ?> 
              -->
              <option value="m_1201">nails</option>
              <option value="m_1202">t1wood</option>
              <option value="m_1203">t2wood</option>
              <option value="m_1204">t3wood</option>      
            </select>
            <label for="item" class="form-label">Select tool</label>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group field">
            <select class=form-field id="cemployee" name="issueEmployee">
              <option value="">Select Employee</option>  
              <option value="emp1">Employee 1</option>
              <option value="emp1">Employee 2</option>
              <option value="emp1">Employee 3</option>
              <option value="emp1">Employee 4</option>
            </select>
            <label for="emlpoyeeDetails" class="form-label">Select employee</label>
          </div>
        </div>
        <div class="col">
          <div class="form-group field">
            <select class=form-field id="contract" name="issueContract">
              <option value="">Select a contract</option>  
              <option value="contractA">contractA</option>
              <option value="contractB">contractB</option>
              <option value="contractC">contractC</option>
              <option value="contractC">contractC</option>      
            </select>
            <label for="contract" class="form-label">Select contract</label>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="form-group field">
            <input class="form-field" id="amount" name="issueAmount">
            <label for="amount" class="form-label">Enter amount</label>
          </div>
        </div>
      </div>
    </div>
    <div class="right">
      <button class="btn btn-primary" type="submit" value="Submit" name="issueTool">Issue Tool</button>
      <button class="btn btn-secondary" type="cancel" value="cancel">Cancel</button>
    </div>
  </form>
</div>
<br>
<h2>Recent Issues</h2>
<div class="container center">
	<div class="tab">
		<button class="tablinks" id="openOnLoad" onclick="openTab(event, 'recentTools')">Tools</button>
		<button class="tablinks" onclick="openTab(event, 'recentRawMaterials')">Raw Materials</button>
	</div>
	<div id="recentTools" class="tabcontent">
		<h2>Tools</h2>
		<table class="data-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Item</th>
					<th>Quantity</th>
					<th>Date</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="recentRawMaterials" class="tabcontent">
		<h2>Raw Materials</h2>
		<table class="data-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Item</th>
					<th>Quantity</th>
					<th>Date</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
				<tr>
					<td data-label="ID">01</td>
					<td data-label="Item">Nails</td>
					<td data-label="Quantity">20</td>
					<td data-label="Date">2019.06.07</td>
					<td data-label="Description">Issued to Sarath</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	