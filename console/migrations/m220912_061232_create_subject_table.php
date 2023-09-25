<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subject}}`.
 */
class m220912_061232_create_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subject}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string()->notNull(),
            'duration' =>$this->integer()->notNull(),
            'tests_count' => $this->string()->notNull(),
            'is_free' =>$this->integer(),
            'show_answer' => $this->integer(),
            'status' => $this->boolean()->defaultValue(false),




        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subject}}');
    }
}
