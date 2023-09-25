<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%theory}}`.
 */
class m220831_021327_add_type_id_column_to_theory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%theory}}', 'type_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%theory}}', 'type_id');
    }
}
