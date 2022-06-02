<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602131250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, famille_id INT NOT NULL, taxe_id INT DEFAULT NULL, reference VARCHAR(20) NOT NULL, libelle VARCHAR(100) NOT NULL, description LONGTEXT DEFAULT NULL, prix_reference INT DEFAULT NULL, ordre_affichage INT DEFAULT NULL, image_rep VARCHAR(255) NOT NULL, INDEX IDX_29A5EC2797A77B84 (famille_id), INDEX IDX_29A5EC271AB947A4 (taxe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) NOT NULL, taux_taxe DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2797A77B84 FOREIGN KEY (famille_id) REFERENCES famille (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC271AB947A4 FOREIGN KEY (taxe_id) REFERENCES taxe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC271AB947A4');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE taxe');
    }
}
