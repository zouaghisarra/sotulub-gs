<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101131807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DA76ED395');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D144AC3583');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1BD95B80F');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D144AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DA76ED395');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D1BD95B80F');
        $this->addSql('ALTER TABLE transaction DROP FOREIGN KEY FK_723705D144AC3583');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D1BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE transaction ADD CONSTRAINT FK_723705D144AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id) ON DELETE SET NULL');
    }
}
