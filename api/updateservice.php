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
	
	echo $ServiceName;
	exit();
	if($ServiceName == "" && $Cost == ""){
		echo 'Field can not be empty';
	}else if($ServiceName == ""){
		$query = "UPDATE `tblservices` SET Cost = '$Cost' WHERE ID = '$id'";
	}else if($Cost == ""){
		$query = "UPDATE `tblservices` SET ServiceName = '$ServiceName' WHERE ID = '$id'";
	}else{
		$query = "UPDATE `tblservices` SET ServiceName = '$ServiceName', Cost = '$Cost' WHERE ID = '$id'";
	}
    //$query = "UPDATE `tblservices` SET ServiceName = '$ServiceName', Cost = '$Cost' WHERE ID = '$id'";
    $result = $link->query($query);

    
    if($result){
        echo 'Service updated successfully.';
    } else{
        echo 'Failed to update service.';
    }
?>