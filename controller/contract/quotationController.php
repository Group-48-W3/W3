<?php
require_once("./../../model/quotationModel.php");

class Quotation{
    // constructor function
    function __construct(){
        //"here is constructor";
        $this->index();
    }
    // index function
    function index(){
        // include the abstract data input for the functions
    }
    // add quotation controller function
    function addQuotation(){
        //echo "add quotation";
        $q_id= $_POST['q_name'];
        $q_desc = $_POST['q_desc'];
        $q_budget = $_POST['q_budget'];
        $q_img = $_POST['q_img'];

        $target_dir = "uploads/quotation/";
        $target_file = $target_dir . basename($_FILES["q_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $image=basename( $_FILES["imageUpload"]["name"],".jpg"); 
        // used to store the filename in a variable

        //storind the data in your database
        $query= "INSERT INTO items VALUES ('$id','$title','$description','$price','$value','$contact','$image')";
        mysql_query($query);

        echo "Your add has been submited";
        header( "Refresh:3; url=account.php", true, 303);
    }
    // get all quotations
    function getAllQuotation(){
        $res =  getAllQuotationDB();
        return $res;
        
    }
    function getSingleQuotation(){

    }
    
}
?>