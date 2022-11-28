CREATE DATABASE `games_showcase` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use games_showcase;

CREATE TABLE IF NOT EXISTS `category` (
    `id` int primary key auto_increment,
    `name` varchar(255) not null,
    `status` tinyint DEFAULT 1
   
);

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT  PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) not null,
  `image` varchar(255) null,
  `worth` float not null,
  `category_id` int not null,
  foreign key (category_id) references category(id)
);



INSERT INTO category (`name`) VALUES
('Steam');

INSERT INTO product (`name`, `image`, `worth`,`category_id`) VALUES
('Red Dead Redemption 2', ' ', 1000000,1),
('Dont Starve Together',' ', 250000,1),
('Alan Wake',' ', 150000,1),
('The Last Of Us',' ', 250000,1),
('Fran Bow',' ', 250000,1);