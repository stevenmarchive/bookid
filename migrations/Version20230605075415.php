<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605075415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE telephone telephone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt CHANGE date_retour date_retour DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE genre DROP nom');
        $this->addSql('ALTER TABLE livre ADD genre_id INT DEFAULT NULL, CHANGE isbn isbn VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F994296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('CREATE INDEX IDX_AC634F994296D31F ON livre (genre_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE telephone telephone VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE emprunt CHANGE date_retour date_retour DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE genre ADD nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F994296D31F');
        $this->addSql('DROP INDEX IDX_AC634F994296D31F ON livre');
        $this->addSql('ALTER TABLE livre DROP genre_id, CHANGE isbn isbn VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
