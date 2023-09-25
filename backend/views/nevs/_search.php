<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\NevsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nevs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?=  //$form->field($model, 'views_count') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'video_url') ?>

    <?= $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'batafsil') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
