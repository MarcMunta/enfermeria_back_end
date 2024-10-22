<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241018144650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lista_enfermeros (id INT AUTO_INCREMENT NOT NULL, login_enfermeros_id INT NOT NULL, dni INT NOT NULL, nombre VARCHAR(45) NOT NULL, apellido VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_C9AF623485418284 (login_enfermeros_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_enfermeros (id INT AUTO_INCREMENT NOT NULL, usuario VARCHAR(45) NOT NULL, contrasena VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lista_enfermeros ADD CONSTRAINT FK_C9AF623485418284 FOREIGN KEY (login_enfermeros_id) REFERENCES login_enfermeros (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_enfermeros DROP FOREIGN KEY FK_C9AF623485418284');
        $this->addSql('DROP TABLE lista_enfermeros');
        $this->addSql('DROP TABLE login_enfermeros');
    }
}
