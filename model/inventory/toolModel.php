<?php
require_once("./../../config/config.php");

// Insert new tool category
function insertToTool($toolName, $toolDesc, $toolReorderValue, $abcTool)
{
    global $conn;
    $sql = "INSERT INTO `tool-category` (`inv-desc`, `min-qty`, `tool-name`, `abc-category`) VALUES ('$toolDesc', '$toolReorderValue', '$toolName', '$abcTool')";
    if (mysqli_query($conn, $sql)) {
        echo "Tool category created successfully!";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// Insert new tool
function insertToToolDetails($toolInvCode, $toolDesc, $toolQuantity, $toolLoc, $toolSupplier, $toolDeliver)
{
    global $conn;
    if (empty($toolQuantity)) {
        $sql = "INSERT INTO `tool-detailed` (`delivered-by`, `supplier`, `description`, `tool-qty`, `tool-location`, `inv-code`) VALUES ('$toolDeliver', '$toolSupplier', '$toolDesc', '0', '$toolLoc', '$toolInvCode')";
    } else {
        $sql = "INSERT INTO `tool-detailed` (`delivered-by`, `supplier`, `description`, `tool-qty`, `tool-location`, `inv-code`) VALUES ('$toolDeliver', '$toolSupplier', '$toolDesc', '$toolQuantity', '$toolLoc', '$toolInvCode')";
    }
    if (mysqli_query($conn, $sql)) {
        echo "New tool inserted successfully!";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// Insert new machine
function insertToMachineDetails($machineInvCode, $machineDesc, $machineID, $machinePrice, $machineLoc, $machineSupplier, $machineDeliver)
{
    global $conn;
    $date = Date("Y-m-d");
    $sql = "INSERT INTO `machine-detailed` (`inv-code`, `machine-desc`, `reg-id`, `price`, `supplier`, `delivered-by`, `machine-location`, `status`, `added-date`) VALUES ('$machineInvCode', '$machineDesc', '$machineID', '$machinePrice', '$machineSupplier', '$machineDeliver', '$machineLoc', '1', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "New machine inserted successfully!";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function selectAllToolCategories()
{
    global $conn;
    $query = "SELECT * from `tool-category`";
    $result = mysqli_query($conn, $query);
    return $result;
}

function selectToolCategory($inventoryCode)
{
    global $conn;
    $query = "SELECT * from `tool-category` WHERE `inv-code` = '$inventoryCode'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getMinStockLevel($toolCategory)
{
    global $conn;
    $query = "SELECT `min-qty` from `tool-category` WHERE `inv-code` = '$toolCategory'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $details = mysqli_fetch_array($result);
        return $details['min-qty'];
    } else {
        return 0;
    }
}

// Get tools
function getToolsDB($invCode)
{
    global $conn;
    $query = "SELECT * FROM `tool-detailed` WHERE `inv-code`='$invCode'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getSingleToolDB($tool)
{
    global $conn;
    $query = "SELECT * FROM `tool-detailed` WHERE `tool-id`='$tool'";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Get machines
function getMachinesDB($invCode)
{
    global $conn;
    $sql = "SELECT `machine-detailed`.*, `supplier`.`sup-name` FROM `machine-detailed`INNER JOIN `supplier` ON `machine-detailed`.`supplier` = `supplier`.`sup-id` AND `machine-detailed`.`inv-code`= '$invCode'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getDistinctMachinesDB($invCode)
{
    global $conn;
    $sql = "SELECT DISTINCT `machine-desc` FROM `machine-detailed` WHERE `inv-code`= '$invCode'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Get available machines in inventory
function getMachineCodesByType($type)
{
    global $conn;
    $sql = "SELECT `machine-id`, `reg-id` FROM `machine-detailed` WHERE `machine-desc`= '$type' AND `status` = 1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Check if category exists
function isInTool($toolName)
{
    global $conn;
    $sql = "SELECT * FROM `tool-category` WHERE `tool-name` = '$toolName'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

// Check if tool exists
function isInToolDetails($toolDesc)
{
    global $conn;
    $sql = "SELECT * FROM `tool-detailed` WHERE `description` = '$toolDesc'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

// Check if machine exists
function isInMachineDetails($machineID)
{
    global $conn;
    $sql = "SELECT * FROM `machine-detailed` WHERE `reg-id` = '$machineID'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

function getAvailableToolAmount($toolID)
{
    global $conn;
    $total = 0;
    $inUse = 0;

    $sql1 = "SELECT `tool-qty` FROM `tool-detailed` WHERE `tool-id` = '$toolID'";
    $totalQty = mysqli_query($conn, $sql1);
    $sql2 = "SELECT SUM(`issue-qty`) AS `issued`, SUM(`receive-qty`) AS `received` FROM `issue-tool` WHERE `issue-qty` > `receive-qty` AND `tool-id` = '$toolID'";
    $issueQty = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($totalQty) > 0) {
        $quantity = mysqli_fetch_array($totalQty);
        $total = $quantity['tool-qty'];
        if ($total == 0) {
            return 0;
        }
    }
    if (mysqli_num_rows($issueQty) > 0) {
        $issueAmounts = mysqli_fetch_array($issueQty);
        $inUse = $issueAmounts['issued'] - $issueAmounts['received'];
        if ($inUse == 0) {
            return $total;
        }
    }
    return $total - $inUse;
}

function issueTool($toolType, $amount, $employee)
{
    global $conn;
    $date = date('Y-m-d');
    $sql = "INSERT INTO `issue-tool` (`tool-id`, `issue-qty`, `emp-id`, `issue-date`) VALUES ('$toolType', '$amount', '$employee', '$date')";
    mysqli_query($conn, $sql);
}

function issueMachineDB($machineID, $employee)
{
    global $conn;
    $date = date('Y-m-d');
    $sql1 = "INSERT INTO `issue-machine` (`machine-id`, `emp-id`, `issue-date`) VALUES ('$machineID', '$employee', '$date')";
    mysqli_query($conn, $sql1);
    $sql2 = "UPDATE `machine-detailed` SET `status`='0' WHERE `machine-id`='$machineID'";
    mysqli_query($conn, $sql2);
}

function getIssueDetailsDB()
{
    global $conn;
    $sql = "SELECT `issue-tool`.*, `employee`.`emp_name`, `tool-detailed`.`description` FROM `issue-tool`, `employee`, `tool-detailed` WHERE `tool-detailed`.`tool-id` = `issue-tool`.`tool-id` AND `employee`.`emp_id`= `issue-tool`.`emp-id` ORDER BY `issue-tool`.`issue-date` DESC, `issue-tool`.`receive-qty` ASC";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function getMachineIssueDetailsDB()
{
    global $conn;
    $sql = "SELECT `issue-machine`.*, `employee`.`emp_name`, `machine-detailed`.`machine-desc`, `machine-detailed`.`reg-id` FROM `issue-machine`, `employee`, `machine-detailed` WHERE `machine-detailed`.`machine-id` = `issue-machine`.`machine-id` AND `employee`.`emp_id`= `issue-machine`.`emp-id` ORDER BY `issue-machine`.`issue-date` DESC, `issue-machine`.`received-date` ASC";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function setToolReceived($issueID, $receiveAmount)
{
    global $conn;
    $sql = "UPDATE `issue-tool` SET `receive-qty` = `receive-qty`+'$receiveAmount' WHERE `issue-id` = '$issueID'";
    mysqli_query($conn, $sql);
}

function setMachineReceived($issueID, $machineID)
{
    global $conn;
    $date = date('Y-m-d');
    $sql1 = "UPDATE `issue-machine` SET `received-date` = '$date' WHERE `issue-id` = '$issueID'";
    mysqli_query($conn, $sql1);
    $sql2 = "UPDATE `machine-detailed` SET `status` = '1' WHERE `machine-id` = '$machineID'";
    mysqli_query($conn, $sql2);
}

function updateTool()
{
    global $conn;
}
