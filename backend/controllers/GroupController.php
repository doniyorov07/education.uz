<?php

namespace backend\controllers;

use common\models\Group;
use common\models\StudentGroup;
use common\models\TaskTable;
use common\models\User;
use frontend\controllers\FilterController;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use Yii;

class GroupController extends FilterController
{

    public function actionIndex()
    {
        $model = new Group();
        $group = Group::find()->all();

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

    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel(int $id)
    {
        if (($model = Group::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionUserall()
    {
        $query = User::find();
        $count = $query->count();

        $pagination = new Pagination([
            'totalCount' => $count,
            'pageSize' => 10,
        ]);

        $users = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->where(['role' => 'user'])
            ->all();

        return $this->render('userall', [
            'model' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionChange()
    {
        $id = \Yii::$app->request->get('id');
        $model = \common\models\Group::findOne($id);
        if($model->status == 1){
            $model->status = 0;
        }else{
            $model->status = 1;
        }
        if ($model->save()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
    }

    public function actionChangeUser()
    {
        $id = \Yii::$app->request->get('id');
        $model = \common\models\User::findOne($id);
        if($model->status == 10){
            $model->status = 9;
        }else{
            $model->status = 10;
        }
        if ($model->save()) {
            return $this->redirect(\Yii::$app->request->referrer);
        }
    }

    public function actionStudentGroup(int $id)
    {
        $group = Group::findOne($id);

        $student = StudentGroup::find()->where(['group_id' => $group->id])->all();
        if ($group == null){
            throw new NotFoundHttpException('No such information exists', '404');
        }

        return $this->render('student-group', [
            'student' => $student,
        ]);
    }

    public function actionTasks(int $id)
    {
        $student = User::findOne($id);
        if ($student == null)
        {
            throw new NotFoundHttpException('No such information exists', '404');
        }

        $task = TaskTable::find()->where(['student_id' => $student->id])->orderBy(['task_id' => SORT_ASC])->all();

        return $this->render('tasks', [
            'task' => $task,
        ]);
    }



    public function actionDownload(int $id)
    {
        $task = TaskTable::findOne(['task_id' => $id]);

        if ($task !== null) {
            if ($task->file !== null) {
                $local = \Yii::getAlias('@frontend/') . 'web/task/';
                $name = $task->file;
                $full = $local . $name;
                if (file_exists($full)) {
                    return Yii::$app->response->sendFile($full);
                } else {
                    throw new NotFoundHttpException("Fayl mavjud emas");
                }
            } else {
                throw new NotFoundHttpException("Fayl mavjud emas");
            }
        } else {
            throw new NotFoundHttpException("Bu qiymatga ega topshiriq mavjud emas");
        }
    }





}