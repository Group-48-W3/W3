<?php
session_start();

$uid=$_SESSION['u_id'];
$time=time();
require_once('./../../controller/user/userController.php');
$res = getUserStatus();
$i=1;
static $a = 1;
$html='';
while($row=mysqli_fetch_assoc($res)){
	$status='Offline';
	$class="btn-danger";
	if($row['last_login']>$time){
		$status='Online';
		$class="btn-success";
	} 
    if($row['r_id'] == 1 && $a%2 != 0){
        $row['r_id']  = "Admin";
      }else if($row['r_id'] == 2){
        $row['r_id'] = "Owner";
      }else if($row['r_id'] == 3){
        $row['r_id'] =  "Accountant";
      }else if($row['r_id'] == 4){
        $row['r_id'] =  "Stock Keeper";
      }else if($row['r_id'] == 5){
        $row['r_id'] = "Manager";
      }
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
                  <td>'.$row['u_firstname']." ".$row['u_lastname'].'</td>
                  <td>'.$row['r_id'].'</td>
                  <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>';
	$i++;
    $a++;
}
echo $html;
?>