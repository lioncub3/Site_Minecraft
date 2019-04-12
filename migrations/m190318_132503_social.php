<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132503_social extends Migration
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
            '{{%social}}',
            [
                'id'=> $this->primaryKey(11),
                'instagram'=> $this->string(200)->notNull(),
                'facebook'=> $this->string(200)->notNull(),
                'twitter'=> $this->string(200)->notNull(),
                'viber'=> $this->string(200)->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
