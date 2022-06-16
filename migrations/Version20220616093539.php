<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220616093539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, prix_ht INT NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_valeur_caracteristique (article_id INT NOT NULL, valeur_caracteristique_id INT NOT NULL, INDEX IDX_E7BE1B7A7294869C (article_id), INDEX IDX_E7BE1B7A4B95F011 (valeur_caracteristique_id), PRIMARY KEY(article_id, valeur_caracteristique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_valeur_caracteristique ADD CONSTRAINT FK_E7BE1B7A7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_valeur_caracteristique ADD CONSTRAINT FK_E7BE1B7A4B95F011 FOREIGN KEY (valeur_caracteristique_id) REFERENCES valeur_caracteristique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_valeur_caracteristique DROP FOREIGN KEY FK_E7BE1B7A7294869C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_valeur_caracteristique');
    }
}
