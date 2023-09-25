<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Practica */



$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Amaliy Tajriba'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="practica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
