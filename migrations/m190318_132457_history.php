<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132457_history extends Migration
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
            '{{%history}}',
            [
                'id'=> $this->primaryKey(11),
                'image_url'=> $this->string(200)->notNull(),
                'description'=> $this->text()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%history}}');
    }
}
