<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theory_question}}`.
 */
class m230824_143737_create_theory_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theory_question}}', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'image' => $this->string(),
            'question_text' => $this->string(2000),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%theory_question}}');
    }
}
