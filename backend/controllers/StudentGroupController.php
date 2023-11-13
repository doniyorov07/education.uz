<?php

namespace backend\controllers;
use common\models\Group;
use common\models\StudentGroup;
use dominus77\sweetalert2\Alert;
use Yii;
use yii\web\NotFoundHttpException;


/**
 * @method redirect(string[] $array)
 */
class StudentGroupController extends FilterRoleController
{

    /**
     * @throws NotFoundHttpException
     */




    public function actionIndex()
    {
        $model = new StudentGroup();
        if (Yii::$app->request->isPost) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->isDuplicateEntry()) {
                    Yii::$app->session->setFlash(Alert::TYPE_WARNING, [
                        'text' => 'Bu foydalanuvchi allaqachon biriktirilgan!',
                        'timer' => 3500
                    ]);
                } else {
                    $model->save(false);
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }


}