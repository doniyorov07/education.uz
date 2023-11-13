<?php

namespace frontend\modules\profilemanager\models;

use common\models\User;
use Yii;

class ProfileUser extends User
{

    public function rules()
    {
        return [
            ['username', 'required'],
            ['username', 'unique'],
            [['username'], 'string', 'max' => 255],
        ];
    }

    public function setAttributeLabels()
    {
        return [
            'username' => "Login",
        ];
    }

    public function scenarios()
    {
        $s = parent::scenarios();
        $s['change_username'] = ['username'];
        $s['change_password'] = ['password_hash'];
        return $s;
    }

    /**
     * @return \backend\modules\profilemanager\models\ProfileUser|false
     */
    public static function getUserModel()
    {

        $model = static::findOne(Yii::$app->user->getId());
        if ($model == null) {
            return false;
        }

        $model->scenario = 'change_username';
        return $model;
    }

}