<?php
  require_once('./../../config/config.php');
 
  if (isset($_POST['query'])) {
     
    $query = "SELECT * FROM furniture_item WHERE item_name LIKE '{$_POST['query']}%' LIMIT 5";
    $result = mysqli_query($conn, $query);
 
  if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      echo $user["item_id"]." ".$user['item_name']."<br/>";
    }
  } else {
    echo "<p style='color:red'>User not found...</p>";
  }
 
}
?>