<?php
 include_once('header.php');
require_once('./../../controller/user/userController.php');
 ?>

<div class="container">
    <h1>Print Invoice</h1>
    <h6>View of the printable invoice</h6>
    <img src="./../../public/img/invo.jpg" alt="Invoice">
</div>
<div class="container">
    <button class="btn-secondary">Print</button>  
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	