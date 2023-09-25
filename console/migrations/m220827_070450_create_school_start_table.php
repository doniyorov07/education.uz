<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%school_start}}`.
 */
class m220827_070450_create_school_start_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%school_start}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title' => $this->string(),
            'text' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%school_start}}');
    }
}
