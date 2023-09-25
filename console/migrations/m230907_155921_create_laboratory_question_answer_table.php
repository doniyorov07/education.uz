<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%laboratory_question_answer}}`.
 */
class m230907_155921_create_laboratory_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%laboratory_question_answer}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'post_id'=> $this->integer(),
            'question_id' => $this->integer(),
            'answer_text' => $this->string(2000),
            'date' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%laboratory_question_answer}}');
    }
}
