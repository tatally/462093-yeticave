<?php
error_reporting( E_ALL );
function template($filePath, $array) {
  if (!file_exists($filePath)) :
    echo ' ';
  endif;

  ob_start();
  $filePath = "templates/layout.php";
  $html = ob_get_clean();
}
 ?>
