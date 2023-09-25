<?php

namespace frontend\controllers;


use common\models\Test;
use yii\web\Controller;
use yii\data\Pagination;
class TestController extends Controller
{

    public function actionIndex()
    {
        $query = Test::find();
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

    public function actionDetail(int $id)
    {
        $model = Test::findOne($id);
        if ($model) {
            return $this->render('detail',[
                'model' => $model
            ]);
        }
        else{
            echo '<h2 style="color:   rgb(51, 204, 255); text-align:center; font-size: 50px; margin-top: 250px">403</h2>
            <h1 style="color: red; text-align:center; font-size: 50px; padding: px">Forbidden</h1>';
        }
    }

}


?>