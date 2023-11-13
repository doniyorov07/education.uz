<?php
namespace frontend\models;

use yii\base\Model;
use Yii;
class ChangePasswordForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    public function changePassword()
    {
        if ($this->validate()) {
            // Foydalanuvchi parolini o'zgartirishni amalga oshiring
            $user = Yii::$app->user->identity;
            $user->setPassword($this->newPassword);
            return $user->save(false);
        }
        return false;
    }
}
