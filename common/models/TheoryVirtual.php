<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theory_virtual".
 *
 * @property int $id
 * @property string|null $lesson_name
 * @property string|null $video_link
 * @property int|null $status
 */
class TheoryVirtual extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theory_virtual';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['lesson_name'], 'string', 'max' => 1000],
            [['video_link'], 'string', 'max' => 500],
            [['lesson_name', 'video_link'], 'required', 'message' =>'{attribute} bo\'sh bo\'lishi mumkin emas'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_name' => 'Dars nomi',
            'video_link' => 'Video Link',
            'status' => 'Holati',
        ];
    }
}
