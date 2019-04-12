<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132501_settings extends Migration
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
            '{{%settings}}',
            [
                'id'=> $this->primaryKey(11),
                'description'=> $this->string(500)->notNull(),
                'keywords'=> $this->string(500)->notNull(),
                'url_image'=> $this->string(200)->notNull(),
                'name_image'=> $this->string(100)->notNull(),
                'name'=> $this->string(100)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
