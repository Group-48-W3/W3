<?php 
// common to the all controllers
class Controller{
    public $url;
    function __construct(){
        echo "This is a Controller Head quaters";
        $url = rawurldecode($_SERVER['REQUEST_URI']);
        echo $url."<br>";
    }
}

?>