<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "task_table".
 *
 * @property int $id
 * @property int|null $student_id
 * @property int|null $group_id
 * @property int|null $task_id
 * @property int|null $attempts
 * @property string|null $file
 * @property string|null $datetime
 */
class TaskTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $attempts
    ;
    public static function tableName()
    {
        return 'task_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'group_id', 'task_id', 'attempts'], 'integer'],
            [['datetime'], 'safe'],
            [['file'], 'file', 'extensions' => 'pdf, doc, docx', 'maxSize' => 2 * (1024 * 1024)],
            [['file'], 'required', 'message' => '{attribute} bo\'sh bo\'lmasligi kerak'],

        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'group_id' => 'Group ID',
            'task_id' => 'Task ID',
            'attempts' => 'Attemps',
            'file' => 'Fayl',
            'datetime' => 'Datetime',
        ];
    }
    public function getTasks()
    {
        return $this->hasOne(User::className(), ['id' => 'student_id']);
    }

    public function getTaskNumber()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }
}
