<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%theory}}`.
 */
class m220901_171558_add_views_count_column_to_theory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%theory}}', 'views_count', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%theory}}', 'views_count');
    }
}
