<?phpnamespace backend\controllers;use common\models\Krossword;use yii\data\ActiveDataProvider;use yii\web\Controller;use yii\web\NotFoundHttpException;use yii\filters\VerbFilter;/** * TestController implements the CRUD actions for Test model. */class KrosswordController extends FilterRoleController{    /**     * Lists all Test models.     *     * @return string     */    public function actionIndex()    {        $dataProvider = new ActiveDataProvider([            'query' => Krossword::find(),            /*            'pagination' => [                'pageSize' => 50            ],            'sort' => [                'defaultOrder' => [                    'id' => SORT_DESC,                ]            ],            */        ]);        return $this->render('index', [            'dataProvider' => $dataProvider,        ]);    }    /**     * Displays a single Test model.     * @param int $id ID     * @return string     * @throws NotFoundHttpException if the model cannot be found     */    public function actionView($id)    {        return $this->render('view', [            'model' => $this->findModel($id),        ]);    }    /**     * Creates a new Test model.     * If creation is successful, the browser will be redirected to the 'view' page.     * @return string|\yii\web\Response     */    public function actionCreate()    {        $model = new Krossword();        if ($this->request->isPost) {            if ($model->load($this->request->post())) {                $model->uploadImg();                $model->save(false);                return $this->redirect(['index']);            }        } else {            $model->loadDefaultValues();        }        return $this->render('create', [            'model' => $model,        ]);    }    /**     * Updates an existing Test model.     * If update is successful, the browser will be redirected to the 'view' page.     * @param int $id ID     * @return string|\yii\web\Response     * @throws NotFoundHttpException if the model cannot be found     */    public function actionUpdate($id)    {        $model = $this->findModel($id);        $oldImage = $model->image;        if ($this->request->isPost) {            if ($model->load($this->request->post())) {                $model->uploadImg($oldImage);                $model->save(false);                return $this->redirect(['index']);            }        } else {            $model->loadDefaultValues();        }        return $this->render('update', [            'model' => $model,        ]);    }    /**     * Deletes an existing Test model.     * If deletion is successful, the browser will be redirected to the 'index' page.     * @param int $id ID     * @return \yii\web\Response     * @throws NotFoundHttpException if the model cannot be found     */    public function actionDelete($id)    {        $model = Krossword::findOne($id);        unlink(\Yii::getAlias('@frontend') . '/web/krossword/'. $model->image);        $this->findModel($id)->delete();        return $this->redirect(['index']);    }    /**     * Finds the Test model based on its primary key value.     * If the model is not found, a 404 HTTP exception will be thrown.     * @param int $id ID     * @return Krossword the loaded model     * @throws NotFoundHttpException if the model cannot be found     */    protected function findModel($id)    {        if (($model = Krossword::findOne(['id' => $id])) !== null) {            return $model;        }        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));    }}