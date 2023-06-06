<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230605071333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, caution TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autheur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editeur (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_5A747EF3375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, exemplaire_id INT NOT NULL, date_emprunt DATETIME NOT NULL, date_retour DATETIME DEFAULT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_364071D725F06C53 (adherent_id), INDEX IDX_364071D75843AA21 (exemplaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exemplaire (id INT AUTO_INCREMENT NOT NULL, usure_id INT NOT NULL, stock_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_5EF83C921117BEE5 (usure_id), INDEX IDX_5EF83C92DCD6110 (stock_id), INDEX IDX_5EF83C9237D925CB (livre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, editeur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, isbn VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, archive TINYINT(1) NOT NULL, INDEX IDX_AC634F9960BB6FE6 (auteur_id), INDEX IDX_AC634F993375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre_genre (livre_id INT NOT NULL, genre_id INT NOT NULL, INDEX IDX_1053AB9E37D925CB (livre_id), INDEX IDX_1053AB9E4296D31F (genre_id), PRIMARY KEY(livre_id, genre_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, emplacement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usure (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE editeur ADD CONSTRAINT FK_5A747EF3375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D725F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D75843AA21 FOREIGN KEY (exemplaire_id) REFERENCES exemplaire (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C921117BEE5 FOREIGN KEY (usure_id) REFERENCES usure (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C92DCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE exemplaire ADD CONSTRAINT FK_5EF83C9237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9960BB6FE6 FOREIGN KEY (auteur_id) REFERENCES autheur (id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F993375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9E37D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livre_genre ADD CONSTRAINT FK_1053AB9E4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE editeur DROP FOREIGN KEY FK_5A747EF3375BD21');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D725F06C53');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D75843AA21');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C921117BEE5');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C92DCD6110');
        $this->addSql('ALTER TABLE exemplaire DROP FOREIGN KEY FK_5EF83C9237D925CB');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9960BB6FE6');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F993375BD21');
        $this->addSql('ALTER TABLE livre_genre DROP FOREIGN KEY FK_1053AB9E37D925CB');
        $this->addSql('ALTER TABLE livre_genre DROP FOREIGN KEY FK_1053AB9E4296D31F');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE autheur');
        $this->addSql('DROP TABLE editeur');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE exemplaire');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE livre_genre');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE usure');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
