<?php
date_default_timezone_set("Europe/Moscow");
$is_auth = (bool) rand(0, 1);
$title = 'YetiCave - Главная';
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
function formatPrice($price)
{
  $format_price = ceil($price);
  $format_price = number_format($format_price, 0, ',', ' ');
  $format_price .= ' ₽';
  return $format_price;
}
require_once ("functions.php");
/** Подключение БД
*/
$con = mysqli_connect('188.225.76.71', 'tata', 'Tata123.','462093_yeticave');
mysqli_set_charset($con, "utf8");

if (!$con) {
  print('Ошибка MySQL: '. mysqli_connect_error());
}
else {
  $sql = 'SELECT `id`, `name` FROM `category`';
  $result = mysqli_query($con, $sql);
  if ($result) {
  $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  $sql = 'SELECT `lot`.*, `category`.`name` as `category_name` FROM `lot`'
  .'JOIN `category`'
  .'ON `category_id`=`category`.`id`'
  .'ORDER BY `lot`.`date_start` DESC LIMIT 9';
  if ($res = mysqli_query($con, $sql)) {
      $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
      $page_content = include_template('templates/index.php', [
        'products' => $products,
        'categories' => $categories
      ]);
      $layout_content = include_template('templates/layout.php',[
        'content' => $page_content,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => $title,
        'categories' => $categories
      ]);
    }
  }
print($layout_content);
  ?>
