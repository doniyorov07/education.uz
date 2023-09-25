<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m220912_053416_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1000)->notNull(),
            'subject_id' => $this->integer(),
            'status' => $this->integer(),
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
        $this->dropTable('{{%question}}');
    }
}
