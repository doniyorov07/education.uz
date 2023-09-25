<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theory_question_answer}}`.
 */
class m230824_144404_create_theory_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theory_question_answer}}', [
            'id' => $this->primaryKey(),
            'post_id'=> $this->integer(),
            'question_id' => $this->integer(),
            'answer_text' => $this->string(2000)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%theory_question_answer}}');
    }
}
