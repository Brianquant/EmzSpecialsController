<?php

declare(strict_types=1);

namespace EmzSpecialsCollection\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1618319687emzspcials extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1618319687;
    }

    public function update(Connection $connection): void
    {
        $connection->exec("CREATE TABLE IF NOT EXISTS `emz_specials_collection`
             (
                `id`            BINARY(16) NOT NULL,
                `active`        TINYINT(1) NULL DEFAULT '1',
                `name`          VARCHAR(255) NOT NULL,
                `text`        VARCHAR(200) NOT NULL,
                `country_id`    BINARY(16) NULL,
                `created_at`    DATETIME(3),
                `updated_at`    DATETIME(3),
                PRIMARY KEY (`id`),
                KEY `fk.emz_specials_collection.country_id` (`country_id`),
                CONSTRAINT `fk.emz_specials_collection.country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ");
    }

    public function updateDestructive(Connection $connection): void
    {
    }
}
