<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210517135858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP INDEX IDX_937AB034B2A1D860, ADD UNIQUE INDEX UNIQ_937AB034B2A1D860 (species_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9F74B8985E237E06 ON setting (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A50FF7125E237E06 ON species (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` DROP INDEX UNIQ_937AB034B2A1D860, ADD INDEX IDX_937AB034B2A1D860 (species_id)');
        $this->addSql('DROP INDEX UNIQ_9F74B8985E237E06 ON setting');
        $this->addSql('DROP INDEX UNIQ_A50FF7125E237E06 ON species');
    }
}
