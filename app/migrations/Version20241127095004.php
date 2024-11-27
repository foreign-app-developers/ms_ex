<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127095004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page (id SERIAL NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quiz (id SERIAL NOT NULL, frontside TEXT NOT NULL, backside TEXT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE quiz_order (id SERIAL NOT NULL, quiz_id INT DEFAULT NULL, page_id INT DEFAULT NULL, order_n INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_95AEA18853CD175 ON quiz_order (quiz_id)');
        $this->addSql('CREATE INDEX IDX_95AEA18C4663E4 ON quiz_order (page_id)');
        $this->addSql('CREATE TABLE test_ex (id SERIAL NOT NULL, task TEXT DEFAULT NULL, ans VARCHAR(255) NOT NULL, options JSON NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE test_ex_order (id SERIAL NOT NULL, test_ex_id INT DEFAULT NULL, page_id INT DEFAULT NULL, order_n INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_791E3A0BABA53D7A ON test_ex_order (test_ex_id)');
        $this->addSql('CREATE INDEX IDX_791E3A0BC4663E4 ON test_ex_order (page_id)');
        $this->addSql('CREATE TABLE text_ex (id SERIAL NOT NULL, sentense TEXT NOT NULL, ans JSON NOT NULL, user_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE text_ex_order (id SERIAL NOT NULL, text_ex_id INT DEFAULT NULL, page_id INT DEFAULT NULL, order_n INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5A3FBD4FF6CF212C ON text_ex_order (text_ex_id)');
        $this->addSql('CREATE INDEX IDX_5A3FBD4FC4663E4 ON text_ex_order (page_id)');
        $this->addSql('ALTER TABLE quiz_order ADD CONSTRAINT FK_95AEA18853CD175 FOREIGN KEY (quiz_id) REFERENCES quiz (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE quiz_order ADD CONSTRAINT FK_95AEA18C4663E4 FOREIGN KEY (page_id) REFERENCES page (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test_ex_order ADD CONSTRAINT FK_791E3A0BABA53D7A FOREIGN KEY (test_ex_id) REFERENCES test_ex (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test_ex_order ADD CONSTRAINT FK_791E3A0BC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE text_ex_order ADD CONSTRAINT FK_5A3FBD4FF6CF212C FOREIGN KEY (text_ex_id) REFERENCES text_ex (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE text_ex_order ADD CONSTRAINT FK_5A3FBD4FC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE quiz_order DROP CONSTRAINT FK_95AEA18853CD175');
        $this->addSql('ALTER TABLE quiz_order DROP CONSTRAINT FK_95AEA18C4663E4');
        $this->addSql('ALTER TABLE test_ex_order DROP CONSTRAINT FK_791E3A0BABA53D7A');
        $this->addSql('ALTER TABLE test_ex_order DROP CONSTRAINT FK_791E3A0BC4663E4');
        $this->addSql('ALTER TABLE text_ex_order DROP CONSTRAINT FK_5A3FBD4FF6CF212C');
        $this->addSql('ALTER TABLE text_ex_order DROP CONSTRAINT FK_5A3FBD4FC4663E4');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE quiz');
        $this->addSql('DROP TABLE quiz_order');
        $this->addSql('DROP TABLE test_ex');
        $this->addSql('DROP TABLE test_ex_order');
        $this->addSql('DROP TABLE text_ex');
        $this->addSql('DROP TABLE text_ex_order');
    }
}
