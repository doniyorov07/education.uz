<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nevs}}`.
 */
class m220827_104819_create_nevs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nevs}}', [
            'id' => $this->primaryKey(),
            'views_count' => $this->string(),
            'image' => $this->string(),
            'video_url' => $this->string(),
            'title' => $this->string(),
            'text' => $this->string(),
            'batafsil' => $this->text(),
            'date' => $this->dateTime(),
            'status' => $this->boolean()->defaultValue(false),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%nevs}}');
    }
}
