<?php
error_reporting( E_ALL );
/**
  * Function for page template.
  * Checks out the path and gets data for the template.
  */
function include_template($filePath, $params) {
  if (!file_exists($filePath)){
    return ' ';
  }
    ob_start();
    extract($params);
    include_once($filePath);
    return ob_get_clean();
  }
  /**
    * Function for countdown time for the lots. Format hh:mm.
    */
function downcounter($time){
    $check_time = strtotime($time) - time();
    if($check_time <= 0){
      return false;
    }
    $hours = floor(($check_time%86400)/3600);
    $minutes = floor(($check_time%3600)/60);
    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
    $str = $hours.':'.$minutes;
    return $str;
  }
 ?>
