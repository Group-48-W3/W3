<?php 
// common to the all controllers
class Controller{
    function __construct(){
        //echo "This is a Controller Head quaters";
        $url = rawurldecode($_SERVER['REQUEST_URI']);
        echo $url;
    }
}
$con = new Controller();
?>