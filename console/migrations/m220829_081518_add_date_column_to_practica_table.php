<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%practica}}`.
 */
class m220829_081518_add_date_column_to_practica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%practica}}', 'date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%practica}}', 'date');
    }
}
