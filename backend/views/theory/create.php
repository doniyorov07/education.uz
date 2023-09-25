<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Theory */

$this->title = Yii::t('app', 'Yangi Q\'oshish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nazariya'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
