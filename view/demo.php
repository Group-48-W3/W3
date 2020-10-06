<?php 
    echo "demo page "."</br>";
    /* User's password. */
$password = '12345';

/* MD5 hash to be saved in the database. */
$hash = md5($password);
echo $hash."</br>";
$hash2 = password_hash($password, PASSWORD_DEFAULT);
echo $hash2."</br>";
/* Set the "cost" parameter to 12. */
$options = ['cost' => 12];

/* Create the hash. */
$hash3 = password_hash($password, PASSWORD_DEFAULT);
echo $hash3."</br>";
?>
