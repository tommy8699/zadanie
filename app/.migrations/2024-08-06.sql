CREATE TABLE `product` (`pid` INT(11) NOT NULL AUTO_INCREMENT , `purchase_price_usd` DECIMAL(10,2) NULL DEFAULT NULL , `rate_eur_usd` DECIMAL(10,2) NULL DEFAULT NULL , `stock_quantity` DECIMAL(10,2) NULL DEFAULT NULL , PRIMARY KEY (`pid`)) ENGINE = InnoDB;

CREATE TABLE `product_attribute` (`id` INT(11) NOT NULL AUTO_INCREMENT , `pid` INT(11) UNSIGNED NULL DEFAULT NULL , `paid` INT(11) NULL DEFAULT NULL , `purchase_price_usd` DECIMAL(10,2) NULL DEFAULT NULL , `rate_eur_usd` DECIMAL(10,2) NULL DEFAULT NULL , `stock_quantity` INT(11) NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `product` CHANGE `pid` `pid` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_attribute` ADD CONSTRAINT `product_attribute_ibfk1` FOREIGN KEY (`pid`) REFERENCES `product`(`pid`) ON DELETE RESTRICT ON UPDATE RESTRICT;

INSERT INTO product (pid, purchase_price_usd, rate_eur_usd, stock_quantity) VALUES
(1, 10.00, 0.85, 100),
(2, 20.00, 0.85, 50),
(3, 15.00, 0.85, 150),
(4, 30.00, 0.85, 200),
(5, 25.00, 0.85, 70),
(6, 5.00, 0.85, 500),
(7, 50.00, 0.85, 30),
(8, 35.00, 0.85, 120),
(9, 40.00, 0.85, 80),
(10, 45.00, 0.85, 60);

INSERT INTO product_attribute (pid, paid, purchase_price_usd, rate_eur_usd, stock_quantity) VALUES
(1, TRUE, 12.00, 0.85, 90),
(2, TRUE, 18.00, 0.85, 40),
(3, TRUE, 16.00, 0.85, 130),
(4, TRUE, 28.00, 0.85, 180),
(5, TRUE, 22.00, 0.85, 65),
(6, TRUE, 6.00, 0.85, 450),
(7, TRUE, 48.00, 0.85, 28),
(8, TRUE, 33.00, 0.85, 110),
(9, TRUE, 38.00, 0.85, 75),
(10, TRUE, 42.00, 0.85, 55);