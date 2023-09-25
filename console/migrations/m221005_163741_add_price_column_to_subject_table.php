<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%subject}}`.
 */
class m221005_163741_add_price_column_to_subject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%subject}}', 'price', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%subject}}', 'price');
    }
}
