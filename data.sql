CREATE DATABASE `game_database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use game_database;

CREATE TABLE IF NOT EXISTS `platform` (
    `id` int primary key auto_increment,
    `name` varchar(255) not null,
    `status` tinyint DEFAULT 1
   
);

CREATE TABLE IF NOT EXISTS `game` (
  `id` INT  PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) not null,
  `image` varchar(255) null,
  `platform_id` int not null,
  foreign key (platform_id) references platform(id)
);



INSERT INTO platform (`name`) VALUES
('Steam');
