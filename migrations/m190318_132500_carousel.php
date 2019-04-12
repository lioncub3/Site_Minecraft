<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132500_carousel extends Migration
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
            '{{%carousel_data}}',
            [
                'id'=> $this->primaryKey(11),
                'img_banner'=> $this->string(50)->notNull(),
                'title'=> $this->text()->notNull(),
                'content'=> $this->text()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%carousel_data}}');
    }
}
