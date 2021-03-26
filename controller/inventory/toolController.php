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
if (isset($_POST['issueTool'])) {
    $con = new Tool();
    $con->issueTool();
}
if (isset($_POST['toolIssueConfirmed'])) {
    $con = new Tool();
    $con->issueToolConfirm();
}
if (isset($_POST['issueMachine'])) {
    $con = new Tool();
    $con->issueMachine();
}
if (isset($_POST['receiveTool'])) {
    $con = new Tool();
    $con->receiveTool();
}
if (isset($_POST['receiveMachine'])) {
    $con = new Tool();
    $con->receiveMachine();
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

    function getSingleToolCategory($inventoryCode)
    {
        $res =  selectToolCategory($inventoryCode);
        if (mysqli_num_rows($res) > 0) {
            $details = mysqli_fetch_array($res);
            return $details;
        }
        return 0;
    }

    function getTools($invCode)
    {
        $res = getToolsDB($invCode);
        return $res;
    }

    function getSingleTool($toolID)
    {
        $res = getSingleToolDB($toolID);
        if (mysqli_num_rows($res) > 0) {
            $details = mysqli_fetch_array($res);
            return $details;
        }
        return 0;
    }

    function getMachines($invCode)
    {
        $res =  getMachinesDB($invCode);
        return $res;
    }

    function getDistinctMachines($invCode)
    {
        $res =  getDistinctMachinesDB($invCode);
        return $res;
    }

    function getMachineIDs($type)
    {
        $res = getMachineCodesByType($type);
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

    function getAvailableQuantity($tool)
    {
        $res = getAvailableToolAmount($tool);
        return $res;
    }

    function issueTool()
    {
        $toolCategory = $_POST['toolCategory'];
        $toolType = $_POST['toolId'];
        $amount = $_POST['issueAmount'];
        $employee = $_POST['toolEmployeeID'];

        if (!empty($toolCategory) && !empty($toolType) && !empty($amount) && !empty($employee)) {
            $available = getAvailableToolAmount($toolType);
            $minStockLevel = getMinStockLevel($toolCategory);
            if ($available > $amount) {
                if ($minStockLevel <= $available - $amount) {
                    issueTool($toolType, $amount, $employee);
                } else {
                    session_start();
                    $_SESSION['toolCategory'] = $toolCategory;
                    $_SESSION['toolType'] = $toolType;
                    $_SESSION['toolAmount'] = $amount;
                    $_SESSION['toolEmployee'] = $employee;
                    $_SESSION['toolAvailable'] = $available;
                    $_SESSION['minStockLevel'] = $minStockLevel;
                    header('location:./../../view/inventory/issueSubmitTool.php');
                    exit;
                }
            } else {
                echo 'Not enough tools available';
            }
        } else {
            echo 'All fields are required';
        }
        header('location:./../../view/inventory/issue.php#issueTool.php'); //redirection
        exit;
    }
    function issueToolConfirm()
    {
        $toolType = $_POST['toolType'];
        $amount = $_POST['amount'];
        $employee = $_POST['employee'];
        issueTool($toolType, $amount, $employee);
        header('location:./../../view/inventory/issue.php#issueTool.php');
    }
    function issueMachine()
    {
        $machineCategory = $_POST['machineCategory'];
        $machineType = $_POST['machineType'];
        $machineID = $_POST['machineRegID'];
        $employee = $_POST['machineEmployeeID'];
        if (!empty($machineCategory) && !empty($machineType) && !empty($machineID) && !empty($employee)) {
            issueMachineDB($machineID, $employee);
            header('location:./../../view/inventory/issue.php#issueTool.php'); //redirection
        } else {
            echo 'All fields are required';
        }
        exit;
    }
    function getIssueDetails()
    {
        $res = getIssueDetailsDB();
        return $res;
    }

    function getIssueDetailsOfMachines(){
        $res = getMachineIssueDetailsDB();
        return $res;
    }

    function receiveTool()
    {
        $issueID = $_POST['issueID'];
        $receiveAmount = $_POST['receiveAmount'];
        setToolReceived($issueID, $receiveAmount);
        header('location:./../../view/inventory/issue.php#recentIssues');
    }

    function receiveMachine(){
        $issueID = $_POST['issueID'];
        $machineID = $_POST['machineID'];
        setMachineReceived($issueID, $machineID);
        header('location:./../../view/inventory/issue.php#recentIssues');
    }
}
