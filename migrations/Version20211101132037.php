<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101132037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rayon DROP FOREIGN KEY FK_D5E5BC3C20096AE3');
        $this->addSql('ALTER TABLE rayon ADD CONSTRAINT FK_D5E5BC3C20096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rayon DROP FOREIGN KEY FK_D5E5BC3C20096AE3');
        $this->addSql('ALTER TABLE rayon ADD CONSTRAINT FK_D5E5BC3C20096AE3 FOREIGN KEY (magasin_id) REFERENCES magasin (id)');
    }
}
