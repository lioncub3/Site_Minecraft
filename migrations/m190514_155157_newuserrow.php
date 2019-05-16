<?php

use yii\db\Migration;

/**
 * Class m190514_155157_newuserrow
 */
class m190514_155157_newuserrow extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'uuid', $this->char(36)->unique()->defaultValue(null));
        $this->addColumn('{{%user}}', 'serverID', $this->string(41)->defaultValue(null));

//        $query = "UPDATE user SET uuid=(SELECT UUID()) WHERE uuid IS NULL;";
//
//        $connection = Yii::$app->getDb();
//
//        $command = $connection->createCommand($query);
//
//        $result = $command->queryAll();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'uuid');
        $this->dropColumn('{{%user}}', 'serverID');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_155157_newuserrow cannot be reverted.\n";

        return false;
    }
    */
}
