<?php
/*
 *  @author Shukurullo Odilov
 *  @link telegram: https://t.me/yii2_dasturchi
 *  @date 19.07.2021, 7:17
 */

namespace backend\modules\testmanager\controllers;

use backend\modules\testmanager\models\Option;
use backend\modules\testmanager\models\Question;
use backend\modules\testmanager\models\search\QuestionSearch;
use backend\modules\testmanager\models\Subject;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Question models.
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex($subject_id)
    {
        $subject = $this->findSubjectModel($subject_id);
        $searchModel = new QuestionSearch();
        $searchModel->subject_id = $subject->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'subject' => $subject,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCreate($subject_id)
    {
        $subject = $this->findSubjectModel($subject_id);
        $model = new Question([
            'subject_id' => $subject_id,
        ]);
        $modelsOption = [new Option()];

        if ($model->load(Yii::$app->request->post())) {
            if ($model->insertMultiple($modelsOption)) {
                return $this->redirect(['index', 'subject_id' => $subject->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'subject' => $subject,
            'modelsOption' => $modelsOption,
        ]);
    }

    /**
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $subject = $model->subject;

        $modelsOption = $model->options;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->updateMultiple($modelsOption)) {
                return $this->redirect(['index', 'subject_id' => $subject->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'subject' => $subject,
            'modelsOption' => empty($modelsOption) ? [new Option()] : $modelsOption,
        ]);
    }


    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subject|null the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findSubjectModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
