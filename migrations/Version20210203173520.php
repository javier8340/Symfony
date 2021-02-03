<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210203173520 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(255) DEFAULT NULL, fecha_registro DATETIME NOT NULL, ip_registro VARCHAR(255) NOT NULL, ultimo_acceso DATETIME NOT NULL, monedas INT NOT NULL, activo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE usuario_usuario (usuario_source INT NOT NULL, usuario_target INT NOT NULL, INDEX IDX_5B431A1AA5989C7A (usuario_source), INDEX IDX_5B431A1ABC7DCCF5 (usuario_target), PRIMARY KEY(usuario_source, usuario_target)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario_usuario ADD CONSTRAINT FK_5B431A1AA5989C7A FOREIGN KEY (usuario_source) REFERENCES usuario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE usuario_usuario ADD CONSTRAINT FK_5B431A1ABC7DCCF5 FOREIGN KEY (usuario_target) REFERENCES usuario (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE usuario_usuario DROP FOREIGN KEY FK_5B431A1AA5989C7A');
        $this->addSql('ALTER TABLE usuario_usuario DROP FOREIGN KEY FK_5B431A1ABC7DCCF5');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE usuario_usuario');
    }
}
