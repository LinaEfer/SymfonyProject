<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170218202224 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE episode (id CHAR(36) NOT NULL, name VARCHAR(255) DEFAULT NULL, episode_number VARCHAR(255) NOT NULL, date_published DATETIME DEFAULT NULL, tvSeries_id CHAR(36) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DDAA1CDAE8ABC2D3 ON episode (tvSeries_id)');
        $this->addSql('CREATE TABLE tv_series (id CHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, author VARCHAR(255) DEFAULT NULL, released_at DATETIME DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user (id INTEGER NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE tv_series');
        $this->addSql('DROP TABLE user');
    }
}
