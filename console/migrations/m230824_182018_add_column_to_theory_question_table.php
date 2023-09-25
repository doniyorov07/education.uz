<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%theory_question}}`.
 */
class m230824_182018_add_column_to_theory_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%theory_question}}', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%theory_question}}', 'date');
    }
}
