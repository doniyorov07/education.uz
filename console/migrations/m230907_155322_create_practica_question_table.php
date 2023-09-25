<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%practica_question}}`.
 */
class m230907_155322_create_practica_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%practica_question}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'post_id' => $this->integer(),
            'image' => $this->string(),
            'question_text' => $this->string(2000),
            'date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%practica_question}}');
    }
}
