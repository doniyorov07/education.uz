<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Practica */

$this->title = Yii::t('app', 'Yangi Q\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Amaliy Tajriba'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
