<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132502_site_icons extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%site_icons}}',
            [
                'id'=> $this->primaryKey(11),
                'path'=> $this->string(200)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%site_icons}}');
    }
}
