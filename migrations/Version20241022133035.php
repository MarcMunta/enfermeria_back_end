<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241022133035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lista_enfermeros (id INT AUTO_INCREMENT NOT NULL, id_login_id INT NOT NULL, dni VARCHAR(9) NOT NULL, nombre VARCHAR(45) NOT NULL, apellido VARCHAR(45) NOT NULL, UNIQUE INDEX UNIQ_C9AF6234C690CC8 (id_login_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE login_enfermeros (id INT AUTO_INCREMENT NOT NULL, usuario VARCHAR(45) NOT NULL, contrasena VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lista_enfermeros ADD CONSTRAINT FK_C9AF6234C690CC8 FOREIGN KEY (id_login_id) REFERENCES login_enfermeros (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lista_enfermeros DROP FOREIGN KEY FK_C9AF6234C690CC8');
        $this->addSql('DROP TABLE lista_enfermeros');
        $this->addSql('DROP TABLE login_enfermeros');
    }
}
