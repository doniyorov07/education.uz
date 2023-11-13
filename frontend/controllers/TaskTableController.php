<?php

namespace frontend\controllers;

use common\models\Task;
use dominus77\sweetalert2\Alert;
use Yii;
use common\models\TaskTable;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
class TaskTableController extends FilterController
{

    public function actionSend($id)
    {
        $model = Task::findOne($id);
        if ($model == null) {
            throw new ForbiddenHttpException('No such information exists');
        }

        $userId = Yii::$app->user->id;
        if ($userId === null) {
            Yii::$app->session->setFlash(Alert::TYPE_WARNING, [
                'text' => 'Topshiriqni yuklash uchun tizimga kiring!',
                'timer' => 3500
            ]);
            return $this->redirect(['/site/login']);
        }

        $file = new TaskTable([
            'student_id' => $userId,
            'datetime' => date('Y-m-d'),
            'task_id' => $model->id,
            'attemps' => 1,
        ]);

           $attempts = TaskTable::find()->where(['task_id' => $model->id, 'student_id' => $userId])->sum('attemps');

        if ($this->request->isPost) {
            $file->file = UploadedFile::getInstance($file, 'file'); // Faylni o'qish
            if ($file->file) {
                if ($file->validate()) {
                    $newFileName = 'file_' . time() . '.' . $file->file->extension;
                    $file->file->saveAs('@frontend/web/task/' . $newFileName); // Faylni saqlash
                    $file->file = $newFileName;
                    if ($file->save()) {
                        return $this->redirect(['/task/index']);
                    }
                }
            }
        }

        return $this->render('send', [
            'file' => $file,
            'model' => $model,
            'attempts' => $attempts,

        ]);
    }




//if ($model->attemps !== $attemps)
}