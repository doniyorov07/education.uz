<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task_table}}`.
 */
class m231011_153519_create_task_table_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task_table}}', [
            'id' => $this->primaryKey(),
            'student_id' => $this->integer(),
            'group_id' => $this->integer(),
            'task_id' => $this->integer(),
            'attemps' => $this->integer(),
            'file' => $this->string(),
            'datetime' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task_table}}');
    }
}
