<?php

namespace backend\controllers;

use common\models\Task;
use yii\web\NotFoundHttpException;

class TaskController extends FilterRoleController
{

    public function actionIndex()
    {
        $model = new Task();
        $group = Task::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->validate()) {
                $model->save(false);
                return $this->redirect(['index']);
            }
        }else {
            $model->loadDefaultValues();
        }
        return $this->render('index', [
            'model' => $model,
            'group' => $group,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Task::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
}