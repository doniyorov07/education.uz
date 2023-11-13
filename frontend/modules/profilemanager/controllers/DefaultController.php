<?php

namespace frontend\modules\profilemanager\controllers;

use dominus77\sweetalert2\Alert;
use frontend\modules\profilemanager\models\ChangePasswordForm;
use frontend\modules\profilemanager\models\ProfileUser;
use frontend\controllers\FilterController;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `profilemanager` module
 */
class DefaultController extends FilterController
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
//    public function actionChangeLogin()
//    {
//        $model = ProfileUser::getUserModel();
//
//        if (!$model) {
//            throw new NotFoundHttpException(Yii::t('app', 'Sahifa mavjud emas!'));
//        }
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            Yii::$app->session->setFlash('success', Yii::t('app', 'Login muvaffaqqiyatli o\'zgartirildi!'));
//            return $this->redirect(['index']);
//        }
//        return $this->render('changeLogin', ['model' => $model]);
//    }

    public function actionChangePassword()
    {
        $model = new ChangePasswordForm();

        $id = Yii::$app->request->get('id');

        if ($model->load(Yii::$app->request->post()) && $model->savePassword($id)) {

            Yii::$app->session->setFlash(Alert::TYPE_SUCCESS, [
                'text' => 'Parol muvaffaqqiyatli o\'zgartirildi!',
                'timer' => 3500
            ]);
            return $this->redirect(['/profile/cabinet']);

        }
        return $this->render('changePassword', ['model' => $model]);
    }
}
