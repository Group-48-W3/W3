<?php
session_start();
echo "hi";
$uid=$_SESSION['u_id'];
$time=time()+10;
require_once('./../../controller/user/userController.php');
// update the user status
updateUserStatus($uid,$time);
?>