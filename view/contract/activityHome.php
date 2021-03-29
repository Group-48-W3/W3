<?php
    session_start();
    if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
    {
      header('location:index.php?lmsg=true');
      exit;
    }		
    require_once('./../../controller/user/userController.php');
    require_once('header.php');
    require_once('./../../controller/contract/contractController.php');
    require_once('./../../controller/contract/activityController.php');
    $con = new Contract();
    $act = new Activity();
    $user_role = $_SESSION['r_id'];	
    static $done = 0;
    //activity details
    $act_details = $act->getAllTodayActivity();
    $act_done_count = $act->getAllTodayDoneActivity();
    $act_undone = $act->getAllUndone();
    // count activity
    $count = mysqli_num_rows($act_details);
    $done_count = mysqli_fetch_array($act_done_count);
    $undone_count = mysqli_num_rows($act_undone);
    // activity mark
    if(isset($_POST['act_done'])){
        $act_id = $_POST['mark_done'];
        $act = new Activity();
        $act->setMarkActivity($act_id,$_SESSION['contract_id']);
        header('location: activityHome.php');    
    }
?>
<!-- Content Starts -->
<div class="container">
    <!-- box starts -->
    <h1>Activities</h1>
    <small>What is a Activity? Activity improves contract progress</small>
    <div class="row">
        <div class="col-sm">
            <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <h1 class="card-title"><?php echo $count; ?></h1>
                <p class="card-text">Total Today Activity</p>
            </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <h1 class="card-title"><?php echo $done_count['res']; ?></h1>
                <p class="card-text">Done Activity</p>
            </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <h1 class="card-title"><?php echo $undone_count; ?></h1>
                <p class="card-text">All UnDone Activity</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- box ends -->
    <div class="row">
        <div class="col-sm">
            <h2>Today Activities</h2>
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
                    <th>Contract</th>
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
                        <?php $done++; ?>
                        <td data-label="status">
                        ✔️
                        </td>
                        <?php }else{ ?>
                        <td data-label="status">
                        ⌛
                        </td>
                        <?php } ?>
                        <td data-label="Contract"><a href="./contractSinglePage.php?con_id=<?php echo $row_act['con_id']; ?>"><?php echo $row_act['con_id']; ?></a></td>
                        <?php if($user_role<=2){ ?>
                        
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
            <br>
        </div>
    <div>
    <div class="row">
        <!-- start of undone all actiivity -->
        <div class="col-sm">
            <h2>All Undone Activities</h2>
            <!-- Today Activity Table -->
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
                    <th>Contract</th>
                    <?php if($user_role== 2 || $user_role == 5){ ?>
                    <th>Edit</th>
                    <?php } ?>
                </thead>
                <tbody>
                    <?php
                    $i=0;
                    while($row_act = mysqli_fetch_array($act_undone)) {    
                    ?>
                    <tr>
                        <td data-label="Name"><?php echo $row_act["act_name"]; ?></td>
                        <td data-label="Description"><?php echo $row_act["act_desc"]; ?></td>
                        <td data-label="Budget"><?php echo $row_act["act_date"];?></td>
                        
                        <?php if($row_act["act_complete"] == TRUE){?>
                        <?php $done++; ?>
                        <td data-label="status">
                        ✔️
                        </td>
                        <?php }else{ ?>
                        <td data-label="status">
                        ⌛
                        </td>
                        <?php } ?>
                        <td data-label="Contract"><a href="./contractSinglePage.php?con_id=<?php echo $row_act['con_id']; ?>"><?php echo $row_act['con_id']; ?></a></td>
                        <?php if($user_role==2 || $user_role == 5){ ?>
                        
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
            <br>
        </div>
        <!-- end of undone activity -->
    </div>
</div>
<!-- Content Ends -->
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
<script>
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	