<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once 'conn.php';

    $query = "SELECT * FROM tblservices";
    $result = $link->query($query);
    $itemCount = mysqli_num_rows($result);

    if($itemCount > 0){
        
        $service_arr = array();
        $service_arr["body"] = array();

        while ($row = $result->fetch_assoc()){
            $e = array(
                "id" =>  $row['ID'],
                "ServiceName" => $row['ServiceName'],
                "Cost" => $row['Cost'],
                "CreationDate" => $row['CreationDate']
            );
            array_push($service_arr["body"], $e);
        }
        http_response_code(200);
        echo json_encode($service_arr);
    }else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>