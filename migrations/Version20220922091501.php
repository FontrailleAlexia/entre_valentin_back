<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220922091501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE hobbies_criteria (hobbies_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_44936345B2242D72 (hobbies_id), INDEX IDX_44936345990BEA15 (criteria_id), PRIMARY KEY(hobbies_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origin_criteria (origin_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_85A9F17156A273CC (origin_id), INDEX IDX_85A9F171990BEA15 (criteria_id), PRIMARY KEY(origin_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE particular_sign_criteria (particular_sign_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_810DFA3DEA51C03 (particular_sign_id), INDEX IDX_810DFA3D990BEA15 (criteria_id), PRIMARY KEY(particular_sign_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style_criteria (style_id INT NOT NULL, criteria_id INT NOT NULL, INDEX IDX_97CD43AABACD6074 (style_id), INDEX IDX_97CD43AA990BEA15 (criteria_id), PRIMARY KEY(style_id, criteria_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hobbies_criteria ADD CONSTRAINT FK_44936345B2242D72 FOREIGN KEY (hobbies_id) REFERENCES hobbies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hobbies_criteria ADD CONSTRAINT FK_44936345990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_criteria ADD CONSTRAINT FK_85A9F17156A273CC FOREIGN KEY (origin_id) REFERENCES origin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE origin_criteria ADD CONSTRAINT FK_85A9F171990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE particular_sign_criteria ADD CONSTRAINT FK_810DFA3DEA51C03 FOREIGN KEY (particular_sign_id) REFERENCES particular_sign (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE particular_sign_criteria ADD CONSTRAINT FK_810DFA3D990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_criteria ADD CONSTRAINT FK_97CD43AABACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE style_criteria ADD CONSTRAINT FK_97CD43AA990BEA15 FOREIGN KEY (criteria_id) REFERENCES criteria (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE city city VARCHAR(255) NOT NULL, CHANGE work work VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hobbies_criteria DROP FOREIGN KEY FK_44936345B2242D72');
        $this->addSql('ALTER TABLE hobbies_criteria DROP FOREIGN KEY FK_44936345990BEA15');
        $this->addSql('ALTER TABLE origin_criteria DROP FOREIGN KEY FK_85A9F17156A273CC');
        $this->addSql('ALTER TABLE origin_criteria DROP FOREIGN KEY FK_85A9F171990BEA15');
        $this->addSql('ALTER TABLE particular_sign_criteria DROP FOREIGN KEY FK_810DFA3DEA51C03');
        $this->addSql('ALTER TABLE particular_sign_criteria DROP FOREIGN KEY FK_810DFA3D990BEA15');
        $this->addSql('ALTER TABLE style_criteria DROP FOREIGN KEY FK_97CD43AABACD6074');
        $this->addSql('ALTER TABLE style_criteria DROP FOREIGN KEY FK_97CD43AA990BEA15');
        $this->addSql('DROP TABLE hobbies_criteria');
        $this->addSql('DROP TABLE origin_criteria');
        $this->addSql('DROP TABLE particular_sign_criteria');
        $this->addSql('DROP TABLE style_criteria');
        $this->addSql('ALTER TABLE user CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE work work VARCHAR(255) NOT NULL');
    }
}
