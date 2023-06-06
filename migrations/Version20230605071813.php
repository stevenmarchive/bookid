<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605071813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE editeur DROP nom');
        $this->addSql('ALTER TABLE emprunt CHANGE date_retour date_retour DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE livre CHANGE isbn isbn VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE telephone telephone VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE editeur ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE emprunt CHANGE date_retour date_retour DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE livre CHANGE isbn isbn VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
