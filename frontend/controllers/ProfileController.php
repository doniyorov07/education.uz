<?php

namespace frontend\controllers;
use common\models\Nevs;
use common\models\User;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class ProfileController extends FilterController
{

    public function actionCabinet(): string
    {
        $userId = Yii::$app->user->id;
        if ($userId === null) {
            throw new \yii\web\ForbiddenHttpException('Access denied.');
        }

        $user = User::find()
            ->with('userGroups')
            ->where(['id' => $userId])
            ->one();

        $first_name = $user->first_name;
        $last_name = $user->last_name;
        $email = $user->email;

        return $this->render('cabinet', [
            'user' => $user,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);
    }

    public function actionUpdate()
    {
        $userId = Yii::$app->user->id;
        if ($userId === null) {
            throw new NotFoundHttpException('Bunday foydalanuvchi mavjud emas', '404');
        }
        $model = User::findOne($userId);

        if (!$model) {
            throw new NotFoundHttpException('Foydalanuvchi topilmadi', '404');
        }
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->save();
                return $this->redirect(['cabinet']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword()
    {
        $model = new \frontend\models\ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->getSession()->setFlash('success', 'Parolingiz muvaffaqiyatli o\'zgartirildi');
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }



}