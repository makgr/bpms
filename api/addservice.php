<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'conn.php';

    // $data = json_decode(file_get_contents("php://input"));
    $ServiceName = isset($_GET['ServiceName']) ? $_GET['ServiceName'] : die();
    $Cost = isset($_GET['Cost']) ? $_GET['Cost'] : die();


    //$ServiceName = $data->ServiceName;
    // $Cost = $data->Cost;

    $query = "INSERT INTO `tblservices`(`ServiceName`, `Cost`) VALUES ('$ServiceName','$Cost')";
    $result = $link->query($query);
    $getId = mysqli_insert_id($link);
    
    if($getId != NULL){
        echo 'Service added successfully.';
    } else{
        echo 'Failed to add service.';
    }
?>