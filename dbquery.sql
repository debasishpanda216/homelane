CREATE database homelane;

CREATE TABLE `notes` (
 `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
 `title` varchar(30) NOT NULL,
 `details` text NOT NULL,
 `createdon` timestamp NULL DEFAULT NULL,
 PRIMARY KEY (`id`)
);

