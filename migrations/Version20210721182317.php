<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721182317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realisation ADD user_id INT NOT NULL, ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610EBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_EAA5610EA76ED395 ON realisation (user_id)');
        $this->addSql('CREATE INDEX IDX_EAA5610EBCF5E72D ON realisation (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EA76ED395');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610EBCF5E72D');
        $this->addSql('DROP INDEX IDX_EAA5610EA76ED395 ON realisation');
        $this->addSql('DROP INDEX IDX_EAA5610EBCF5E72D ON realisation');
        $this->addSql('ALTER TABLE realisation DROP user_id, DROP categorie_id');
    }
}
