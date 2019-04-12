<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132456_gallery extends Migration
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
            '{{%gallery}}',
            [
                'id'=> $this->primaryKey(11),
                'url_image'=> $this->string(200)->notNull(),
                'name'=> $this->string(50)->notNull(),
                'description'=> $this->string(300)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%gallery}}');
    }
}
