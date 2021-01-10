<?php
  require("dbconnect.php");
  
  function queryManipulation($query, $option, $data = []) {
    global $conn;
    $stmt = $conn->prepare($query);
    if(!$stmt) {
      echo $conn->error;
      return;
    }
    if(count($data) > 0) {
      $dataType = "";
      foreach($data as $d) {
        if(is_int($d)) {
          $dataType = $dataType.'i';
        } else if(is_string($d)) {
            $dataType = $dataType.'s';
        } else if(is_double($d)) {
            $dataType = $dataType.'d';
        } else {
          $dataType = $dataType.'b';//BLOB
        }
      }
      $getData = array_values($data);
      $stmt->bind_param($dataType, ...$getData);
    }
    $stmt->execute();
    return ($option == "set") ? $stmt : $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }
?>