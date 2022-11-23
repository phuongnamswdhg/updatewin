<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,
        Authorization, X-Requested_With");

    include_once 'database.php';
    include_once  'employees.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Employees($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->id = $data->id;
    $item->name = $data->name;
    $item->email = $data->email;
    $item->age= $data->age;
    $item->mobile =$data->mobile;
    $item->created = $data('Y-m-d H-i-s');

    if($item->updateEmployee()){
        echo json_encode("Employee data update.");
    }else{
        echo json_encode("Data could not be updated");
    }
?>