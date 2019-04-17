<?php

use yii\db\Migration;

/**
 * Class m190417_101205_rules
 */
class m190417_101205_rules extends Migration
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
            '{{%rules}}',
            [
                'id'=> $this->primaryKey(11),
                'content'=> $this->text()->notNull(),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%rules}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190417_101205_rules cannot be reverted.\n";

        return false;
    }
    */
}
