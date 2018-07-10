<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180705145210 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql(' create table micro_post(id INT,text VARCHAR(255),time DATE)');
        $this->addSql('ALTER TABLE micro_post 
                      CHANGE id id INT AUTO_INCREMENT NOT NULL, 
                      CHANGE text text VARCHAR(200) NOT NULL, 
                      CHANGE time time DATETIME NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE micro_post MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE micro_post DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE micro_post CHANGE id id INT DEFAULT NULL, 
                      CHANGE text text VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, 
                      CHANGE time time DATE DEFAULT NULL');
    }
}
