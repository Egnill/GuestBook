<?php

use yii\db\Migration;

/**
 * Class m201208_125557_create_table_reviews
 */
class m201208_125557_create_table_reviews extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reviews}}', [
            'id' => $this->primaryKey(),
            'user_name' => $this->string(50)->null(),
            'text' => $this->text()->null(),
            'date' => $this->date()->defaultValue('0000-00-00'),
            'number_like' => $this->integer(3)->defaultValue(0),
            'status_active' => $this->integer(1)->defaultValue(1),
            'image' => $this->string()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reviews}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201208_125557_create_table_reviews cannot be reverted.\n";

        return false;
    }
    */
}
