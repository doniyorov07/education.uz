<?php

namespace frontend\controllers;

use common\models\Task;

class TaskController extends FilterController
{

    public function actionIndex()
    {
        $model = Task::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}