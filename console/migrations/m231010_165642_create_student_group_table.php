<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_group}}`.
 */
class m231010_165642_create_student_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_group}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer(),
            'student_id' => $this->integer(),
        ]);

        // Add foreign key for group_id referencing id column in group table
        $this->addForeignKey(
            'fk-student_group-group_id',
            '{{%student_group}}',
            'group_id',
            '{{%group}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Add foreign key for student_id referencing id column in user table
        $this->addForeignKey(
            'fk-student_group-student_id',
            '{{%student_group}}',
            'student_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key for student_id
        $this->dropForeignKey(
            'fk-student_group-student_id',
            '{{%student_group}}'
        );

        // Drop foreign key for group_id
        $this->dropForeignKey(
            'fk-student_group-group_id',
            '{{%student_group}}'
        );

        $this->dropTable('{{%student_group}}');
    }

}
