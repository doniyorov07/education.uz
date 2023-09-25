<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_result_item}}`.
 */
class m220912_062746_create_test_result_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_result_item}}', [
            'id' => $this->primaryKey(),
            'test_result_id' => $this->integer(),
            'question_id' => $this->integer(),
            'user_answer_id' => $this->integer(),
            'original_answer_id' => $this->integer(),
            'is_correct' => $this->integer(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_result_item}}');
    }
}
