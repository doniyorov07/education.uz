<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%option}}`.
 */
class m220912_052349_create_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%option}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(1000)->notNull(),
            'question_id' => $this->integer(),
            'is_answer' => $this->integer(),
            'user_id' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%option}}');
    }
}
