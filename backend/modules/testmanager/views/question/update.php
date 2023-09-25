<?php

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Question */
/* @var $subject \backend\modules\testmanager\models\Subject */
/* @var $modelsOption \backend\modules\testmanager\models\Option[] */

$this->title = 'Testni tahrirlash: #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['subject/index']];
$this->params['breadcrumbs'][] = ['label' => $subject->name, 'url' => ['question/index', 'subject_id' => $subject->id]];
$this->params['breadcrumbs'][] = ['label' => '#' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
$this->registerCss("
    .radio-area label{
        cursor:pointer;
    }
");
?>

<?= $this->render('_form', [
    'model' => $model,
    'subject' => $subject,
    'modelsOption' => $modelsOption,
]) ?>

