<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Krossword */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ortga'), 'url' => ['index']];
?>
<div class="krossword-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
