<?php 
  session_start();
  if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
  {
    header('location:index.php?lmsg=true');
    exit;
  }
  require_once('./../../controller/user/userController.php'); 
  require_once('./header.php');
  require_once('./../../controller/contract/itemController.php');
  $item = new Item();
  $result= $item->getAllItems();
  $count = mysqli_num_rows($result);
  $user_role = $_SESSION['r_id'];
  
  $_SESSION['delete_item'] = 'none';

  if(isset($_GET['delete_id'])){
	$item->deleteItem($_GET['delete_id']);
  }

  if(isset($_POST['add_item'])){
	$item->addItem($_POST['item_name'],$_POST['item_category'],$_POST['unit_price']);
  header('location: ./itemHome.php');
  }

?>
<!-- Notification -->
<?php if(($_SESSION['delete_item']) == 'success'): ?>
	
<div class="alert alert-danger" style="background-color: red;">
	<a href="./user/userProfile.php" style="text-decoration: none; color: white;">Item deleted successfully</a>
</div>

<?php $_SESSION['delete_item'] = 'none'; endif; ?>
<!-- end of notification -->
<div class="container"> 
  <h1>Item Home</h1>
  <div class="row">
    <div class="col-sm">
        <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
          <!-- <div class="card-header">Header</div> -->
          <div class="card-body">
            <h1 class="card-title"><?php echo $count; ?></h1>
            <p class="card-text">Total Items</p>
          </div>
        </div>
    </div>
  </div>
  <br> 
  <!-- Add a new Contract -->
  <h2 style="margin: 0px">Add a new Item</h2>
  <!-- Prompt Item for item adding -->
  <a class="btn btn-primary" onclick="document.getElementById('id01').style.display='block'">+ Add new Item</a>
  <h2>Item Gallery</h2>

</div>    
<!-- New Component for item Table -->
<div class="container ">
	<br>
	<div class="row">
		<div class="col-10">
			<table class="data-table paginated">
				<thead>
					<th width="40%">Item Name</th>
					<th width="30%">Category</th>
					<th>Unit Price</th>
					<?php if($user_role==2){ ?>
					<th>Edit</th>
					<?php } ?>
				</thead>
				<tbody>
					<?php
						$i=0;
						while($row = mysqli_fetch_array($result)) {		
					?>
						<tr>
							<td data-label="Name"><?php echo $row["item_name"]; ?></td>
							<td data-label="Description"><?php echo $row["item_category"]; ?></td>
							<td data-label="Unit Price"><?php echo $row["unit_price"]?></td>
		
							<?php if($user_role==2){ ?>
							<td data-label="Edit">
							
							<a class="btn btn-warning" href="./itemUpdate.php?item_id=<?php echo $row['item_id'];?>">&#x270E</a>
							<a class="btn btn-danger" href="./itemHome.php?delete_id=<?php echo $row['item_id'];?>">&#x2716</a>
							</td>
							<?php } ?>
						</tr>
					<?php
						$i++;
						}
						if($i==0){
					?>
					<tr><td colspan="8"><center>Sorry, No Results to Show!</center></td></tr>
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
<!-- Prompt Box -->
<div id="id01" class="confirm-box">
      <div class="right" style="margin-right:25px;">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>
      
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h1>Add new Item</h1>
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
		    <div class="clearfix right">
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
          <button type="submit" name="add_item" class="btn btn-primary">Add Item</button>
        </div>
    </form>
</div>
<!-- End Prompt Box -->

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
<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	