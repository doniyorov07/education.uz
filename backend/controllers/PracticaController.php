<?php

namespace backend\controllers;
use Yii;

use common\models\Practica;
use common\models\PracticaSearch;
use yii\web\NotFoundHttpException;

/**
 * PracticaController implements the CRUD actions for Practica model.
 */
class PracticaController extends FilterRoleController
{
    /**
     * @inheritDoc
     */


    /**
     * Lists all Practica models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PracticaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Practica model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Practica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
         $model = new Practica();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->uploadImg();
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Practica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model =Practica::findOne($id);
        $oldImage = $model->image;
        $oldFile = $model->file;
        if ($this->request->isPost) {

            if ($model->load($this->request->post())) {
                $model->uploadImg($oldImage,$oldFile);
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Practica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Practica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Practica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Practica::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionRule()
    {
        // $admin = Yii::$app->authManager->createRole('admin');
        // $admin->description = 'admin';
        // Yii::$app->authManager->add($admin);


        // $content = Yii::$app->authManager->createRole('content');
        // $content->description = 'content';
        // Yii::$app->authManager->add($content);


        // $user = Yii::$app->authManager->createRole('user');
        // $user->description = 'users';
        // Yii::$app->authManager->add($user);


        // $ban = Yii::$app->authManager->createRole('banned');
        // $ban->description = 'sardor';
        // Yii::$app->authManager->add($ban);

        // $permit = Yii::$app->authManager->createPermission('canAdmin');
        // $permit->description = "adminku";
        // Yii::$app->authManager->add($permit);

        return 123456;
    }
}
