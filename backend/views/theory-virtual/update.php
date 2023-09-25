<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TheoryVirtual */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ortga'), 'url' => ['index']];

?>
<div class="theory-virtual-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
