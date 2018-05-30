<?php
/**
  * Подключение БД
  */
require_once ('config.php');
function connect() {
  $link = mysqli_connect(db ['host'], db ['login'], db ['password'], db ['database_name']);
  mysqli_set_charset($link, 'utf8');
  if (!$link) {
      print('Ошибка MySQL: '. mysqli_connect_error());
      exit (1);
  }
  return $link;
}
/**
  * Функция для отображения категорий из БД
  */
function db_get_categories($connection) {
  $categories = [];
  $sql = 'SELECT `id`, `name` FROM `category`';
  $result = mysqli_query($connection, $sql);
  if ($result) {
      $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  return $categories;
}
/**
  * Функция для отображения лотов из БД
  */
function db_get_last_lots($connection) {
  $products = [];
  $sql = 'SELECT `lot`.*, `category`.`name` as `category_name` FROM `lot`'
  .'JOIN `category`'
  .'ON `category_id`=`category`.`id`'
  .'WHERE `date_end` > NOW()'
  .'ORDER BY `lot`.`date_start` DESC LIMIT 9';
  $res = mysqli_query($connection, $sql);
  if ($res) {
      $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
return $products;
}
/**
  * Функция показа заголовка = наименование лота
  */
function db_get_lot_page_title($connection) {
  $lot_page_title = [];
  $sql = 'SELECT `title` FROM `lot`';
  $result = mysqli_query($connection, $sql);
  if ($result) {
      $lot_page_title = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  return $lot_page_title;
}
/**
  * Функция для отображения ставок для лота
  */
function db_get_rates($connection) {
  $rates = [];
  $sql = 'SELECT `rate`.*, `user`.`name` as `user_name` FROM `rate`'
  .'JOIN `user`'
  .'ON `user_id`=`user`.`id`'
  .'WHERE `lot_id`= 5'
  .'ORDER BY `date` DESC';
  $result = mysqli_query($connection, $sql);
  if ($result) {
      $rates = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  return $rates;
}
/**
  * Функция для отображения конкретного лота на странице
  */
// function db_get_page($connection) {
//   $sql ='SELECT `lot`.*, `category`.`name` as `category_name` FROM `lot`'
//   .'JOIN `category`'
//   .'ON `category_id`=`category`.`id`'
//   .'WHERE `id` = '$_GET['id'];
//   $res = mysqli_prepare($connection, $sql);
//   $stmt = db_get_prepare_stmt($connection, $sql, $_GET['id']);
//   mysqli_stmt_execute($stmt);
//   $res = mysqli_stmt_get_result($stmt);
//   $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
//   return $stmt;
// }
?>

<!-- /**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных
 *
 * @param $link mysqli Ресурс соединения
 * @param $sql string SQL запрос с плейсхолдерами вместо значений
 * @param array $data Данные для вставки на место плейсхолдеров
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt($link, $sql, $data = []) {
    $stmt = mysqli_prepare($link, $sql);

    if ($data) {
        $types = '';
        $stmt_data = [];

        foreach ($data as $value) {
            $type = null;

            if (is_int($value)) {
                $type = 'i';
            }
            else if (is_string($value)) {
                $type = 's';
            }
            else if (is_double($value)) {
                $type = 'd';
            }

            if ($type) {
                $types .= $type;
                $stmt_data[] = $value;
            }
        }

        $values = array_merge([$stmt, $types], $stmt_data);

        $func = 'mysqli_stmt_bind_param';
        $func(...$values);
    }

    return $stmt;
} -->
