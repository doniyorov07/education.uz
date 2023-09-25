<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Laboratory */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Labaratoriya'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="laboratory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
