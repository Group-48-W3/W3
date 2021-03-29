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
  require_once('./../../controller/expense/expenseController.php');
  require_once('./../../controller/contract/invoiceController.php');
  require_once('./../../controller/expense/incomeController.php');
  
  $report = new MasterRep();
  $res = $report->conDetails($_SESSION['rcon_name'],$_SESSION['rstart_date'],$_SESSION['rend_date']);
  $res_data = mysqli_fetch_array($res);
  //client details
  $res2 = $report->clientDetails($res_data['c_id']);
  $res2_data = mysqli_fetch_array($res2);

  $payment = new Payment();
  $res3 = $payment->viewPaymentReport($_SESSION['rcon_name'],$_SESSION['rstart_date'],$_SESSION['rend_date']);
  $res3_data = mysqli_fetch_array($res3);

  $income = new Income();
  $res4 = $income->viewIncomeReport($_SESSION['rcon_name'],$_SESSION['rstart_date'],$_SESSION['rend_date']);
  $res4_data = mysqli_fetch_array($res4);

?>

<div class="container">
<h2>Report View</h2>
</div>
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
      <!-- daily expenses -->
      <div class="container col-10" style="border-style: solid">
        <h5>Expense Details</h5>
        <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th>Expense Category</th>
                <th>Date</th>
                <th>Payment Type</th>
                <th>Description</th>
                <th>Amount(LKR)</th>  
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row = mysqli_fetch_array($res3)) {    
                ?>
                  <tr>
                    <td data-label="cat_name"><?php echo $res3_data["cat_name"]; ?></td>
                    <td data-label="p_date"><?php echo $res3_data["p_date"]; ?></td>
                    <td data-label="p_type"><?php echo $res3_data["p_type"]; ?></td>
                    <td data-label="p_desc"><?php echo $res3_data["p_desc"]; ?></td>
                    <td data-label="p_amount"><?php echo $res3_data["p_amount"]; ?></td>
                  </tr>
                <?php
                  $i++;
                  }
                  if($i==0){
                ?>
                <tr><td colspan="8"><center>No Expenses Avaliable!</center></td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
      </div>
      <br>
      <!-- End of dialy expenses  -->
      <div class="container col-10" style="border-style: solid">
        <h5>Other Income Details</h5>
        <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th>Description</th>
                <th>Date</th>
                <th>Amount(LKR)</th>  
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row = mysqli_fetch_array($res4)) {    
                ?>
                  <tr>
                    <td data-label="inc_desc"><?php echo $res4_data["inc_desc"]; ?></td>
                    <td data-label="inc_date"><?php echo $res4_data["inc_date"]; ?></td>
                    <td data-label="inc_amount"><?php echo $res4_data["inc_amount"]; ?></td>
                  </tr>
                <?php
                  $i++;
                  }
                  if($i==0){
                ?>
                <tr><td colspan="8"><center>No Other Incomes Avaliable!</center></td></tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <br>
      </div>
      <br>
		  <p><?php echo "Created: ".date("Y/m/d")." At ".date("h:i:sa") ?></p>
</div>
<?php
  require_once('leftSidebarReport.php'); 
  require_once('footer.php'); 
?>