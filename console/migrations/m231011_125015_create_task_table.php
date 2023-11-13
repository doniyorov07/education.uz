<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m231011_125015_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'task_text' => $this->string(1000),
            'task_number' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
