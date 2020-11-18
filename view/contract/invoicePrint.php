<?php
 session_start();
 require_once('./../../controller/user/userController.php'); 
 require_once('./header.php');
 ?>

<div class="container">
    <h1>Print Invoice</h1>
    <h6>View of the printable invoice</h6>
    <img src="./../../public/img/invo.jpg" alt="Invoice">
</div>
<div class="container">
    <button class="btn btn-secondary">Print</button>  
    <button class="btn btn-secondary">Download as PNG</button>  
</div>

<?php
  require_once('leftSidebar.php'); 
  require_once('footer.php'); 
?>	