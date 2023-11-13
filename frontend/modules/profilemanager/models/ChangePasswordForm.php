<?php


namespace frontend\modules\profilemanager\models;

use Yii;
use yii\base\Model;

class ChangePasswordForm extends Model
{

    public $password;
    public $repassword;

    public function rules()
    {
        return [

            [['password',], 'string', 'min' => 5, 'max' => 255],
            [['repassword'], 'string', 'max' => 255],
            [['password', 'repassword'], 'required'],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Parol mos emas')],

        ];
    }

    public function attributeLabels()
    {
        return [
            'password' => Yii::t('app', 'Yangi Parol'),
            'repassword' => Yii::t('app', 'Parolni qayta kiriting'),
        ];
    }

    public function savePassword($id)
    {
        if (!$this->validate()) {
            return false;
        }

        $newPassword = Yii::$app->security->generatePasswordHash($this->password);
        $id == '' ? Yii::$app->user->identity->id : $id;
        $model = ProfileUser::findOne(Yii::$app->user->identity->id);
        $model->scenario = 'change_password';
        $model->password_hash = $newPassword;
        return $model->save();
    }

}