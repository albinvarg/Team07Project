<?php
//USAGE: url: /todo_list_api.php?employee_id=0 
//(You put the employee id in the url)

// Set headers to allow CORS and JSON response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
//header("Access-Control-Allow-Methods: POST");

require_once('./todo.php');
require_once('./get_user_info.php');

/*
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input data
    $inputData = json_decode(file_get_contents("php://input"), true);

    // Example: process the input data (e.g., store, compute, etc.)
    if (isset($inputData['employee_id'])){
        $employee_id = htmlspecialchars($inputData['employee_id']);

        // Example response
        $response = getUserTasks($employee_id);

        // Send a JSON response
        echo json_encode($response);
    } else {
        http_response_code(400); // Bad request
        echo json_encode(["error" => "Invalid input data"]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["error" => "Only POST requests are allowed"]);
}
 */

// Set headers to allow CORS and JSON response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Check if the required parameters are present
if (isset($_GET['employee_id'])) {
    $employee_id = htmlspecialchars($_GET['employee_id']);

    // Example response
    $response = getUserTasks($employee_id);
    $role = getRoleById($employee_id);

    $response['role'] = $role;

    // Send a JSON response
    echo json_encode($response);
} else {
    http_response_code(400); // Bad request
    echo json_encode(["error" => "Missing required parameters"]);
}


