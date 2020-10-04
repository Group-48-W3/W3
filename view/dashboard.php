<?php 
	session_start();
	
	if(!isset($_SESSION['id'],$_SESSION['user_role_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
	}		
	
	require_once('../inc/config.php');
	require_once('header.php'); 
	require_once('left_sidebar.php'); 
	
	
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        
      </ol>
      <h1>Welcome to Dashboard</h1>
      <hr>
      <h3>You are login as <strong><?php echo getUserAccessRoleByID($_SESSION['user_role_id']); ?></strong></h3>
	  
		<ul>
			<li><strong>John Doe</strong> has <strong>Administrator</strong> rights so all the left bar items are visible to him</li>
			<li><strong>Sahan</strong> has <strong>Contract</strong> rights and he doesn't have access to Settings</li>
			<li><strong>Shanuka</strong> has <strong>Accountant</strong> rights and she can't have access to Appearance, Components and Settings</li>
			<li><strong>Udara</strong> has <strong>Stock Keeper</strong> rights and he has only access Relevant</li>
			<li><strong>Supun</strong> has <strong>Dashboard Faility</strong> rights and he has only access Relevant</li>
		</ul>	

      
      <div style="height: 1000px;"></div>
    </div>
    <!-- /.container-fluid-->
	
<?php require_once('footer.php'); ?>	