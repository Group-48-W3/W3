<?php 
session_start();
if(!isset($_SESSION['u_id'],$_SESSION['r_id']))
	{
		header('location:index.php?lmsg=true');
		exit;
  }
  require_once('./../../controller/expense/expenseController.php');
    //payment object
    $payment = new Payment();
    $result3 = $payment->viewSchedule();
    require_once('../../controller/user/userController.php');
    include_once('header.php');
    require_once('Schedule.php'); 
    require_once('leftSidebar.php'); 
    require_once('footer.php'); 
?>	