<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%social}}`.
 */
class m220828_175653_add_icon_column_to_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%social}}', 'icon', $this->string(20));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%social}}', 'icon');
    }
}
