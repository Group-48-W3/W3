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


// Get tools
function getToolsDB($invCode)
{
    global $conn;
    $query = "SELECT * FROM `tool-detailed` WHERE `inv-code`='$invCode'";
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

function updateTool()
{
    global $conn;
}
