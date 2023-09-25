<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nevs */

$this->title = Yii::t('app', 'Yangi Qo\'shish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Yangiliklar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nevs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
