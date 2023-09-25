<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%form}}`.
 */
class m220903_073817_create_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%form}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'message' => $this->string(1000)->notNull(),
            'status' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%form}}');
    }
}
