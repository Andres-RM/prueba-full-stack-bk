
-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE `users` (
                         `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(50) DEFAULT NULL,
                         `phone` varchar(25) DEFAULT NULL,
                         `username` varchar(45) NOT NULL,
                         `date` date DEFAULT NULL,
                         `email` varchar(195) NOT NULL,
                         `status` tinyint NOT NULL DEFAULT '1',
                         `password` varchar(250) NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `username_UNIQUE` (`username`),
                         UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci


-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE `products` (
                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                            `sku` varchar(160) NOT NULL,
                            `name` varchar(45) NOT NULL,
                            `stock` bigint NOT NULL,
                            `price` float NOT NULL,
                            `description` longtext,
                            `delete` tinyint DEFAULT '0',
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            UNIQUE KEY `sku_UNIQUE` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci


-- -----------------------------------------------------
-- Table `mydb`.`transactions`
-- -----------------------------------------------------
CREATE TABLE `transactions` (
                                `description` varchar(45) DEFAULT NULL,
                                `product_id` bigint unsigned NOT NULL,
                                `user_id` bigint unsigned NOT NULL,
                                PRIMARY KEY (`product_id`,`user_id`),
                                KEY `fk_transactions_products_idx` (`product_id`),
                                KEY `fk_user_idx` (`user_id`),
                                CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
                                CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
