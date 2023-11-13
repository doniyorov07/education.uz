<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string|null $task_text
 * @property string|null $task_number
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_text'], 'string', 'max' => 1000],
            [['task_number'], 'string', 'max' => 255],
            [['task_number', 'task_text', 'attemps'], 'required', 'message' => '{attribute} bo\'sh bo\'lmasligi kerak!']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_text' => 'Topshiriq mavzusi',
            'task_number' => 'Topshiriq nomeri',
            'attemps' => 'Urinishlar soni',
        ];
    }

}
