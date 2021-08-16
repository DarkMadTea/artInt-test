<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210814022340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_data DROP FOREIGN KEY FK_836775ADA76ED395');
        $this->addSql('DROP INDEX UNIQ_836775ADA76ED395 ON additional_data');
        $this->addSql('ALTER TABLE additional_data DROP address, CHANGE review review VARCHAR(1000) NOT NULL, CHANGE user_id username_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE additional_data ADD CONSTRAINT FK_836775ADED766068 FOREIGN KEY (username_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_836775ADED766068 ON additional_data (username_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_data DROP FOREIGN KEY FK_836775ADED766068');
        $this->addSql('DROP INDEX UNIQ_836775ADED766068 ON additional_data');
        $this->addSql('ALTER TABLE additional_data ADD address VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE review review VARCHAR(1000) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE username_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE additional_data ADD CONSTRAINT FK_836775ADA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_836775ADA76ED395 ON additional_data (user_id)');
    }
}
