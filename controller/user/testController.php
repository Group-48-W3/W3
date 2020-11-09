<?php 

class TestController{
    function index($header,$message,$date){
        //echo "This is Controller";
        echo $header." ".$message." ".$date;// pass to view
    }
}
?>