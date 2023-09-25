<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\testmanager\models\Subject */

$this->title = 'Create Subject';
$this->params['breadcrumbs'][] = ['label' => 'Fanlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
