<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Theory */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nazariya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="theory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
