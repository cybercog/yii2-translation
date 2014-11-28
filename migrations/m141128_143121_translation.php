<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_143121_translation extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            '{{%i18n_source}}',
            [
                'id' => 'int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'category' => 'varchar(32) NOT NULL DEFAULT \'\'',
                'message' => 'varchar(128) NOT NULL DEFAULT \'\'',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createIndex('category', '{{%i18n_source}}', ['category', 'message']);

        $this->createTable(
            '{{%i18n_message}}',
            [
                'id' => 'int(11) unsigned NOT NULL DEFAULT \'0\'',
                'language' => 'varchar(8) NOT NULL DEFAULT \'\'',
                'translation' => 'varchar(128) NOT NULL DEFAULT \'\'',
            ]
        );
        $this->addPrimaryKey('pk', '{{%i18n_message}}', ['id', 'language']);
        $this->createIndex('language', '{{%i18n_message}}', ['language']);

        $this->addForeignKey(
            'i18n_message_ibfk_1',
            '{{%i18n_message}}',
            'language',
            '{{%language}}',
            'iso',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_message_id_for_source_id',
            '{{%i18n_message}}',
            'id',
            '{{%i18n_source}}',
            'id',
            'CASCADE',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('i18n_message_ibfk_1', '{{%i18n_message}}');
        $this->dropForeignKey('fk_message_id_for_source_id', '{{%i18n_message}}');

        $this->dropTable('{{%i18n_message}}');
        $this->dropTable('{{%i18n_source}}');
    }
}
