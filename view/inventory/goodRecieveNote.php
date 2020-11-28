<?php 
	session_start();
	
	if(!isset($_SESSION['u_id'],$_SESSION['r_id'])){
		header('location:index.php?lmsg=true');
		exit;
	}		
	
  require_once('../../controller/user/userController.php');
  require_once('header.php');
?>

<h2>Good Recieve Note</h2>
<div class="container center">
  <img src="../../public/img/goodRecieveNote.png" alt="" width="800"><br>
  <button class="btn btn-primary">Send as email</button>
  <button class="btn btn-primary">Download PDF</button>
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	