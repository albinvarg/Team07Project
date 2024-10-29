<?php
function csvToArray($filename, $delimiter = ',') {
  // check if the file exists and is readable
  if (!file_exists($filename) || !is_readable($filename)) {
    throw new Exception("File not found or is not readable: $filename");
  }


  $data = array();

  //open the file in read mode
  if (($handle = fopen($filename, 'r')) !== false) {
    //get the header row
    $header = fgetcsv($handle, 1000, $delimiter);

    //check header row was successfully retrieved
    if ($header === false) {
      throw new Exception("Unable to read header row from CSV file: $filename");
    }

    //loop through remaining rows
    while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
      //combine header row with associative array
      $data[] = array_combine($header, $row);
    }

    fclose($handle);
  } else {
    throw new Exception("Unable to open file: $filename");
  }

  return $data;
}

// array is in the form [key => [values]] where the key is one of the values of the associative array
// if the key isn't unique the values will be an array of associative arrays
function rekey_data($key, $arr) {

  $data = [];

  foreach($arr as $assoc_arr) {
    $data[$assoc_arr[$key]][] = $assoc_arr;
  }


  //check if the key is unique
  $unique = is_key_unique($data);

  //if the key is unique we don't need the values to be an array of associative arrays
  if ($unique) {
    foreach($data as $key => $value) {
      $data[$key] = $value[0];
    }
  }

  return $data;
}

//check if the key is unique
function is_key_unique($data) {
  foreach($data as $key => $value) {
    if (count($value) > 1) {
      return false;
    }
  }

  return true;
}

//combines csvToArray and rekey_data into one function, this function should be the one being used not the other ones.
function read_csv($key, $file) {
  $raw_data = csvToArray($file);
  $data = rekey_data($key, $raw_data);

  return $data;
}




// USAGE: only use the read_csv function from the file.
/*
Inputs: $key (string), $file (string) 

(example csv) - employees.csv:

employee_id,forename,surname,email,team
11029,testfore,testsur,email@email.com,07
1234,testfore,testsurrr,email2@email.com,07

If I choose 'employee_id' as the key it will result in the following dictionary:

{
  11029: {
    employee_id: 11029,
    forename: testfore,
    surname: testsur,
    email: email@email.com,
    team: 07
  },
  1234: {
    employee_id: 1234,
    forename: testfore,
    surname: testsurrr,
    email: email2@email.com,
    team: 07
  }
}

if I choose 'team' as the key it will result in the following dictionary:

{
  07: [
      {
        employee_id: 1234,
        forename: testfore,
        surname: testsurrr,
        email: email2@email.com,
        team: 07
      },
      {
        employee_id: 11029,
        forename: testfore,
        surname: testsur,
        email: email@email.com,
        team: 07
      }
  ]
}

because there are multiple employees in team 07, you get an array of dictionaries.
*/
