<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230906211510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Creates app_term table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE app_term (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, body VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE app_term');
    }
}
