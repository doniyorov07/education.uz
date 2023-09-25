<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Test */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ortga'), 'url' => ['index']];

?>
<div class="test-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
