<?php
  require_once('./../header.php');
  require_once('left_sidebar.php');
?>


<html>

 <head>
  <title>Issue</title>    
 </head>
 <body bgcolor="white">
  
  
  <?php  

   $mysqli= NEW MYSQLi('localhost','root','','issue');
   $resultSet= $mysqli->query("SELECT #item_name FROM #item_list"); //get values from db

  ?>

   <form id="issue" name="issue" method="post" action="<?php echo $PHP_SELF;?>">
     Select item:
    <?php  
         while($rows = $resultSet->fetch_assoc())
     {
         $item_name = $rows['item_name'];
         echo " <option value = '$item_name'>$item_name</option>";
     }
      ?> 


        
  <?php  

$mysqli= NEW MYSQLi('localhost','root','','issue');
$resultSet= $mysqli->query("SELECT #contra ct_name FROM #contract_list"); //get values from db

?>

<form id="issue" name="issue" method="post" action="<?php echo $PHP_SELF;?>">
  Select contract:
 <?php  
      while($rows = $resultSet->fetch_assoc())
  {
      $item_name = $rows['item_name'];
      echo " <option value = '$item_name'>$item_name</option>";
  }
   ?> 


   
   
   
   
   
   
   
   
   </form>
     
 </body>
    
</html>

<?php
   require_once('footer.php');
?>