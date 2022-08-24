<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220824145303 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE observations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, obs_date DATETIME NOT NULL, state VARCHAR(255) NOT NULL, states VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE states (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, state_number VARCHAR(3) NOT NULL, state_label VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE observations');
        $this->addSql('DROP TABLE states');
    }
}
