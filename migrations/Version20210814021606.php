<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210814021606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_data DROP FOREIGN KEY FK_836775ADF5B7AF75');
        $this->addSql('DROP INDEX UNIQ_836775ADF5B7AF75 ON additional_data');
        $this->addSql('ALTER TABLE additional_data CHANGE address_id user_data_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE additional_data ADD CONSTRAINT FK_836775AD6FF8BF36 FOREIGN KEY (user_data_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_836775AD6FF8BF36 ON additional_data (user_data_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE additional_data DROP FOREIGN KEY FK_836775AD6FF8BF36');
        $this->addSql('DROP INDEX UNIQ_836775AD6FF8BF36 ON additional_data');
        $this->addSql('ALTER TABLE additional_data CHANGE user_data_id address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE additional_data ADD CONSTRAINT FK_836775ADF5B7AF75 FOREIGN KEY (address_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_836775ADF5B7AF75 ON additional_data (address_id)');
    }
}
