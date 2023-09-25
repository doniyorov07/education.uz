<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "form".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property int|null $status
 */
class Form extends \yii\db\ActiveRecord
{ 
    public $verifyCode;
    
    public static function tableName()
    {
        return 'form';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'message', 'verifyCode'], 'required', 'message' => '{attribute} bo\'sh bo\'lmasligi kerak'],
            [['status'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255],
            [['message'], 'string', 'max' => 1000],
            ['verifyCode', 'captcha', 'message' => "Iltimos tekshiruv kodini to'g'ri yozing"],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ismi',
            'email' => 'Emaili',
            'message' => 'Xabari',
            'verifyCode' => 'Tekshiruv kodi',
            'status' => 'Holati',
        ];
    }
}
