<?php 
require_once('./../../controller/user/userController.php');
require_once('./header.php');

?>

<div class="container">
<h1>Permissions</h1>
<h4>Following Details will be Important to identify results and approving the notifications</h4>
<ul>
    <li>Role ID #1 - Admin</li>
    <li>Role ID #2 - Owner</li>
    <li>Role ID #3 - Accountant</li>
    <li>Role ID #4 - Stock Keeper</li>
</ul>

<table>
    <thead>
    <tr>
        <th>Permission</th>
        <th>Description</th>  
        <th>Module</th>
        <th>User ID</th>
        <th>Role ID</th>
        <th>UserName</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td data-label="Permission">Delete</td>
        <td data-label="Description">expense #12</td>  
        <td data-label="Module">expense</td>
        <td data-label="User ID">3</td>
        <td data-label="Role ID">3</td>
        <td data-label="UserName">supun</td>
        <td data-label="Action">
            <a class="btn btn-success" href="#">Approve</a>
            <a class="btn btn-danger" href="#">Decline</a>  
        </td>
    </tr>
    </tbody>
    
</table>

</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	