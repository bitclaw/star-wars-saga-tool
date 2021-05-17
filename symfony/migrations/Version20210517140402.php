<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517140402 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'star-wars-saga-tool migrations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `character` (id INT AUTO_INCREMENT NOT NULL, species_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, gender VARCHAR(100) DEFAULT NULL, species_endpoints JSON NOT NULL, UNIQUE INDEX UNIQ_937AB034B2A1D860 (species_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, director VARCHAR(255) NOT NULL, release_date VARCHAR(255) NOT NULL, character_endpoints JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_character (film_id INT NOT NULL, character_id INT NOT NULL, INDEX IDX_A7B6EE07567F5183 (film_id), INDEX IDX_A7B6EE071136BE75 (character_id), PRIMARY KEY(film_id, character_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9F74B8985E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE species (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, classification VARCHAR(255) DEFAULT NULL, designation VARCHAR(255) DEFAULT NULL, average_height VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_A50FF7125E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `character` ADD CONSTRAINT FK_937AB034B2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('ALTER TABLE film_character ADD CONSTRAINT FK_A7B6EE07567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_character ADD CONSTRAINT FK_A7B6EE071136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film_character DROP FOREIGN KEY FK_A7B6EE071136BE75');
        $this->addSql('ALTER TABLE film_character DROP FOREIGN KEY FK_A7B6EE07567F5183');
        $this->addSql('ALTER TABLE `character` DROP FOREIGN KEY FK_937AB034B2A1D860');
        $this->addSql('DROP TABLE `character`');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_character');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE species');
        $this->addSql('DROP TABLE user');
    }
}
