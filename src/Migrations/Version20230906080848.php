<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20230906080848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Modifies sylius_product (add is_on_sale) and messenger_messages tables.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE sylius_product ADD is_on_sale TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product DROP is_on_sale');
    }
}
