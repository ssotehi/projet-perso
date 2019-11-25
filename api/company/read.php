<?php
// required header
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/company.php';
 
// instantiate database and company object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$company = new Company($db);
 
// query companies
$stmt = $company->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // users array
    $companies_arr=array();
    $companies_arr["companies"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        // just $name only
        extract($row);
 
        $company_item=array(
            "id" => $id,
            "name" => $name
        );
 
        array_push($companies_arr["companies"], $company_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show companies data in json format
    echo json_encode($companies_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no companies found
    echo json_encode(
        array("message" => "No companies found.")
    );
}
?>