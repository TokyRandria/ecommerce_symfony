<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617083046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD produitref_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E669B13CAA1 FOREIGN KEY (produitref_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_23A0E669B13CAA1 ON article (produitref_id)');
        $this->addSql('ALTER TABLE photo_article ADD article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_article ADD CONSTRAINT FK_37DA19EB7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_37DA19EB7294869C ON photo_article (article_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E669B13CAA1');
        $this->addSql('DROP INDEX IDX_23A0E669B13CAA1 ON article');
        $this->addSql('ALTER TABLE article DROP produitref_id');
        $this->addSql('ALTER TABLE photo_article DROP FOREIGN KEY FK_37DA19EB7294869C');
        $this->addSql('DROP INDEX IDX_37DA19EB7294869C ON photo_article');
        $this->addSql('ALTER TABLE photo_article DROP article_id');
    }
}
