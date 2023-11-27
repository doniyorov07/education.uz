<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%krossword}}`.
 */
class m231127_045656_add_column_to_krossword_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%krossword}}', 'views_count', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%krossword}}', 'views_count');
    }
}
