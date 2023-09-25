<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_result}}`.
 */
class m221005_170625_create_test_result_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_result}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'user_id' => $this->integer(),
            'duration' => $this->integer(),
            'subject_id' => $this->integer(),
            'started_at' => $this->integer(),
            'tests_count' => $this->integer(),
            'correct_answers' => $this->integer(),
            'expire_at' => $this->integer(),
            'price' => $this->integer(),
            'finished_at' => $this->integer(),
            'userFullName' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%test_result}}');
    }
}
