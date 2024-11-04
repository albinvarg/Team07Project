<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title Here</title>

    <link rel="stylesheet" href="styles.css">

    <style>

    </style>
</head>
    <body>
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
    $data = array();
  
    foreach($arr as $assoc_arr) {
      $data[$assoc_arr[$key]][] = $assoc_arr;
    }
  
    //check if the key is unique
    $unique = true;
    foreach($data as $key => $value) {
      if (count($value) > 1) {
        $unique = false;
      }
    }
  
    //if the key is unique we don't need the values to be an array of associative arrays
    if ($unique) {
      foreach($data as $key => $value) {
        $data[$key] = $value[0];
      }
    }
  
    return $data;
  }
  
  //combines csvToArray and rekey_data into one function, this function should be the one being used not the other ones.
  function read_csv($key, $file) {
    $raw_data = csvToArray($file);
    $data = rekey_data($key, $raw_data);
  
    return $data;
  }
  
  function addTask($task_id, $employee_id, $description, $topic, $status) {
    $file = fopen("tasks.csv", "a");
    if ($file !== false) {
        $task_data = [$task_id, $employee_id, $description, $topic, $status];
        fputcsv($file, $task_data);
        fclose($file);
        echo "Task added successfully!";
    } else {
        echo "Failed to open file.";
    }
}
// data stored as an ARRAY (DATA) , containing KEYVALUES (KEY) that contain another ASSOC ARRAY (VALUE)
function displayData($data, $idkey) {
    foreach ($data as $key => $value) {
        echo "$idkey: $key <br>";

        foreach ($value as $subKey => $subValue) {
            echo "$subKey: $subValue <br>";
        }
        echo "<br>";
    }
}

  try {
    $csvFile = './tasks.csv';
    $key = 'task_id';
    $data = read_csv($key, $csvFile);
  
    // print_r($data);
    displayData($data, $key);
  
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

  
?>
</body>
</html>
