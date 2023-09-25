<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%practica}}`.
 */
class m220901_164059_add_views_count_column_to_practica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%practica}}', 'views_count', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%practica}}', 'views_count');
    }
}
