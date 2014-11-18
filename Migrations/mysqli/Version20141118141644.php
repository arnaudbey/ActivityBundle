<?php

namespace Innova\ActivityBundle\Migrations\mysqli;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2014/11/18 02:16:46
 */
class Version20141118141644 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE innova_activityqru_question (
                activity_id INT NOT NULL, 
                question_id INT NOT NULL, 
                INDEX IDX_E0B871E681C06096 (activity_id), 
                UNIQUE INDEX UNIQ_E0B871E61E27F6BF (question_id), 
                PRIMARY KEY(activity_id, question_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityqru_object (
                activity_id INT NOT NULL, 
                object_id INT NOT NULL, 
                INDEX IDX_EDAEE2B781C06096 (activity_id), 
                UNIQUE INDEX UNIQ_EDAEE2B7232D562B (object_id), 
                PRIMARY KEY(activity_id, object_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityqru_proposition (
                activity_id INT NOT NULL, 
                proposition_id INT NOT NULL, 
                INDEX IDX_E15A2F2781C06096 (activity_id), 
                UNIQUE INDEX UNIQ_E15A2F27DB96F9E (proposition_id), 
                PRIMARY KEY(activity_id, proposition_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityqru_instruction (
                activity_id INT NOT NULL, 
                instruction_id INT NOT NULL, 
                INDEX IDX_5D2D0D2281C06096 (activity_id), 
                UNIQUE INDEX UNIQ_5D2D0D2262A10F76 (instruction_id), 
                PRIMARY KEY(activity_id, instruction_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityqru_information (
                activity_id INT NOT NULL, 
                information_id INT NOT NULL, 
                INDEX IDX_FEEF4F781C06096 (activity_id), 
                UNIQUE INDEX UNIQ_FEEF4F72EF03101 (information_id), 
                PRIMARY KEY(activity_id, information_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityvf_question (
                activity_id INT NOT NULL, 
                question_id INT NOT NULL, 
                INDEX IDX_2EE21F2A81C06096 (activity_id), 
                UNIQUE INDEX UNIQ_2EE21F2A1E27F6BF (question_id), 
                PRIMARY KEY(activity_id, question_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityvf_object (
                activity_id INT NOT NULL, 
                object_id INT NOT NULL, 
                INDEX IDX_9DD5D9781C06096 (activity_id), 
                UNIQUE INDEX UNIQ_9DD5D97232D562B (object_id), 
                PRIMARY KEY(activity_id, object_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityvf_proposition (
                activity_id INT NOT NULL, 
                proposition_id INT NOT NULL, 
                INDEX IDX_92FBE0E81C06096 (activity_id), 
                UNIQUE INDEX UNIQ_92FBE0EDB96F9E (proposition_id), 
                PRIMARY KEY(activity_id, proposition_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityvf_instruction (
                activity_id INT NOT NULL, 
                instruction_id INT NOT NULL, 
                INDEX IDX_B5589C0B81C06096 (activity_id), 
                UNIQUE INDEX UNIQ_B5589C0B62A10F76 (instruction_id), 
                PRIMARY KEY(activity_id, instruction_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE innova_activityvf_information (
                activity_id INT NOT NULL, 
                information_id INT NOT NULL, 
                INDEX IDX_E79B65DE81C06096 (activity_id), 
                UNIQUE INDEX UNIQ_E79B65DE2EF03101 (information_id), 
                PRIMARY KEY(activity_id, information_id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_question 
            ADD CONSTRAINT FK_E0B871E681C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_question 
            ADD CONSTRAINT FK_E0B871E61E27F6BF FOREIGN KEY (question_id) 
            REFERENCES innova_question (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_object 
            ADD CONSTRAINT FK_EDAEE2B781C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_object 
            ADD CONSTRAINT FK_EDAEE2B7232D562B FOREIGN KEY (object_id) 
            REFERENCES innova_object (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_proposition 
            ADD CONSTRAINT FK_E15A2F2781C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_proposition 
            ADD CONSTRAINT FK_E15A2F27DB96F9E FOREIGN KEY (proposition_id) 
            REFERENCES innova_proposition (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_instruction 
            ADD CONSTRAINT FK_5D2D0D2281C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_instruction 
            ADD CONSTRAINT FK_5D2D0D2262A10F76 FOREIGN KEY (instruction_id) 
            REFERENCES innova_instruction (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_information 
            ADD CONSTRAINT FK_FEEF4F781C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityqru_information 
            ADD CONSTRAINT FK_FEEF4F72EF03101 FOREIGN KEY (information_id) 
            REFERENCES innova_information (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_question 
            ADD CONSTRAINT FK_2EE21F2A81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityVf (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_question 
            ADD CONSTRAINT FK_2EE21F2A1E27F6BF FOREIGN KEY (question_id) 
            REFERENCES innova_question (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_object 
            ADD CONSTRAINT FK_9DD5D9781C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityVf (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_object 
            ADD CONSTRAINT FK_9DD5D97232D562B FOREIGN KEY (object_id) 
            REFERENCES innova_object (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_proposition 
            ADD CONSTRAINT FK_92FBE0E81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityVf (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_proposition 
            ADD CONSTRAINT FK_92FBE0EDB96F9E FOREIGN KEY (proposition_id) 
            REFERENCES innova_proposition (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_instruction 
            ADD CONSTRAINT FK_B5589C0B81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityVf (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_instruction 
            ADD CONSTRAINT FK_B5589C0B62A10F76 FOREIGN KEY (instruction_id) 
            REFERENCES innova_instruction (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_information 
            ADD CONSTRAINT FK_E79B65DE81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityVf (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityvf_information 
            ADD CONSTRAINT FK_E79B65DE2EF03101 FOREIGN KEY (information_id) 
            REFERENCES innova_information (id)
        ");
        $this->addSql("
            ALTER TABLE innova_instruction 
            DROP FOREIGN KEY FK_DA7D23D581C06096
        ");
        $this->addSql("
            DROP INDEX IDX_DA7D23D581C06096 ON innova_instruction
        ");
        $this->addSql("
            ALTER TABLE innova_instruction 
            DROP activity_id
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            ADD author_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            ADD CONSTRAINT FK_E91F6477BF396750 FOREIGN KEY (id) 
            REFERENCES innova_activitySequence (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            ADD CONSTRAINT FK_E91F6477F675F31B FOREIGN KEY (author_id) 
            REFERENCES claro_user (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_E91F6477F675F31B ON innova_activityQru (author_id)
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            DROP FOREIGN KEY FK_5C86412B81C06096
        ");
        $this->addSql("
            DROP INDEX IDX_5C86412B81C06096 ON innova_question
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            DROP activity_id
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            DROP FOREIGN KEY FK_660A01D081C06096
        ");
        $this->addSql("
            DROP INDEX IDX_660A01D081C06096 ON innova_proposition
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            DROP activity_id
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            DROP FOREIGN KEY FK_88BEDA0081C06096
        ");
        $this->addSql("
            DROP INDEX IDX_88BEDA0081C06096 ON innova_information
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            DROP activity_id
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            DROP FOREIGN KEY FK_263070EFA76ED395
        ");
        $this->addSql("
            DROP INDEX IDX_263070EFA76ED395 ON innova_activityVf
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf CHANGE user_id author_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            ADD CONSTRAINT FK_263070EFBF396750 FOREIGN KEY (id) 
            REFERENCES innova_activitySequence (id)
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            ADD CONSTRAINT FK_263070EFF675F31B FOREIGN KEY (author_id) 
            REFERENCES claro_user (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_263070EFF675F31B ON innova_activityVf (author_id)
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            DROP FOREIGN KEY FK_3635428A81C06096
        ");
        $this->addSql("
            DROP INDEX IDX_3635428A81C06096 ON innova_object
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            DROP activity_id
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            DROP TABLE innova_activityqru_question
        ");
        $this->addSql("
            DROP TABLE innova_activityqru_object
        ");
        $this->addSql("
            DROP TABLE innova_activityqru_proposition
        ");
        $this->addSql("
            DROP TABLE innova_activityqru_instruction
        ");
        $this->addSql("
            DROP TABLE innova_activityqru_information
        ");
        $this->addSql("
            DROP TABLE innova_activityvf_question
        ");
        $this->addSql("
            DROP TABLE innova_activityvf_object
        ");
        $this->addSql("
            DROP TABLE innova_activityvf_proposition
        ");
        $this->addSql("
            DROP TABLE innova_activityvf_instruction
        ");
        $this->addSql("
            DROP TABLE innova_activityvf_information
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            DROP FOREIGN KEY FK_E91F6477BF396750
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            DROP FOREIGN KEY FK_E91F6477F675F31B
        ");
        $this->addSql("
            DROP INDEX IDX_E91F6477F675F31B ON innova_activityQru
        ");
        $this->addSql("
            ALTER TABLE innova_activityQru 
            DROP author_id
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            DROP FOREIGN KEY FK_263070EFBF396750
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            DROP FOREIGN KEY FK_263070EFF675F31B
        ");
        $this->addSql("
            DROP INDEX IDX_263070EFF675F31B ON innova_activityVf
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf CHANGE author_id user_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            ADD CONSTRAINT FK_263070EFA76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_263070EFA76ED395 ON innova_activityVf (user_id)
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            ADD activity_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            ADD CONSTRAINT FK_88BEDA0081C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activity (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_88BEDA0081C06096 ON innova_information (activity_id)
        ");
        $this->addSql("
            ALTER TABLE innova_instruction 
            ADD activity_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_instruction 
            ADD CONSTRAINT FK_DA7D23D581C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activity (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_DA7D23D581C06096 ON innova_instruction (activity_id)
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            ADD activity_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            ADD CONSTRAINT FK_3635428A81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activity (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_3635428A81C06096 ON innova_object (activity_id)
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            ADD activity_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            ADD CONSTRAINT FK_660A01D081C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activity (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_660A01D081C06096 ON innova_proposition (activity_id)
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            ADD activity_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            ADD CONSTRAINT FK_5C86412B81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activity (id)
        ");
        $this->addSql("
            CREATE INDEX IDX_5C86412B81C06096 ON innova_question (activity_id)
        ");
    }
}