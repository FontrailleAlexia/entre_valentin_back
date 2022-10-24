<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024072223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, last_message_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8A8E26E9BA0E79C3 (last_message_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE criteria (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, size INT DEFAULT NULL, silhouete VARCHAR(255) DEFAULT NULL, alcohol VARCHAR(255) DEFAULT NULL, tobacco VARCHAR(255) DEFAULT NULL, eyes VARCHAR(255) DEFAULT NULL, hair VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B61F9B81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobbies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobbies_criteria (hobbies_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_44936345B2242D72 (hobbies_id), INDEX IDX_44936345990BEA15 (criteria_id), PRIMARY KEY(hobbies_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, conversation_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307FA76ED395 (user_id), INDEX IDX_B6BD307F9AC0396 (conversation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origin_criteria (origin_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_85A9F17156A273CC (origin_id), INDEX IDX_85A9F171990BEA15 (criteria_id), PRIMARY KEY(origin_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, conversation_id INT DEFAULT NULL, messages_read_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D79F6B11A76ED395 (user_id), INDEX IDX_D79F6B119AC0396 (conversation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE particular_sign (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE particular_sign_criteria (particular_sign_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_810DFA3DEA51C03 (particular_sign_id), INDEX IDX_810DFA3D990BEA15 (criteria_id), PRIMARY KEY(particular_sign_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_criteria (style_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_97CD43AABACD6074 (style_id), INDEX IDX_97CD43AA990BEA15 (criteria_id), PRIMARY KEY(style_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, birthdate DATE NOT NULL, gender VARCHAR(1) NOT NULL, study VARCHAR(255) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, work VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, search VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D6495126AC48 (mail), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9BA0E79C3 FOREIGN KEY (last_message_id) REFERENCES message (id)');
        $this->addSql('ALTER TABLE criteria ADD CONSTRAINT FK_B61F9B81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE hobbies_criteria ADD CONSTRAINT FK_44936345B2242D72 FOREIGN KEY (hobbies_id) REFERENCES hobbies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hobbies_criteria ADD CONSTRAINT FK_44936345990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('ALTER TABLE origin_criteria ADD CONSTRAINT FK_85A9F17156A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_criteria ADD CONSTRAINT FK_85A9F171990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B119AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('ALTER TABLE particular_sign_criteria ADD CONSTRAINT FK_810DFA3DEA51C03 FOREIGN KEY (particular_sign_id) REFERENCES particular_sign (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE particular_sign_criteria ADD CONSTRAINT FK_810DFA3D990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_criteria ADD CONSTRAINT FK_97CD43AABACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_criteria ADD CONSTRAINT FK_97CD43AA990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9BA0E79C3');
        $this->addSql('ALTER TABLE criteria DROP FOREIGN KEY FK_B61F9B81A76ED395');
        $this->addSql('ALTER TABLE hobbies_criteria DROP FOREIGN KEY FK_44936345B2242D72');
        $this->addSql('ALTER TABLE hobbies_criteria DROP FOREIGN KEY FK_44936345990BEA15');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FA76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9AC0396');
        $this->addSql('ALTER TABLE origin_criteria DROP FOREIGN KEY FK_85A9F17156A273CC');
        $this->addSql('ALTER TABLE origin_criteria DROP FOREIGN KEY FK_85A9F171990BEA15');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B11A76ED395');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B119AC0396');
        $this->addSql('ALTER TABLE particular_sign_criteria DROP FOREIGN KEY FK_810DFA3DEA51C03');
        $this->addSql('ALTER TABLE particular_sign_criteria DROP FOREIGN KEY FK_810DFA3D990BEA15');
        $this->addSql('ALTER TABLE style_criteria DROP FOREIGN KEY FK_97CD43AABACD6074');
        $this->addSql('ALTER TABLE style_criteria DROP FOREIGN KEY FK_97CD43AA990BEA15');
        $this->addSql('DROP TABLE conversation');
        $this->addSql('DROP TABLE criteria');
        $this->addSql('DROP TABLE hobbies');
        $this->addSql('DROP TABLE hobbies_criteria');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE origin');
        $this->addSql('DROP TABLE origin_criteria');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE particular_sign');
        $this->addSql('DROP TABLE particular_sign_criteria');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE style_criteria');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
