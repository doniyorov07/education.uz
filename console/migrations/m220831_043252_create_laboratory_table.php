<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laboratory}}`.
 */
class m220831_043252_create_laboratory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laboratory}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'date' => $this->string(),
            'title' => $this->string(500),
            'file' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laboratory}}');
    }
}
