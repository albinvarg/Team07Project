<?php
require_once('./writing.php');

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $input = json_decode(file_get_contents("php://input"), true);

  $taskName = $input["name"] ?? null; 
  $taskDate = $input["date"] ?? null;  
  $taskDescription = $input["description"] ?? null;
  $taskCategory = $input["category"] ?? null;

  newTask(21, 2, $taskName, $taskDescription, $taskCategory, $taskDate);

}
