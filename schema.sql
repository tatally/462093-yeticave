CREATE DATABASE 462093_yeticave
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;

USE 462093_yeticave;

CREATE TABLE `category` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(64)
);
CREATE TABLE `user` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `reg_date` DATETIME,
  `email` VARCHAR(128),
  `name` VARCHAR(128),
  `password` VARCHAR (64),
  `avatar` VARCHAR(128),
  `contacts` VARCHAR(128)
);
CREATE TABLE `lot` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `date_start` DATETIME,
  `title` VARCHAR(64),
  `description` VARCHAR(128),
  `category_id` INT,
  `image` VARCHAR(128),
  `price` INT,
  `date_end` DATETIME,
  `rate_step` INT,
  `user_id` INT,
  `winner_id` INT
);
CREATE TABLE `rate` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `date` DATETIME,
  `price` INT,
  `user_id` INT,
  `lot_id` INT
);
CREATE UNIQUE INDEX `email` ON `user`(`email`);
CREATE UNIQUE INDEX `name` ON `user`(`name`);
CREATE INDEX `reg_date` ON `user`(`reg_date`);
CREATE INDEX `title` ON `lot`(`title`);
CREATE INDEX `description` ON `lot`(`description`);
CREATE INDEX `price` ON `lot`(`price`);
CREATE INDEX `date_start` ON `lot`(`date_start`);
CREATE INDEX `date_end` ON `lot`(`date_end`);
