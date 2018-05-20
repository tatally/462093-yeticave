<?php
error_reporting( E_ALL );
function include_template($filePath, $params) {
  if (!file_exists($filePath)){
    return ' ';
  }
    ob_start();
    extract($params);
    include_once($filePath);
    return ob_get_clean();
  }
 ?>
