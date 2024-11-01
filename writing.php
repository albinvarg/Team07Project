<?php
require_once './read.php';

function addEmployee($employee_id, $forename, $surname, $email, $team) {
    $file = fopen("employees.csv", "a"); //append new lines
    if ($file !== false) {
        $employee_data = [$employee_id, $forename, $surname, $email, $team];
        fputcsv($file, $employee_data); //write the array as a new row
        fclose($file);
        echo "Employee added";
    } else {
        echo "Failed to open file";
    }
}

function addRegistration($email, $password) {
    $file = fopen("registrations.csv", "a"); //append new lines
    if ($file !== false) {
        $registration_data = [$email, $password];
        fputcsv($file, $registration_data); //write the array as a new row
        fclose($file);
        echo "Registration added";
    } else {
        echo "Failed to open file";
    }
}

/* employee_id - integer
 * $role - boolean
 *
 * if role is true, then they are a manager, if role is false they are a member
 */

function addRole($employee_id, $role) {
    $file = fopen("roles.csv", "a"); //append new lines
    if ($file !== false) {
      if ($role) {
        $type = 'manager';
      } else {
        $type = 'member';
      }
      $role_data = [$employee_id, $type];
        fputcsv($file, $role_data); //write the array as a new row
        fclose($file);
        echo "Role added";
    } else {
        echo "Failed to open file";
    }
}

function newTask($task_id, $employee_id, $description, $topic, $date) {
  $status = 'not started';
    $file = fopen("tasks.csv", "a"); //append new lines
    if ($file !== false) {
        $task_data = [$task_id, $employee_id, $description, $topic, $date, $status];
        fputcsv($file, $task_data);
        fclose($file);
        echo "Task added";
    } else {
        echo "Failed to open file";
    }
}

function updateTask($task_id, $task) {
  $data = read_csv('task_id', './tasks.csv');
  foreach ($task as $key => $val) {
    $data[$task_id][$key] = $val;
  }

  $file = fopen('tasks.csv', 'w');
  fputcsv($file, ['task_id', 'employee_id', 'description', 'topic', 'status']);

  foreach ($data as $key => $val) {
    $data = [];
    foreach ($val as $k => $v) {
      $data[] = $v;
    }
    fputcsv($file, $data);
  }
  fclose($file);
}

//updates the status of the task with the task_id and the new status
// 1 -> not started
// 2 -> started
// 3 -> completed

function updateTaskStatus($task_id, $status) {
  switch ($status)  {
  case 1: 
    $stat = "not started";
    break;
  case 2: 
    $stat = 'started';
    break;
  case 3: 
    $stat = 'completed';
    break;
  default: 
    break;
  }

  $data = read_csv('task_id', './tasks.csv');
  $task = $data[$task_id];

  $task['status'] = $stat;
  updateTask($task_id, $task);
}

addRole(2, false);
addRole(3, false);
addRole(4, false);
