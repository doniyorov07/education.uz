<?php

namespace backend\modules\testmanager\controllers;

use backend\modules\testmanager\models\Option;
use backend\modules\testmanager\models\Question;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Default controller for the `testmanager` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], //todo admin
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

   /* public function actionImport()
    {
        $query = new Query();
        $oldTests = $query->select("*")
            ->from('test')
            ->andWhere(['lesson_id' => [28,29, 34,35,41]])
            ->all(Yii::$app->db2);
        foreach ($oldTests as $test) {

            $question = new Question();
            $question->subject_id = 2;
            $question->title = $test['title'];
            $question->status = 1;
            if ($question->save()) {


                $newQuery = new Query();
                $options = $newQuery->select('*')
                    ->from('answer')
                    ->andWhere(['test_id' => $test['id']])
                    ->all(Yii::$app->db2);


                foreach ($options as $option) {

                    $model = new Option();
                    $model->text = $option['text'];
                    $model->is_answer = $option['is_answer'];
                    $model->question_id = $question->id;
                    $model->save();

                }

            } else dd($question->errors);

        }
    }*/
}
