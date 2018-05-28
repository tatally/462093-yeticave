<?php
/**
  * Подключение БД
  */
require_once ('config.php');
function connect() {
  $link = mysqli_connect($db['host'], $db['login'], $db['password'], $db['database_name']);
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
  $result = mysqli_query($link, $sql);
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
  $res = mysqli_query($link, $sql);
  if ($res) {
      $products = mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
return $products;
}
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
