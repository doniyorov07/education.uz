<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%practica}}`.
 */
class m220830_113041_add_video_url_column_to_practica_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%practica}}', 'video_url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%practica}}', 'video_url');
    }
}
