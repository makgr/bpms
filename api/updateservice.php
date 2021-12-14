<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'conn.php';

    $id = isset($_GET['id']) ? $_GET['id'] : die();
    $ServiceName = isset($_GET['ServiceName']) ? $_GET['ServiceName'] : die();
    $Cost = isset($_GET['Cost']) ? $_GET['Cost'] : die();


    $query = "UPDATE `tblservices` SET ServiceName = '$ServiceName', Cost = '$Cost' WHERE ID = '$id'";
    $result = $link->query($query);

    
    if($result){
        echo 'Service updated successfully.';
    } else{
        echo 'Failed to update service.';
    }
?>