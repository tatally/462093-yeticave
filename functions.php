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
  * Function for countdown time for the lots. Format dd hh:mm.
  */
function downcounter($time) {
    $check_time = strtotime($time) - time();
    if($check_time <= 0){
      return false;
    }
    $days = format_time($check_time/86400);
    $hours = format_time(($check_time%86400)/3600);
    $minutes = format_time(($check_time%3600)/60);
    $str = $days.'дн'.' '.$hours.':'.$minutes;
    return $str;
    }
/**
  * Функция для форматирования времени в таймере обратного отсчета
  */
function format_time($timer) {
  $timer = floor($timer);
  $timer = str_pad($timer, 2, "0", STR_PAD_LEFT);
  return $timer;
  }
 ?>
