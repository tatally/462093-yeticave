USE 462093_yeticave;

INSERT INTO 'category'
VALUES (1, 'Доски и лыжи'), (2, 'Крепления'), (3, 'Ботинки'), (4, 'Одежда'), (5, 'Инструменты'), (6, 'Разное');

INSERT INTO 'user'('id', 'reg_date', 'email', 'name')
SET VALUES (1, '2018-05-20 21:05:00', 'mail@mail.ru', 'Ivan'),
SET VALUES (2, '2018-05-21 12:07:51', 'mail_21@mail.ru', 'Tomas'),
SET VALUES (3, '2018-05-19 14:11:21', 'mail_22@mail.ru', 'Lilia');

INSERT INTO 'rate'('id', 'date', 'price', 'user_id', 'lot_id')
SET VALUES (1, '2018-05-21 15:56:01', '11999', '1', '1'),
SET VALUES (2, '2018-05-21 16:21:01', '8000', '1', '5'),
SET VALUES (2, '2018-05-21 16:35:50', '8300', '2', '5');

INSERT INTO 'lot'('id', 'date_start', 'title', 'image', 'price', 'date_end', 'rate_step', 'user_id', 'winner_id')
SET VALUES(1, '2018-05-21 13:01:51', '2014 Rossignol District Snowboard', 'img/lot-1.jpg', 10999, '2018-05-26 13:01:51', 100, '2', '1'),
SET VALUES(2, '2018-05-23 18:01:20', 'DC Ply Mens 2016/2017 Snowboard', 'img/lot-2.jpg', 159999, '2018-05-28 18:01:20', 500, '2', ' '),
SET VALUES(3, '2018-05-21 13:35:22', 'Крепления Union Contact Pro 2015 года размер L/XL', 'img/lot-3.jpg', 8000, '2018-05-21 13:35:22', 200, '1', ' '),
SET VALUES(4, '2018-05-20 14:55:00', 'Ботинки для сноуборда DC Mutiny Charocal', 'img/lot-4.jpg', 10999, '2018-05-25 14:55:00', 100, '3' ' '),
SET VALUES(5, '2018-05-20 14:31:01', 'Куртка для сноуборда DC Mutiny Charocal', 'img/lot-5.jpg', 7500, '2018-05-25 14:31:01', 100, '1', ' '),
SET VALUES(6, '2018-05-20 15:11:21', 'Маска Oakley Canopy', 'img/lot-6.jpg', 5400, '2018-05-25 15:11:21', 100, '3', ' ');
/** получить все категории
*/
SELECT 'name' FROM 'categories';
/**получить самые новые, открытые лоты.
Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;
*/
SELECT 'title', 'date_start', 'image', 'price', COUNT('rate'.'id') AS 'all_rate', 'name'
FROM 'lot' JOIN 'rate' ON 'lot'.'id'='lot_id'
WHERE 'winner_id'=' '
GROUP BY 'lot'.'id' ORDER BY 'date_start' DESC;
/** получить лот по его идентификатору с показом категории
*/
SELECT * FROM 'lot'
JOIN 'category'
ON 'category_id'='name';
/** обновить название лота по его идентификатору;
*/
UPDATE 'lot' SET 'title'='Крепления Union Contact Pro 2016 года размер M'
WHERE 'id'=3;
/** список самых свежих ставок для лота по его идентификатору
*/
SELECT 'date', 'price' FROM 'rate' ORDER BY 'date' ASC
WHERE 'lot_id'=5;
