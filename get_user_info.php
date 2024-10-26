<?php

require_once('./read.php');

function getTeamMembersById($employee_id) {
  $employees = read_csv('employee_id', './employees.csv');
  $team = $employees[$employee_id]['team'];

  $employees = read_csv('team', './employees.csv');
  $members = $employees[$team];

  return $members;
}

/*

function getIDByName($forename, $surname) {
  $employees_fore = read_csv('forename', './employees.csv');

  if (!$employees_fore[$forename]) {
    return false;
  }

  if (!$employees_fore[$forename][0]) {
    return $employees_fore[$forename]['employee_id'];
  }
  $employees_sur = read_csv('surname', './employees.csv');

  if (!$employees_sur[$surname]) {
    return false;
  }

  if (!($employees_sur[$surname][0])) {
    return $employees_sur[$surname]['employee_id'];
  }

  foreach( $employees_fore[$forename] as $employees ) {
    if ($employees['surname'] == $surname && !$employees_sur[$surname][0]) {
      return $employees['employee_id'];
    }
  }

  return false;

}

*/

