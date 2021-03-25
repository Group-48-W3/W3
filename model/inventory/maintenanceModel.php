<?php
require_once("./../../config/config.php");

function insertToMaintenance()
{
    global $conn;
}

function isInMaintenance($toolId)
{
    global $conn;
    $sql = "select * from maintenance where tool = '" . $toolId . "'";

    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        return 0;
    } else {
        return 1;
    }
}

function addMachineToMaintenance($machine, $reason, $maintainer, $pickup)
{
    global $conn;
    $sql2 = "UPDATE `machine-detailed` SET `status` = '2' WHERE `machine-id` = '$machine'";
    mysqli_query($conn, $sql2);
    $date = Date("Y-m-d");
    $sql1 = "INSERT INTO `maintenance` (`tool`, `reason`, `added-date`, `pickup-date`, `maintenance-by`) VALUES ('" . $machine . "', '" . $reason . "', '" . $date . "', '" . $pickup . "', '" . $maintainer . "')";
    mysqli_query($conn, $sql1);
}

function getMachinesInMaintenance()
{
    global $conn;
    $sql = "SELECT * from `maintenance` WHERE `received-date` IS NULL";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getFinishedMaintenance()
{
    global $conn;
    $date = date('Y-m-d');
    $sql = "SELECT * from `maintenance` WHERE `received-date` IS NULL AND `pickup-date` < '$date'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function getMaintenanceDetailsDB()
{
    global $conn;
    $sql = "SELECT `maintenance`.*, `machine-detailed`.`machine-id`, `machine-detailed`.`reg-id`, `machine-detailed`.`machine-desc` FROM `maintenance`, `machine-detailed` WHERE `machine-detailed`.`machine-id` = `maintenance`.`tool` AND `maintenance`.`received-date` IS NULL";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function getPreviousMaintenanceDB()
{
    global $conn;
    $sql = "SELECT `maintenance`.*, `machine-detailed`.`reg-id`, `machine-detailed`.`machine-desc` FROM `maintenance`, `machine-detailed` WHERE `machine-detailed`.`status` != '2' AND `machine-detailed`.`machine-id` = `maintenance`.`tool`";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function removeMachinefromMaintenance($maintenance, $machine, $cost, $receivedDate)
{
    global $conn;
    $sql1 = "UPDATE `maintenance` SET `cost`='$cost', `received-date` = '$receivedDate' WHERE `maintenance-id` = '$maintenance'";
    mysqli_query($conn, $sql1);
    $sql2 = "UPDATE `machine-detailed` SET `status` = '1' WHERE `machine-id` = '$machine'";
    mysqli_query($conn, $sql2);
}
