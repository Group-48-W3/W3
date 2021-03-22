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
  $con = new Contract();
  $result = $con->getAllActiveContracts();
?>
<div class="container">
<h2>Report View</h2>
</div>

<?php
  require_once('leftSidebarReport.php'); 
  require_once('footer.php'); 
?>