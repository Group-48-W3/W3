<!-- This is User Model Class -->
<!-- Core Features
	1. Get User 2. Register User 3. Delete User 4. Update User 5. Get User Role ID
-->
<?php
// import database settings
require_once('./../inc/config.php'); 

function getUser($email,$password){

}
function getUserRoleID($id){
	global $conn;
    
    $query = "select user_role from tbl_user_role where  id = ".$id;

    $rs = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($rs);
	
	return $row['user_role'];
}

?>