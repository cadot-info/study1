<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210327070253 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE actualite ADD COLUMN accroche CLOB DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__actualite AS SELECT id, titre, url_image, texte, alt, created_at, updated_at, deleted_at FROM actualite');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('CREATE TABLE actualite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, url_image VARCHAR(255) NOT NULL, texte CLOB NOT NULL, alt VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP)');
        $this->addSql('INSERT INTO actualite (id, titre, url_image, texte, alt, created_at, updated_at, deleted_at) SELECT id, titre, url_image, texte, alt, created_at, updated_at, deleted_at FROM __temp__actualite');
        $this->addSql('DROP TABLE __temp__actualite');
    }
}
