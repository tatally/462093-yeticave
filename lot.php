<?php
require_once ('functions.php');
require_once ('mysql_helper.php');
$connection = connect();

if (isset($_GET['id']) && $_GET['id'] == $products['id']) {
  return $layout_content;
  }
else {
  http_response_code(404);
  }

$connection = connect();
$is_auth = (bool) rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$categories = db_get_categories($connection);
$products = db_get_last_lots($connection);
// db_get_page($connection);
$title_lot_page = db_get_lot_page_title($connection);
$rates = db_get_rates($connection);

$page_content = include_template('templates/page_lot.php', [
        'products' => $products,
        'categories' => $categories
      ]);
$layout_content = include_template('templates/layout.php', [
        'content' => $page_content,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => $title_lot_page,
        'categories' => $categories,
        'rates' => $rates
      ]);
print($layout_content);
?>
