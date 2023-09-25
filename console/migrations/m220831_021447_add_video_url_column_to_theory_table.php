<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%theory}}`.
 */
class m220831_021447_add_video_url_column_to_theory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%theory}}', 'video_url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%theory}}', 'video_url');
    }
}
