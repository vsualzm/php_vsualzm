-- rumahsakit_app.rumah_sakits definition

CREATE TABLE `rumah_sakits` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rumah_sakits_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;