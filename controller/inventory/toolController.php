<?php
// include model
    require_once("./../../model/inventory/toolModel.php");
    
    if(isset($_POST['addNewToolCategory'])){
        // echo "condition";
        $con = new Tool();     
        $con->addToolCategory();
    }
    if(isset($_POST['addNewTool'])){
        // echo "condition";
        $con = new Tool();     
        $con->addNewTool();  
    }
    if(isset($_POST['replenishTool'])){
        // echo "condition";
         $con = new Tool();     
         $con->replenishTool();
     }
    class Tool{
        function __construct(){
            $this->index();
        }
        function index(){
            //
        }

        function addToolCategory(){
            $toolName = $_POST['toolCatName'];
            $toolDesc = $_POST['toolCatDesc'];
            $toolReorderValue = $_POST['toolCatReorderValue'];
    
            if(!empty($toolName) && !empty($toolDesc) && !empty($toolReorderValue)){
                if(isInTool($toolName)){
                    echo "Category already exist";
                    exit;
                }else{
                    //get owner permission to execute following command
                    insertToTool($toolName, $toolDesc, $toolReorderValue);
                }
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenish.php');//redirection
            exit;
        }

        function addNewTool(){
            $toolRegID = $_POST['toolRegID'];
            $toolPrice = $_POST['toolPrice'];
            $toolManufacturer = $_POST['toolManufacturer'];
            $toolQuantity = $_POST['toolQuantity'];
            $toolCategory = $_POST['toolCategory'];
    
            if(!empty($toolRegID) && !empty($toolPrice) && !empty($toolManufacturer) && !empty($toolCategory)){
                if(isInToolDetails($toolRegID)){
                    echo "Category already exist";
                    exit;
                }else{
                    //get owner permission to execute following command
                    insertToToolDetails($toolRegID, $toolPrice, $toolManufacturer, $toolQuantity, $toolCategory);
                }
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenish.php');//redirection
            exit;
        }

        function getAllToolCategory(){
            // select all tool categories from db
            $res =  selectAllToolCategories();
            return $res;
        }

        function getTools(){
            $res = getToolsDB();
            return $res;
        }

        function getToolDetails($toolCategoryID){
            $res =  getToolDetailsDB($toolCategoryID);
            return $res;
        }

        function replenishTool(){
            $toolId = $_POST['replenishToolId'];
            $replenishToolAmount = $_POST['replenishToolAmount'];

            if(!empty($replenishToolId) && !empty($replenisToolAmount)){
                //update database
            }else{
                echo 'All fields are required';
            }
            header('location:./../../view/inventory/replenish.php');//redirection
            exit;
        }

        function issueTool(){
            //to-do
        }
    }
