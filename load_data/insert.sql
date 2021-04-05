USE enviame;
-- CREATE TABLE "empresas" ------------------------------------
CREATE TABLE `empresas` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`nombre` VarChar( 255 ) CHARACTER SET utf8 NOT NULL,
	`email_contacto` VarChar( 255 ) CHARACTER SET utf8 NOT NULL,
	`created_at` DateTime NOT NULL,
	`updated_at` DateTime,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
ENGINE = InnoDB
AUTO_INCREMENT = 1;

insert into empresas values (1,'pruebaenterprise','correoprueba@enviame.cl','2021-04-05 22:51:00','2021-04-05 22:51:00');

CREATE TABLE `envios` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL,
	`identifier` Int( 20 ) NOT NULL,
    `imported_id` Int( 20 ) NOT NULL,
    `tracking_number` Int( 30 ) NOT NULL,
    `id_status` Int( 5 ) NOT NULL,
    `code_status` VarChar( 20 ) CHARACTER SET utf8 NOT NULL,
    `created_at` DateTime NOT NULL,
	`updated_at` DateTime,
    `customer_name` VarChar( 100 ) CHARACTER SET utf8 NOT NULL,
    `customer_phone` Int( 15 ) NOT NULL,
    `costomer_email` VarChar( 255 ) CHARACTER SET utf8 NOT NULL,
    `shipping_address` VarChar( 255 ) CHARACTER SET utf8 NOT NULL,
    `shipping_address_place` VarChar( 255 ) CHARACTER SET utf8 NOT NULL,
    `shipping_address_type` VarChar( 20 ) CHARACTER SET utf8 NOT NULL,
    `country` VarChar( 5 ) CHARACTER SET utf8 NOT NULL,
    `carrier` VarChar( 50 ) CHARACTER SET utf8 NOT NULL,
    `service` VarChar( 50 ) CHARACTER SET utf8 NOT NULL,
    `lavel_pdf` VarChar( 250 ) CHARACTER SET utf8,
    `barcodes` VarChar( 250 ) CHARACTER SET utf8,
    `deadline` VarChar( 50 ) CHARACTER SET utf8,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
ENGINE = InnoDB
AUTO_INCREMENT = 1;