<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Subject */

$this->title = 'Tahrirlash: '. $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
