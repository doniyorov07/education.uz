<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%nevs}}`.
 */
class m220831_060456_add_type_id_column_to_nevs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%nevs}}', 'type_id', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%nevs}}', 'type_id');
    }
}
