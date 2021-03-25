<?php 
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  // data imports
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/contract/reportController.php');
  
  //echo $_SESSION['rcon_name']." ".$_SESSION['rstart_date']." ".$_SESSION['rend_date'];
  $report = new MasterRep();
  if($_GET['type'] == 'basic_report'){
  $rep = 1;  
  $res = $report->conDetails($_SESSION['rcon_name'],$_SESSION['rstart_date'],$_SESSION['rend_date']);
  $res_data = mysqli_fetch_array($res);
  //client details
  $res2 = $report->clientDetails($res_data['c_id']);
  $res2_data = mysqli_fetch_array($res2);
  //quotation details
  $res3 = $report->quotationDetails($_SESSION['rcon_name']);
  //$res3_data = mysqli_fetch_array($res3);
  $res4 = $report->activityDetails($_SESSION['rcon_name'],$_SESSION['rstart_date'],$_SESSION['rend_date']);
  }  
  if($_GET['type'] == 'progress_report'){
    $rep = 2;
    $con = new Contract();
    $res1 = $con->getAllActiveContracts();
  }

?>

<div class="container">
<h2>Report View</h2>
</div>
<?php if($rep == 1){?>
<div class="container" style="border-style: solid">
		  <h4>Master Report <?php echo $res_data['con_name']; ?></h4>
      <div class="row">
      <div class="container col-4" style="border-style: solid">
        <h5>Contract Details</h5>
        <h6>contract name : <?php echo $res_data['con_name'];?></h6>
        <h6>location  : <?php echo $res_data['location'];?></h6>
        <h6>payment method : <?php echo $res_data['payment_method'];?></h6>
        <h6>progress : <?php echo $res_data['con_progress']."%" ;?></h6>
      </div>
      <div class="container col-4" style="border-style: solid">
        <h5>Client Details</h5>
        <h6>client name : <?php echo $res2_data['c_name'];?></h6>
        <h6>company  : <?php echo $res2_data['c_company'];?></h6>
        <h6>mobile : <?php echo $res2_data['c_mobile'];?></h6>
        <h6>email : <?php echo $res2_data['c_email'] ;?></h6>
      </div>
      </div>
      <br>
      <!-- quotation -->
      <div class="container col-10" style="border-style: solid">
        <h5>Quotation Details</h5>
        <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th width="15%">Quotation Name</th>
                <th>Item Name</th>
                <th width="30%">Description</th>
                <th>Budget</th>
                <th>Quantity</th>
                <th>Discount</th>  
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row = mysqli_fetch_array($res3)) {    
                ?>
                  <tr>
                    <td data-label="Name"><?php echo $row["q_name"]; ?></td>
                    <td data-label="Name">
                    <!-- <a onclick="document.getElementById('item').style.display='block'"><?php echo $row["q_item"]; ?></a> -->
                    <a href="./itemUpdate.php?view=1&item_id=<?php echo $row["q_item"]; ?>"><?php echo $row["q_item"]; ?></a>
                    </td>
                    <td data-label="Description"><?php echo $row["q_desc"]; ?></td>
                    <td data-label="Budget"><?php echo $row["q_budget"];?></td>
                    <td data-label="Quantity"><?php echo $row["q_quantity"];?></td>
                    <td data-label="Discount"><?php echo $row["q_discount"]?></td>
                  </tr>
                <?php
                  $i++;
                  }
                  if($i==0){
                ?>
                <tr><td colspan="8"><center>No Quotations Avaliable!</center></td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
      </div>
      <br>
      <!-- End of quotation -->
      <!-- Activity -->
      <div class="container col-10" style="border-style: solid">
      <h5>Activity Details</h5>              
      <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th width="30%">Activity Name</th>
                <th>Activity Description</th>
                <th>Date</th>
                <th>Complete</th>
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row_act = mysqli_fetch_array($res4)) {    
                ?>
                  <tr>
                    <td data-label="Name"><?php echo $row_act["act_name"]; ?></td>
                    <td data-label="Description"><?php echo $row_act["act_desc"]; ?></td>
                    <td data-label="Budget"><?php echo $row_act["act_date"];?></td>
                    
                    <?php if($row_act["act_complete"] == TRUE){?>
                    <td data-label="status">
                    ✔️
                    </td>
                    <?php }else{ ?>
                    <td data-label="status">
                    ⌛
                    </td>
                    <?php } ?>
                    
                  </tr>
                <?php
                  $i++;
                  }
                  if($i==0){
                ?>
                <tr><td colspan="8"><center>No Activities Avaliable!</center></td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
      </div>
      <!-- End of Activity -->
		  <p><?php echo "Created: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
</div>
<?php }?>
<!-- Progress Report -->
<?php if($rep == 2){?>
  <div class="container" style="border-style: solid">
  <h2>Progress Report</h2>
  <!-- data 1 -->
  <!-- quotation -->
  <div class="container col-10" style="border-style: solid">
        <h3>Progress Details</h3>
        <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th width="15%">Contract Name</th>
                <th width="30%">Description</th>
                <th>Location</th>
                <th>Progress</th>
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row = mysqli_fetch_array($res1)) {    
                ?>
                  <tr>
                    <td data-label="Name"><?php echo $row["con_name"]; ?></td>
                    <td data-label="Name"><?php echo $row['con_desc'];?></td>
                    <td data-label="Description"><?php echo $row["location"]; ?></td>
                    <td data-label="Budget"><?php echo $row["con_progress"];?></td>
                  </tr>
                <?php
                  $i++;
                  }
                  if($i==0){
                ?>
                <tr><td colspan="8"><center>No Progress Avaliable!</center></td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
      </div>
      <br>
  <!-- data 1 ends -->
</div>
<?php }?>
<!-- Progress Report ends -->
<?php
  require_once('leftSidebarReport.php'); 
  require_once('footer.php'); 
?>