-- rumahsakit_app.pasiens definition

CREATE TABLE `pasiens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `rumah_sakit_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pasiens_rumah_sakit_id_foreign` (`rumah_sakit_id`),
  CONSTRAINT `pasiens_rumah_sakit_id_foreign` FOREIGN KEY (`rumah_sakit_id`) REFERENCES `rumah_sakits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;