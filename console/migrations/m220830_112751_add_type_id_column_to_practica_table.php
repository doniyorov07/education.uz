<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%practica}}`.
 */
class m220830_112751_add_type_id_column_to_practica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%practica}}', 'type_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%practica}}', 'type_id');
    }
}
