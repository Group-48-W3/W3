<?php
// include model
require_once("./../../model/inventory/toolModel.php");

if (isset($_POST['addNewToolCategory'])) {
    $con = new Tool();
    $con->addToolCategory();
}
if (isset($_POST['addNewTool'])) {
    $con = new Tool();
    $con->addNewTool();
}
if (isset($_POST['addNewMachine'])) {
    $con = new Tool();
    $con->addNewMachine();
}
if (isset($_POST['replenishTool'])) {
    $con = new Tool();
    $con->replenishTool();
}

class Tool
{
    function __construct()
    {
        $this->index();
    }
    function index()
    {
        //
    }

    function addToolCategory()
    {
        $toolName = $_POST['toolCatName'];
        $toolDesc = $_POST['toolCatDesc'];
        $toolReorderValue = $_POST['toolCatReorderValue'];
        $abcTool = $_POST['abcTool'];

        if (!empty($toolName) && !empty($toolDesc) && !empty($toolReorderValue) && !empty($abcTool)) {
            if (isInTool($toolName)) {
                echo "Category already exist";
                exit;
            } else {
                insertToTool($toolName, $toolDesc, $toolReorderValue, $abcTool);
            }
        } else {
            echo 'All fields are required';
        }
        header('location:./../../view/inventory/replenish.php#newtool'); //redirection
        exit;
    }

    function addNewTool()
    {
        $toolInvCode = $_POST['toolCategory'];
        $toolDesc = $_POST['toolDesc'];
        $toolQuantity = $_POST['toolQuantity'];
        $toolLoc = $_POST['toolLoc'];
        $toolSupplier = $_POST['toolSupplier'];
        $toolDeliver = $_POST['toolDeliver'];

        if (!empty($toolInvCode) && !empty($toolDesc) && !empty($toolLoc) && !empty($toolSupplier) && !empty($toolDeliver)) {
            if (isInToolDetails($toolDesc)) {
                echo "Category already exist";
                exit;
            } else {
                insertToToolDetails($toolInvCode, $toolDesc, $toolQuantity, $toolLoc, $toolSupplier, $toolDeliver);
            }
        } else {
            echo 'All fields are required';
        }
        header('location:./../../view/inventory/replenish.php'); //redirection
        exit;
    }

    function addNewMachine()
    {
        $machineInvCode = $_POST['machineCategory'];
        $machineDesc = $_POST['machineDesc'];
        $machineID = $_POST['registeredID'];
        $machinePrice = $_POST['machinePrice'];
        $machineLoc = $_POST['machineLoc'];
        $machineSupplier = $_POST['machineSupplier'];
        $machineDeliver = $_POST['machineDeliver'];

        if (!empty($machineInvCode) && !empty($machineDesc) && !empty($machineID) && !empty($machinePrice) && !empty($machineLoc) && !empty($machineSupplier) && !empty($machineDeliver)) {
            if (isInMachineDetails($machineID)) {
                echo "Machine ID already exist";
                exit;
            } else {
                insertToMachineDetails($machineInvCode, $machineDesc, $machineID, $machinePrice, $machineLoc, $machineSupplier, $machineDeliver);
            }
        } else {
            echo 'All fields are required';
        }
        header('location:./../../view/inventory/replenish.php'); //redirection
        exit;
    }

    // select all tool categories from db
    function getAllToolCategory()
    {
        $res =  selectAllToolCategories();
        return $res;
    }

    function getTools($invCode)
    {
        $res = getToolsDB($invCode);
        return $res;
    }

    function getMachines($invCode)
    {
        $res =  getMachinesDB($invCode);
        return $res;
    }

    function replenishTool()
    {
        $toolId = $_POST['replenishToolId'];
        $replenishToolAmount = $_POST['replenishToolAmount'];

        if (!empty($replenishToolId) && !empty($replenisToolAmount)) {
            //update database
        } else {
            echo 'All fields are required';
        }
        header('location:./../../view/inventory/replenish.php'); //redirection
        exit;
    }

    function issueTool()
    {
        //to-do
    }
}
