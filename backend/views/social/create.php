<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Social */

$this->title = Yii::t('app', 'Yangi Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ijtimoiy Tarmoqlar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
