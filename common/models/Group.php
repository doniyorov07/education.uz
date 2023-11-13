<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $group_name
 * @property int|null $status
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['group_name'], 'string', 'max' => 30],
            [['group_name'], 'required', 'message' => 'Guruh nomi bo\'sh bo\'lmasligi kerak!'],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Guruh nomi',
            'status' => 'Status',
        ];
    }

//    public function getStudents()
//    {
//        return $this->hasMany();
//    }
}
