<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theory}}`.
 */
class m220828_115521_create_theory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theory}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'date' => $this->date(),
            'title' => $this->string(),
            'text' => $this->string(),
            'file' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%theory}}');
    }
}
