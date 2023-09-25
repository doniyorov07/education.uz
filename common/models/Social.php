<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string|null $url
 * @property int|null $status
 * @property int|null $icon
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['url'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Tarmoq manzili',
            'icon' => 'Ikonka',
            'status' => 'Holati',
        ];
    }
}
