<?php

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Question */
/* @var $subject \backend\modules\testmanager\models\Subject */
/* @var $modelsOption \backend\modules\testmanager\models\Option[] */

$this->title = "Yangi test qo'shish";
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => $subject->name, 'url' => ['question/index', 'subject_id' => $subject->id]];
$this->params['breadcrumbs'][] = $this->title;
?>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsOption' => $modelsOption,
    ]) ?>

