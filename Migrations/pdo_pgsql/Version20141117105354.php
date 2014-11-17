<?php

namespace Innova\ActivityBundle\Migrations\pdo_pgsql;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2014/11/17 10:53:55
 */
class Version20141117105354 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE innova_instruction (
                id SERIAL NOT NULL, 
                activity_id INT DEFAULT NULL, 
                title VARCHAR(255) DEFAULT NULL, 
                instructionType INT NOT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_DA7D23D581C06096 ON innova_instruction (activity_id)
        ");
        $this->addSql("
            CREATE TABLE innova_activityQru (
                id SERIAL NOT NULL, 
                name VARCHAR(255) NOT NULL, 
                description TEXT DEFAULT NULL, 
                activity_order INT NOT NULL, 
                createdDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
                updatedDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE TABLE innova_question (
                id SERIAL NOT NULL, 
                activity_id INT DEFAULT NULL, 
                title VARCHAR(255) DEFAULT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_5C86412B81C06096 ON innova_question (activity_id)
        ");
        $this->addSql("
            CREATE TABLE innova_proposition (
                id SERIAL NOT NULL, 
                activity_id INT DEFAULT NULL, 
                title VARCHAR(255) DEFAULT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_660A01D081C06096 ON innova_proposition (activity_id)
        ");
        $this->addSql("
            CREATE TABLE innova_information (
                id SERIAL NOT NULL, 
                activity_id INT DEFAULT NULL, 
                title VARCHAR(255) DEFAULT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_88BEDA0081C06096 ON innova_information (activity_id)
        ");
        $this->addSql("
            CREATE TABLE innova_activityVf (
                id SERIAL NOT NULL, 
                user_id INT DEFAULT NULL, 
                name VARCHAR(255) NOT NULL, 
                description TEXT DEFAULT NULL, 
                activity_order INT NOT NULL, 
                createdDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
                updatedDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_263070EFA76ED395 ON innova_activityVf (user_id)
        ");
        $this->addSql("
            CREATE TABLE innova_object (
                id SERIAL NOT NULL, 
                activity_id INT DEFAULT NULL, 
                title VARCHAR(255) DEFAULT NULL, 
                PRIMARY KEY(id)
            )
        ");
        $this->addSql("
            CREATE INDEX IDX_3635428A81C06096 ON innova_object (activity_id)
        ");
        $this->addSql("
            ALTER TABLE innova_instruction 
            ADD CONSTRAINT FK_DA7D23D581C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            ADD CONSTRAINT FK_5C86412B81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            ADD CONSTRAINT FK_660A01D081C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            ADD CONSTRAINT FK_88BEDA0081C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_activityVf 
            ADD CONSTRAINT FK_263070EFA76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            ADD CONSTRAINT FK_3635428A81C06096 FOREIGN KEY (activity_id) 
            REFERENCES innova_activityQru (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            ADD author_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            ADD createdDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            ADD updatedDate TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            ADD CONSTRAINT FK_4605013FF675F31B FOREIGN KEY (author_id) 
            REFERENCES claro_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            CREATE INDEX IDX_4605013FF675F31B ON innova_activity (author_id)
        ");
        $this->addSql("
            ALTER TABLE innova_activitySequence 
            DROP CONSTRAINT FK_D614C342B87FAB32
        ");
        $this->addSql("
            DROP INDEX UNIQ_D614C342B87FAB32
        ");
        $this->addSql("
            ALTER TABLE innova_activitySequence 
            DROP resourceNode_id
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            ALTER TABLE innova_instruction 
            DROP CONSTRAINT FK_DA7D23D581C06096
        ");
        $this->addSql("
            ALTER TABLE innova_question 
            DROP CONSTRAINT FK_5C86412B81C06096
        ");
        $this->addSql("
            ALTER TABLE innova_proposition 
            DROP CONSTRAINT FK_660A01D081C06096
        ");
        $this->addSql("
            ALTER TABLE innova_information 
            DROP CONSTRAINT FK_88BEDA0081C06096
        ");
        $this->addSql("
            ALTER TABLE innova_object 
            DROP CONSTRAINT FK_3635428A81C06096
        ");
        $this->addSql("
            DROP TABLE innova_instruction
        ");
        $this->addSql("
            DROP TABLE innova_activityQru
        ");
        $this->addSql("
            DROP TABLE innova_question
        ");
        $this->addSql("
            DROP TABLE innova_proposition
        ");
        $this->addSql("
            DROP TABLE innova_information
        ");
        $this->addSql("
            DROP TABLE innova_activityVf
        ");
        $this->addSql("
            DROP TABLE innova_object
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            DROP CONSTRAINT FK_4605013FF675F31B
        ");
        $this->addSql("
            DROP INDEX IDX_4605013FF675F31B
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            DROP author_id
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            DROP createdDate
        ");
        $this->addSql("
            ALTER TABLE innova_activity 
            DROP updatedDate
        ");
        $this->addSql("
            ALTER TABLE innova_activitySequence 
            ADD resourceNode_id INT DEFAULT NULL
        ");
        $this->addSql("
            ALTER TABLE innova_activitySequence 
            ADD CONSTRAINT FK_D614C342B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE
        ");
        $this->addSql("
            CREATE UNIQUE INDEX UNIQ_D614C342B87FAB32 ON innova_activitySequence (resourceNode_id)
        ");
    }
}