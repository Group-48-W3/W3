<?php
require_once('./userHeader.php');
?>
<div class="container">
<h1>Permissions</h1>
<h4>Following Details will be Important to identify results and approving the notifications</h4>
<li>
    <ul>Role ID #1 - Admin</ul>
    <ul>Role ID #2 - Owner</ul>
    <ul>Role ID #3 - Accountant</ul>
    <ul>Role ID #4 - Stock Keeper</ul>
</li>

<table class="table table-hover">
    <thead>
    <tr>
        <td>Permission</td>
        <td>Description</td>  
        <td>Module</td>
        <td>User ID</td>
        <td>Role ID</td>
        <td>UserName</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Delete</td>
        <td>expense #12</td>  
        <td>expense</td>
        <td>3</td>
        <td>3</td>
        <td>supun</td>
        <td>
        <a class="btn btn-success" href="#">Approve</a>
        <a class="btn btn-danger" href="#">Decline</a>  
        </td>
    </tr>
    </tbody>
    
</table>

</div>
</body>
</html>