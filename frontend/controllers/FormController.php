<?php 
namespace frontend\controllers;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use frontend\models\Form;
use Yii;

/**
 * 
 */
class FormController extends Controller
{


    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        
         $model = new Form();

          if ($this->request->isPost) {

            if ($model->load($this->request->post()) && $model->validate()) 
            {
                $model->save(false);
                return $this->redirect('index');
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}


?>