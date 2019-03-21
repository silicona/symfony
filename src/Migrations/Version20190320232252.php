<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320232252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE continente (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avispas ADD continente_id INT NOT NULL');
        $this->addSql('ALTER TABLE avispas ADD CONSTRAINT FK_61657E8D5CF04EB5 FOREIGN KEY (continente_id) REFERENCES continente (id)');
        $this->addSql('CREATE INDEX IDX_61657E8D5CF04EB5 ON avispas (continente_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avispas DROP FOREIGN KEY FK_61657E8D5CF04EB5');
        $this->addSql('DROP TABLE continente');
        $this->addSql('DROP INDEX IDX_61657E8D5CF04EB5 ON avispas');
        $this->addSql('ALTER TABLE avispas DROP continente_id');
    }
}
