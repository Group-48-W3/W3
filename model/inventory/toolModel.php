<?php
require_once("./../../config/config.php");

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

function insertToToolDetails($toolRegID, $toolPrice, $toolManufacturer, $toolQuantity, $toolCategory)
{
    global $conn;
    if (empty($toolQuantity)) {
        $sql = "INSERT INTO `tool_detail` (`tool_id`, `tool_manu`, `tool_avl`, `tool_qty`, `tool_value`, `inv_code`) VALUES ('$toolRegID', '$toolManufacturer', 'Yes', '0', '$toolPrice', '$toolCategory')";
    } else {
        $sql = "INSERT INTO `tool_detail` (`tool_id`, `tool_manu`, `tool_avl`, `tool_qty`, `tool_value`, `inv_code`) VALUES ('$toolRegID', '$toolManufacturer', 'Yes', '$toolQuantity', '$toolPrice', '$toolCategory')";
    }
    if (mysqli_query($conn, $sql)) {
        echo "New tool inserted successfully!";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function selectAllToolCategories()
{
    global $conn;
    $query = "select * from tool";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getToolsDB()
{
    global $conn;
    $query = "select * from tool_detail";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getToolDetailsDB($toolCategoryID)
{
    global $conn;
    $sql = "select * from tool_detail where inv_code = '" . $toolCategoryID . "'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//Check if category exists
function isInTool($toolName)
{
    global $conn;
    $sql = "SELECT * from `tool-category` WHERE `tool-name` = '$toolName'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

function isInToolDetails($toolRegID)
{
    global $conn;
    $sql = "select * from tool_detail where tool_id = '" . $toolRegID . "'";

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
