<?php
session_start();

if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
  }
  require_once('../../controller/user/userController.php');
  include_once('header.php');		
$res = getAll(); 
?>

<div class="container">
<h1>Admin Panel</h1>
<!-- Start the card View  -->
<div class="row">
    <!-- 1st card -->
    <div class="col-sm">
    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">7</h1>
        <p class="card-text">Users</p>
      </div>
    </div>
    </div>
    <!-- end card 1 -->
    <!-- 2nd card -->
    <div class="col-sm">
     <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">25</h1>
        <p class="card-text">Employees</p>
      </div>
    </div>
    </div>
    <!-- end card 2 -->
    <!--3rd card  -->
    <div class="col-sm">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 class="card-title">24</h1>
        <p class="card-text">Notification/Message</p>
      </div>
    </div>
    </div>
    <!-- end card 3 -->
    <!-- 4th card  -->
    <div class="col-sm">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
      <!-- <div class="card-header">Header</div> -->
      <div class="card-body">
        <h1 id="value" class="card-title">8</h1>
        <p class="card-text">Permissions</p>
      </div>
    </div>
    </div>
    <!-- end 4 -->
  </div>
  <!-- end of row -->
  <br>
  <h5>Welcome to the Admin Panel, These are some details you need to consider</h5>
</div> 
<!-- end of container  -->
<!-- active/inactive component -->
<!-- User Active Table -->
<div class="container">
    <h2 class="text-center text-info">User Status Dashboard</h2>
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th width="5%">#</th>
                  <th width="80%">Name</th>
                  <th width="15%">Status</th>
               </tr>
            </thead>
            <tbody id="user_grid">
			   <?php 
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){
			   $status='Offline';
			   $class="btn-danger";
			  //  if($row['last_login']>$time){
				// 	$status='Online';
				// 	$class="btn-success";
			  //  }
			   ?>	
               <tr>
                  <th scope="row"><?php echo $i?></th>
                  <td><?php echo $row['u_firstname']?></td>
                  <td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
               </tr>
			   <?php 
			   $i++;
			   } ?>
            </tbody>
         </table>
      </div>
</div>
<script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'update_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'get_user_status.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},3000);
		
		setInterval(function(){
			getUserStatus();
		},7000);
</script>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	