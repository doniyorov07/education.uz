<?php



namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use Yii;
class FilterController extends Controller

{


//    public function beforeAction($action)
//    {
//        if (parent::beforeAction($action)) {
//            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role !== 'user') {
//                Yii::$app->user->logout();
//                Yii::$app->session->setFlash('error', 'Sizga ruxsat etilmagan');
//                $this->redirect(['/site/login']);
//            }
//            return true;
//        }
//        return false;
//    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup', 'error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }



    public function debug($variable) {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }

}