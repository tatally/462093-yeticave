<?php
date_default_timezone_set("Europe/Moscow");
/**
  * Подключение файлов с функцией шаблонизации и БД
  */
require_once ('functions.php');
require_once ('mysql_helper.php');
$connection = connect();

$is_auth = (bool) rand(0, 1);
$title = 'YetiCave - Главная';
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
/**
  * Функция форматирования стоимости лота
  */
function formatPrice($price)
{
  $format_price = ceil($price);
  $format_price = number_format($format_price, 0, ',', ' ');
  $format_price .= ' ₽';
  return $format_price;
}

$categories = db_get_categories($connection);
$products = db_get_last_lots($connection);
$page_content = include_template('templates/index.php', [
        'products' => $products,
        'categories' => $categories
      ]);
$layout_content = include_template('templates/layout.php', [
        'content' => $page_content,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar,
        'title' => $title,
        'categories' => $categories
      ]);
print($layout_content);
?>
