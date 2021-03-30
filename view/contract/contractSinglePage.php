<?php
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/contractController.php');
  require_once('./../../controller/contract/quotationController.php');
  require_once('./../../controller/contract/activityController.php');
  $user_role = $_SESSION['r_id'];
  //echo $user_role; 	
  if (isset($_GET['con_id'])) {
    $con = new Contract();
    $quo = new Quotation();
    $act = new Activity();
    $_SESSION['contract_id'] = $_GET['con_id'];
    
    $con_details = $con->getSingleActiveContract($_SESSION['contract_id']);
    
    $row = mysqli_fetch_array($con_details);
    
    $client_details = $con->getSingleClient($row['c_id']);

    $row_client = mysqli_fetch_array($client_details);

    $quo_details = $quo->getAllQuotationContract($_SESSION['contract_id']);

    $quo_details2 = $quo->getAllQuotationContract($_SESSION['contract_id']);

    $act_details = $act->getActivityforContract($_SESSION['contract_id']);

    $progress = $act->getProgressContract($_SESSION['contract_id']);
  }

  if(isset($_POST['delete_con'])){
    $con = new Contract();
    $con->deleteContract($_SESSION['contract_id']);
  }

  if(isset($_POST['add_activity'])){
    //
    $contract_id = $_SESSION['contract_id'];
    $act = new Activity();
    echo $_POST['act_quo'];
    $act->addActivity($_POST['act_name'],$_POST['act_desc'],$_POST['act_date'],$_POST['act_quo'],$contract_id);
    
  }
  if(isset($_POST['act_done'])){
    $act_id = $_POST['mark_done'];
    $act = new Activity();
    $act->setMarkActivity($act_id,$_SESSION['contract_id']);
    
  }

?>

