<?php 
//default start location of the program
//redirect to the login view page
session_start();

// import database settings
require_once('inc/config.php'); 
// import login controller
require_once('controller/login/loginController.php');
// import login page
require_once('view/login/login_view.php');

// end of index page
?>	
