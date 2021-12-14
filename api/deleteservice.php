<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'conn.php';

    $id = isset($_GET['id']) ? $_GET['id'] : die();


    $query = "DELETE FROM `tblservices` WHERE ID = '$id'";
    $result = $link->query($query);

    
    if($result){
        echo 'Service deleted successfully.';
    } else{
        echo 'Failed to delete service.';
    }
?>