<?php

use yii\db\Migration;

/**
 * Class m190423_161929_emailverification
 */
class m190423_161929_emailverification extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'status', $this->smallInteger()->notNull()->defaultValue(0));
        $this->addColumn('{{%user}}', 'email_confirm_token', $this->string()->unique()->after('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'email_confirm_token');
        $this->dropColumn('{{%user}}', 'status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190423_161929_emailverification cannot be reverted.\n";

        return false;
    }
    */
}
