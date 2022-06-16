<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616090417 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE valeur_caracteristique (id INT AUTO_INCREMENT NOT NULL, typecaracteristique_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_B90C98CB679044CC (typecaracteristique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE valeur_caracteristique ADD CONSTRAINT FK_B90C98CB679044CC FOREIGN KEY (typecaracteristique_id) REFERENCES type_caracteristique (id)');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F213727ACA70');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F213727ACA70 FOREIGN KEY (parent_id) REFERENCES famille (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE valeur_caracteristique');
        $this->addSql('ALTER TABLE famille DROP FOREIGN KEY FK_2473F213727ACA70');
        $this->addSql('ALTER TABLE famille ADD CONSTRAINT FK_2473F213727ACA70 FOREIGN KEY (parent_id) REFERENCES famille (id) ON DELETE CASCADE');
    }
}