<div class="container">
    <h1>Contract <?php echo " ".$row["con_name"]; ?></h1>
    <div class="row">
      <div class="col-sm">
        <!-- Contract Section -->
        <h2>Step 01 : Contract Details</h2>
        <h5>Contract :  <?php echo $row["con_name"]; ?></h5>
        <h5>Description    : <?php echo $row["con_desc"]; ?></h5>
        <h5>Location       : <?php echo $row["location"]; ?></h5>
        <h5>Payment Method : <?php echo $row["payment_method"]; ?></h5>
        <br>
        <!-- Client Section -->
        <h2>Step 02 : Client Details</h2>
        <h5>Name : <?php echo $row_client["c_name"]; ?></h5>
        <h5>Company : <?php echo $row_client["c_company"]; ?></h5>
        <h5>Address : <?php echo $row_client["c_address"]; ?></h5>
        <h5>Email : <?php echo $row_client["c_email"]; ?></h5>
        <h5>Contact : <?php echo $row_client["c_mobile"]; ?></h5>

        <br>
      </div>
      <div class="col-sm">
        <!-- Progress starts -->
        <h2>Progress Measures</h2>
        <div class="col-sm">
          <h5>Progress : <?php echo " ".$progress." %"?></h5>
          <br>
          <!-- add progress bar -->
          <?php if($progress >=50){ ?>
            <svg class="radial-progress" data-percentage="<?php echo $progress;?>" viewBox="0 0 80 80">
              <circle class="incomplete" cx="40" cy="40" r="35"></circle>
              <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
              <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)"><?php echo $progress?></text>
            </svg>
          <?php }else{?>
            <!-- progress less than 50% -->
            <svg class="radial-progress" data-percentage="<?php echo $progress;?>" viewBox="0 0 80 80">
              <circle class="incomplete" cx="40" cy="40" r="35"></circle>
              <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: 39.58406743523136;"></circle>
              <text class="percentage" x="50%" y="57%" transform="matrix(0, 1, -1, 0, 80, 0)"><?php echo $progress?></text>
            </svg>  
          <?php }?>  
          <!-- progress with js  -->
          
          <!-- ends -->
        </div>
        </div>
        <!-- Progress ends -->
      </div>
  </div>
    <!-- end of contract section -->
  <div class="container">
    <hr>
    <!-- Quotation details -->
    <h2>Step 03 : Quotation Details</h2>
    <h2>Current Quotation</h2>
    <div class="container" id="currentQuo">
      <!-- Quotation Table -->
      <!-- New Component for item Table -->
      <div class="" id="viewQuo">
        <div class="row">
          <div class="col">
            <div class="left">
              <span>Show: </span>
              <select name="" id="rmViewRows" class="" width="15px">
                <option value="5">5 records</option>
              </select>
            </div>
          </div>
        </div>
        <br>
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
                <!-- <?php if($user_role<=5){ ?> -->
                <th>Edit</th>
                <?php } ?>
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row = mysqli_fetch_array($quo_details)) {    
                ?>
                  <tr>
                    <td data-label="Name"><?php echo $row["q_name"]; ?></td>
                    <td data-label="Name">
                
                    <a href="./itemUpdate.php?view=1&item_id=<?php echo $row["q_item"]; ?>"><?php echo $row["q_item"]; ?></a>
                    </td>
                    <td data-label="Description"><?php echo $row["q_desc"]; ?></td>
                    <td data-label="Budget"><?php echo $row["q_budget"];?></td>
                    <td data-label="Quantity"><?php echo $row["q_quantity"];?></td>
                    <td data-label="Discount"><?php echo $row["q_discount"]?></td>
                  
                    <?php if($user_role<=5 ){ ?>
                    <td data-label="Edit">
                    <a href="./quotationSinglePage.php?q_id=<?php echo $row["q_id"]; ?>" class="btn btn-warning">&#x270E</a>
                    <a class="btn btn-danger" href="./quotationSinglePage.php?del_id=<?php echo $row["q_id"]; ?>&con_id=<?php echo $_SESSION['contract_id'];?>">&#x2716</a>
                    </td>
                    
                    <?php } ?>
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
        <?php
          $i++;
          if($i==0){
            echo "No results ";
          }
        ?>
      </div>
      <div id="addQuo">
        <h2>Add a new Quotation</h2>
          <!-- Add new quotation -->
          <small class="form-text text-muted">Need to create a need one? click the following button</small>
          <div class="quotation">
          <a class="btn btn-success" href="./quotationAdd.php?quo_con_id=<?php echo $_SESSION['contract_id']; ?>">Create a new Quotation</a>
          </div>
      </div>
    <hr>
    <!-- Quotation Details ends -->
    </div>
    <!-- Activity Details -->
    <h2>Step 04 : Activity Details</h2>
    <div class="container">
      <div class="tab">
        <button class="tablinks" id="openOnLoad" onclick="openTab(event, 'currentActivity')">Current Activity</button>
        <button class="tablinks" onclick="openTab(event, 'addActivity')">Add Activity</button>
      </div>
      <div id="currentActivity" class="tabcontent">
        <h3>Current Activities</h3>
        <!-- Table Header -->
        <br>
        <!-- Table Header ends -->
        <div class="row">
          <div class="col">
            <table class="data-table paginated">
              <thead>
                <th width="30%">Activity Name</th>
                <th>Activity Description</th>
                <th>Date</th>
                <th>Complete</th>
                <?php if($user_role==2){ ?>
                <th>Edit</th>
                <?php } ?>
              </thead>
              <tbody>
                <?php
                  $i=0;
                  while($row_act = mysqli_fetch_array($act_details)) {    
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
                    <?php if($user_role==2){ ?>
                    <td data-label="Edit">
                    <form method = "post" action="<?php echo $_SERVER['PHP_SELF']?>">
                    <input type="hidden" name = "mark_done" value="<?php echo $row_act["act_id"]; ?>">
                    <button type="submit" name="act_done" class="btn btn-success">&#x270E Mark</button>
                    </form>  
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
      <div id="addActivity" class="tabcontent">
      <h3>Set Activities</h3>
        <!-- Activity Form -->
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
          <!-- select quotation id -->
          <div class="form-group">
          <select class="form-field" name="act_quo" id="act_quo">
            <?php
              $i=0;
              while($row2 = mysqli_fetch_array($quo_details2)) {
            ?>
            <option value="<?php echo $row2["q_id"];?>"><?php echo $row2["q_id"]." ".$row2["q_name"];?></option>
            <?php
              $i++;
              }
              if($i==0){
                echo "No results ";
              }
            ?>
          </select>
          <label for="act_quo" class="form-label">Quotation ID</label>
          </div>
          <!-- end selecting quotation id -->
          <div class="form-group">
            <input type="text" class="form-field" id="activityName" name="act_name">
            <label for="activityName" class="form-label">Activity Name</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="act_desc" id="activityDescription">
            <label for="activityDescription" class="form-label">Activity Description</label>
          </div>
          <div class="form-group">
            <input type="text" class="form-field" name="act_date" id="activityDate" value="<?php echo date("Y-m-d");?>">  
            <label for="activityDate" class="form-label">Date</label>
            <small>Date is automatically generated by the system</small>
          </div>
          <div class="right">
            <button type="submit" name="add_activity" class="btn btn-primary">Add Activity</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Activity Deatils ends -->
    <br>
    <h2>Contract Settings</h2>
    <div class="container">
      <div class="row">
      <div class="col">
      <h5>Create a Invoice</h5>
        <!-- Update Navigation -->
        <a href="./InvoiceAdd.php?con_id=<?php echo $_SESSION['contract_id']; ?>" class="btn btn-primary">Create Invoice</a>
      </div>
      </div>
      <div class="row">
        <div class="col">
        <h5>Update contract details</h5>
        <!-- Update Navigation -->
        <a href="./contractUpdate.php?con_id=<?php echo $row["con_id"]; ?>" class="btn btn-warning">Update</a>
        </div>
        <div class="col">
          <!-- Delete Navigation to home -->
          <h5>Delete this particular contract</h5>
          <button class="btn btn-danger" onclick="document.getElementById('id01').style.display='block'">Delete</button>
        </div>
      </div>
    </div>
    <!-- Prompt Box -->
    <div id="item" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('item').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Item View</h1>
        <div class="form-group field">
          <input type="text" class="form-field" name="item_name" id="item_name" >
          <label for="item_name" class="form-label" placeholder="I0001">Item Name</label>
          <small id="" class="form-text text-muted">Provide a suitable item name eg:- bed_model#4</small>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="item_category" id="item_category" >
          <label for="q_budget" class="form-label">Item Category</label>
        </div>
        <div class="form-group field">
          <input type="text" class="form-field" name="unit_price" id="unit_price">  
          <label for="unit_price" class="form-label">Unit Price</label>
        </div>
        <div class="form-group field">
          <input type="file" class="form-field" id="image" name="image">
          <label for="q_budget" class="form-label">Image</label>
        </div>
        
        <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('item').style.display='none'">Cancel</button>
          <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
        </div>
      </form>
    </div>
    <!-- End Prompt Box -->
    
    <!-- Prompt Box -->
    <div id="id01" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Delete Contract</h1>
        <p>Are you sure you want to delete your contract?</p><br>
        <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
          <button type="submit" name="delete_con" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
    <!-- End Prompt Box -->
    <br><br>
</div>
<!-- Pagination script -->
<script>
	$('table.paginated').each(function () {
        var currentPage = 0;
        var numPerPage = 5; // number of items 
        var $table = $(this);
        //var $tableBd = $(this).find("tbody");

        $table.bind('repaginate', function () {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            $('<span class="page-number"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active').siblings().removeClass('active');
            }).appendTo($pager).addClass('clickable');
        }
        if (numRows > numPerPage) {
            $pager.insertAfter($table).find('span.page-number:first').addClass('active');
        }
    });
</script>
<!-- script for progress -->
<script>
$('svg.radial-progress').each(function( index, value ) { 
  $(this).find($('circle.complete')).removeAttr( 'style' );
});
$(window).scroll(function(){
  $('svg.radial-progress').each(function( index, value ) { 
    // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
    if ( 
        $(window).scrollTop() > $(this).offset().top - ($(window).height() * 0.75) &&
        $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window).height() * 0.25)
    ) {
        // Get percentage of progress
        percent = $(value).data('percentage');
        // Get radius of the svg's circle.complete
        radius = $(this).find($('circle.complete')).attr('r');
        // Get circumference (2πr)
        circumference = 2 * Math.PI * radius;
        // Get stroke-dashoffset value based on the percentage of the circumference
        strokeDashOffset = circumference - ((percent * circumference) / 100);
        // Transition progress for 1.25 seconds
        $(this).find($('circle.complete')).animate({'stroke-dashoffset': strokeDashOffset}, 1250);
    }
  });
}).trigger('scroll');
</script>
<?php 
 require_once('leftSidebar.php'); 
 require_once('footer.php'); 
?>