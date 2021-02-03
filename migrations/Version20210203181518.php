<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203181518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notificaciones (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, prioridad INT NOT NULL, mensaje VARCHAR(255) NOT NULL, INDEX IDX_6FFCB21F624B39D (sender_id), INDEX IDX_6FFCB21CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21F624B39D FOREIGN KEY (sender_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES usuario (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notificaciones');
    }
}
