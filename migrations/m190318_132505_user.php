<?php

use yii\db\Schema;
use yii\db\Migration;

class m190318_132505_user extends Migration
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
            '{{%user}}',
            [
                'id'=> $this->primaryKey(11),
                'username'=> $this->string(50)->notNull(),
                'password'=> $this->text()->notNull(),
                'authKey'=> $this->text()->notNull(),
                'accessToken'=> $this->text()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
