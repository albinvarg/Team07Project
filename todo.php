<?php

require("./read.php");

function getMemberTasks($employee_id) {
  $tasks = read_csv('employee_id', './tasks.csv');
  $employee_tasks = $tasks[$employee_id];

  print_r($employee_tasks);

  return $employee_tasks;
}

function getManagerTasks($employee_id) {
  $employees_by_id = read_csv('employee_id', './employees.csv');
  $team = $employees_by_id[$employee_id]['team'];

  $employ_by_team = read_csv('team', './employees.csv');
  $members = $employ_by_team[$team];

  $tasks = [];

  foreach($members as $member) {
    $tasks[$member['forename'] . ' ' . $member['surname']] = getMemberTasks($member['employee_id']);
  }

  print_r($tasks);
  
}

function getUserTasks($employee_id) {
  //read the tasks file in terms of the employee_id
  $roles = read_csv("employee_id", './roles.csv');

  if ($roles[$employee_id]['role'] == 'member') {
    $user_tasks = getMemberTasks($employee_id);
  } else {
    $user_tasks = getManagerTasks($employee_id);
  }
}


