<?php

namespace frontend\controllers;

use common\models\Practica;
use common\models\Test;
use common\models\TheoryVirtual;
use yii\web\Controller;
use yii\data\Pagination;
class TheoryVirtualController extends Controller
{

      public function actionIndex()
    {
        $query = TheoryVirtual::find();
        $count = $query->count();
        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 6
        ]);

        $model = $query->limit($pagination->limit)->offset($pagination->offset)->where(['status' => 1])->all();

        return $this->render('index', [
            'model' => $model,
            'pagination' => $pagination,
        ]);

    }



}


?>