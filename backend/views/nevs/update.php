<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nevs */

Yii::t('app', 'Tahrirlash: {name}');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="nevs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
