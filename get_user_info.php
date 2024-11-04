<?php

require_once('./read.php');

// find who's on the same team as an employee with the employee_id
function getTeamMembersById($employee_id) {
  $employees = read_csv('employee_id', './employees.csv');
  $team = $employees[$employee_id]['team'];

  $employees = read_csv('team', './employees.csv');
  $members = $employees[$team];

  return $members;
}


//INCOMPLETE - don't use
//get employee id from their full name
function getIDByName($forename, $surname) {
  $employees_fore = read_csv('forename', './employees.csv');

  //check if the forename file is unique
  if (is_key_unique($employees_fore)) {
    return $employees_fore[$forename]['employee_id'];
  }

  //check if the specific key is unique
  if (count($employees_fore[$forename]) == 1) {
    return $employees_fore[$forename][0]['employee_id'];
  }

  $employees_sur = read_csv('surname', './employees.csv');

  //check if surname file is unique
  if (is_key_unique($employees_sur)) {
    return $employees_sur[$surname]['employee_id'] ;
  }

  //check if specific surname is unique
  if (count($employees_sur[$surname]) == 1) {
    return $employees_sur[$surname][0]['employee_id'];
  }

  //surname is not unique and forename is not unique
  //try find unique pair

  $unique = true;

  foreach($employees_sur[$surname] as $employee) {
    if ($employee['forename'] == $forename) {}
  }

}

// get employee id from their email
function getIDByEmail($email) {
  $employees = read_csv('email', 'employees.csv');

  return $employees[$email]['employee_id'];
}

// read the employees.csv file in with the keys as their id
function getEmployeesById() {
  return read_csv('employee_id', 'employees.csv');
}

// read the tasks.csv file with the keys as their id
function getTasksById() {
  return read_csv('task_id', 'tasks.csv');
}

// get the password from the email, return false if no such email exists
function getPasswordByEmail($email) {
  $registrations = read_csv('email', 'registrations.csv');

  if (isset($registrations[$email]) && $registrations[$email]) {
    return $registrations[$email]['password'];
  }

  return false;
}

function getRoleById($id) {
  $roles = read_csv('employee_id', 'roles.csv');

  return $roles[$id]['role'];
}

function getRoleByEmail($email){
  $roles = read_csv('employee_id', 'roles.csv');

  if ($roles[getIDByEmail($email)]) {
    return $roles[getIDByEmail($email)]['role'];
  }
  
  return false;
}
