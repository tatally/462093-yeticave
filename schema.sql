CREATE DATABASE 462093_yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  category CHAR(64)
);
CREATE TABLE lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_start DATETIME,
  title CHAR(64),
  description CHAR(128),
  image CHAR(128),
  price_s INT,
  date_end DATETIME,
  rate_step INT
);
CREATE TABLE rate (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_rate INT,
  price_rate INT,
);
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  reg_date DATETIME,
  email CHAR(128),
  name CHAR(128),
  password CHAR (64),
  avatar CHAR(128),
  contacts INT
);
CREATE UNIQUE INDEX email ON users(email);
