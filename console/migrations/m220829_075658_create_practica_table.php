<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%practica}}`.
 */
class m220829_075658_create_practica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%practica}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title' => $this->string(),
            'file' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%practica}}');
    }
}
