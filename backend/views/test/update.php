<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Test */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ortga'), 'url' => ['index']];
?>
<div class="test-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
