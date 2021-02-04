<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204075752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estadistica (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, juego_id INT NOT NULL, fecha DATETIME NOT NULL, apuesta INT NOT NULL, modalidad VARCHAR(255) NOT NULL, INDEX IDX_DF3A8544DB38439E (usuario_id), INDEX IDX_DF3A854413375255 (juego_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE juego (id INT AUTO_INCREMENT NOT NULL, categoria_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) NOT NULL, foto VARCHAR(255) NOT NULL, INDEX IDX_F0EC403D3397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notificacion (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, prioridad INT NOT NULL, mensaje VARCHAR(255) NOT NULL, INDEX IDX_729A19ECF624B39D (sender_id), INDEX IDX_729A19ECCD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompensa (id INT AUTO_INCREMENT NOT NULL, nivel INT NOT NULL, recompensa VARCHAR(50) NOT NULL, tipo VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recompensas_obtenidas (id INT AUTO_INCREMENT NOT NULL, usuario_id INT NOT NULL, recompensa_id INT DEFAULT NULL, fecha DATETIME NOT NULL, anterior DATETIME NOT NULL, INDEX IDX_882BBA19DB38439E (usuario_id), INDEX IDX_882BBA19C213D7C1 (recompensa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE estadistica ADD CONSTRAINT FK_DF3A8544DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE estadistica ADD CONSTRAINT FK_DF3A854413375255 FOREIGN KEY (juego_id) REFERENCES juego (id)');
        $this->addSql('ALTER TABLE juego ADD CONSTRAINT FK_F0EC403D3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE notificacion ADD CONSTRAINT FK_729A19ECF624B39D FOREIGN KEY (sender_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE notificacion ADD CONSTRAINT FK_729A19ECCD53EDB6 FOREIGN KEY (receiver_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE recompensas_obtenidas ADD CONSTRAINT FK_882BBA19DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE recompensas_obtenidas ADD CONSTRAINT FK_882BBA19C213D7C1 FOREIGN KEY (recompensa_id) REFERENCES recompensa (id)');
        $this->addSql('DROP TABLE notificaciones');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE juego DROP FOREIGN KEY FK_F0EC403D3397707A');
        $this->addSql('ALTER TABLE estadistica DROP FOREIGN KEY FK_DF3A854413375255');
        $this->addSql('ALTER TABLE recompensas_obtenidas DROP FOREIGN KEY FK_882BBA19C213D7C1');
        $this->addSql('CREATE TABLE notificaciones (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, prioridad INT NOT NULL, mensaje VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_6FFCB21CD53EDB6 (receiver_id), INDEX IDX_6FFCB21F624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21F624B39D FOREIGN KEY (sender_id) REFERENCES usuario (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES usuario (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE estadistica');
        $this->addSql('DROP TABLE juego');
        $this->addSql('DROP TABLE notificacion');
        $this->addSql('DROP TABLE recompensa');
        $this->addSql('DROP TABLE recompensas_obtenidas');
    }
}
