<?php
require_once("./../../config/config.php");

// create new raw material category
function insertRawMaterialCategory($materialName, $materialDescription, $materialReorderValue, $materialAbcCategory)
{
    global $conn;
    //insert to database
    $sql = "INSERT INTO `raw-material-category` (`inv-desc`, `min-qty`, `mat-name`, `abc-category`) VALUES ('$materialDescription', '$materialReorderValue', '$materialName', '$materialAbcCategory')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            if (confirm('Raw Material category has been successfully created!')) {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            } else {
                window.location.replace(\"./../../view/inventory/replenish.php\");
            }</script>";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

// check if category exists
function isInRawMaterial($materialName)
{
    global $conn;
    $sql = "select * from `raw-material-category` where `mat-name` = '" . $materialName . "'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

// get al raw material categories
function selectAllRawMaterialCategories()
{
    global $conn;
    $query = "select * from `raw-material-category`";
    $result = mysqli_query($conn, $query);
    return $result;
}

function selectRawMaterialCategoryDB($matId)
{
    global $conn;
    $query = "select * from `raw-material-category` where `inv-code`='$matId'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getSingleMaterial($material)
{
    global $conn;
    $query = "SELECT * FROM `raw-material-category` WHERE `inv-code` = '$material'";
    $result = mysqli_query($conn, $query);
    return $result;
}

// add new batch for a category
function addNewBatch($replenishMaterialId, $replenishMaterialAmount, $replenishUnitPrice, $replenishLocation, $replenishPeriod, $replenishSupplier, $replenishDelivery)
{
    global $conn;
    $date = Date("Y-m-d");
    $sql = "INSERT INTO `raw-material-batch` (`added-date`, `end-date`, `unit-price`, `batch-quantity`, `stored-location`, `inv-code`, `delivered-by`, `supplier`) VALUES ('$date', '$replenishPeriod', '$replenishUnitPrice', '$replenishMaterialAmount', '$replenishLocation', '$replenishMaterialId', '$replenishDelivery', '$replenishSupplier')";
    mysqli_query($conn, $sql);
}

function getBatchDetailsDB($inventoryCode)
{
    global $conn;
    $date = date("Y-m-d");
    $sql = "SELECT COUNT(`batch-id`) AS `batch-count`, SUM(`batch-quantity`) AS `total-amount`, CAST(AVG(`unit-price`) AS DECIMAL(10,2)) AS `avg-price` FROM `raw-material-batch` WHERE `inv-code`= '$inventoryCode' AND `end-date` >= '$date'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAllBatchDetailsWhere($inventoryCode)
{
    global $conn;
    $sql = "SELECT `raw-material-batch`.*, `supplier`.`sup-name` FROM `raw-material-batch` INNER JOIN `supplier` ON `raw-material-batch`.`supplier` = `supplier`.`sup-id` AND `raw-material-batch`.`inv-code`= '$inventoryCode' ORDER BY `added-date`";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getSingleBatchDetailsWhere($batch)
{
    global $conn;
    $sql = "select * from `raw-material-batch` where `batch-id` = '$batch'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getAvailableQuantity($material)
{
    global $conn;
    $date = date("Y-m-d");
    $sql = "SELECT SUM(`batch-quantity`) AS amount FROM `raw-material-batch` WHERE `inv-code`='$material' AND `end-date` >= '$date'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $amount = $row['amount'];
    return $amount;
}

function getReorderValue($material)
{
    global $conn;
    $sql = "SELECT `min-qty` FROM `raw-material-category` WHERE `inv-code`='$material'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $amount = $row['min-qty'];
    return $amount;
}

function issueFromRawMaterial($material, $quantity)
{
    global $conn;
    $date = date("Y-m-d");
    $sql1 = "SELECT * FROM `raw-material-batch` WHERE `batch-quantity` > 0 AND `end-date` > '$date' AND `inv-code` = '$material' ORDER BY `end-date` ASC";
    $result = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_array($result);
    while ($quantity > 0) {
        $batchID = $row['batch-id'];
        if ($row['batch-quantity'] >= $quantity) {
            $newQuantity = $row['batch-quantity'] - $quantity;
            $quantity = 0;
            $sql2 = "UPDATE `raw-material-batch` SET `batch-quantity` = '$newQuantity' WHERE `batch-id` = '$batchID'";
            mysqli_query($conn, $sql2);
        } else {
            $sql3 = "UPDATE `raw-material-batch` SET `batch-quantity` = 0 WHERE `batch-id` = '$batchID'";
            mysqli_query($conn, $sql3);
            $quantity = $quantity - $row['batch-quantity'];
            $row = mysqli_fetch_array($result);
        }
    }
}

function finishIssue($material, $quantity, $contract, $employee)
{
    global $conn;
    $date = date("Y-m-d");
    $sql = "INSERT INTO `issue-raw-material` (`inv-code`, `quantity`, `employee`, `contract`, `date`) VALUES ('$material', '$quantity', '$employee', '$contract', '$date')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
            if (confirm('Issue successful!')) {
                window.location.replace(\"./../../view/inventory/issue.php\");
            } else {
                window.location.replace(\"./../../view/inventory/issue.php\");
            }</script>";
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

function getRawMaterialIssues()
{
    global $conn;
    $sql = "SELECT `i`.`date`, `r`.`mat-name`, `i`.`quantity`, `e`.`emp_name`, `c`.`con_name` FROM `issue-raw-material` AS `i`, `raw-material-category` AS `r`, `employee` AS `e`, `contract` AS `c`WHERE `c`.`con_id` = `i`.`contract` AND `e`.`emp_id` = `i`.`employee` AND `r`.`inv-code` = `i`.`inv-code` ORDER BY `i`.`date` DESC";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function getExpiredBatches()
{
    global $conn;
    $today = date("Y-m-d");
    $sql = "SELECT * FROM `raw-material-batch` WHERE `end-date` < '$today' AND `batch-quantity` > 0";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getReOrderMaterials()
{
    global $conn;
    $sql = "SELECT SUM(`batch-quantity`) AS `available`, `inv-code` FROM `raw-material-batch` GROUP BY `inv-code`";
    $result = mysqli_query($conn, $sql);
    return $result;
}
function updateMatCatDB($mName, $mDesc, $mMinQty, $abc, $matId)
{
    global $conn;
    $sql = "UPDATE `raw-material-category` SET `inv-desc` = '$mDesc', `mat-name` = '$mName', `min-qty` = '$mMinQty', `abc-category` = '$abc' WHERE `inv-code` = '$matId'";
    mysqli_query($conn, $sql);
}
function updateBatchDB($batchId, $bLoc, $bDate, $bQty, $bPrice)
{
    global $conn;
    $sql = "UPDATE `raw-material-batch` SET `end-date` = '$bDate', `stored-location` = '$bLoc', `batch-quantity` = '$bQty', `unit-price` = '$bPrice' WHERE `batch-id` = '$batchId'";
    mysqli_query($conn, $sql);
}
function getAllIssueRawMaterialContractDB($id){
    global $conn;
    $sql = "select * from `issue-raw-material` where contract = '$id'";
    $result = mysqli_query($conn, $sql);
    return $result;
}