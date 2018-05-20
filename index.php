<?php
date_default_timezone_set("Europe/Moscow");
$is_auth = (bool) rand(0, 1);

$title = 'YetiCave - Главная';
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$products = [
  [
    'title' => '2014 Rossignol District Snowboard',
    'category' => $categories[0],
    'price' => 10999,
    'alt' => '2014 Rossignol District Snowboard',
    'image' => 'img/lot-1.jpg'
  ],
  [
    'title' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => $categories[0],
    'price' => 159999,
    'alt' => 'DC Ply Mens 2016/2017 Snowboard',
    'image' => 'img/lot-2.jpg'
  ],
  [
    'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => $categories[1],
    'price' => 8000,
    'alt' => 'Крепления Union Contact Pro',
    'image' => 'img/lot-3.jpg'
  ],
  [
    'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => $categories[2],
    'price' => 10999,
    'alt' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'image' => 'img/lot-4.jpg'
  ],
  [
    'title' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => $categories[3],
    'price' => 7500,
    'alt' => 'Куртка для сноуборда DC Mutiny Charocal',
    'image' => 'img/lot-5.jpg'
  ],
  [
    'title' => 'Маска Oakley Canopy',
    'category' => $categories[5],
    'price' => 5400,
    'alt' => 'Маска Oakley Canopy',
    'image' => 'img/lot-6.jpg'
  ]
];
function formatPrice($price)
{
  $format_price = ceil($price);
  $format_price = number_format($format_price, 0, ',', ' ');
  $format_price .= ' ₽';
  return $format_price;
}
require_once ("functions.php");
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
print($layout_content);
  ?>
