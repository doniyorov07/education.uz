<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%theory_question_answer}}`.
 */
class m230824_182056_add_column_to_theory_question_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%theory_question_answer}}', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%theory_question_answer}}', 'date');
    }
}
