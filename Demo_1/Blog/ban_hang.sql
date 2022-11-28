CREATE DATABASE `ban_hang` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use ban_hang;

CREATE TABLE IF NOT EXISTS `category` (
    `id` int primary key auto_increment,
    `name` varchar(255) not null,
    `status` tinyint DEFAULT 1
   
);

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT  PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) not null,
  `price` float not null,
  `image` varchar(255) null,
  `category_id` int not null,
  foreign key (category_id) references category(id)
);



INSERT INTO category (`name`) VALUES
('Quần');

INSERT INTO product (`name`, `price`, `image`,`category_id`) VALUES
('Quần Âu', 250000,' ',1),
('Quần đùi', 250000,' ',1),
('Quần bò dài', 150000,' ',1),
('Quần vải ', 250000,' ',1),
('Quần sịp', 250000,' ',1);




