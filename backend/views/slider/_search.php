<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SliderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'foto1') ?>

    <?= $form->field($model, 'foto2') ?>

    <?= //$form->field($model, 'title1') ?>

    <?= //$form->field($model, 'title2') ?>

    <?php // echo $form->field($model, 'text1') ?>

    <?php // echo $form->field($model, 'text2') ?>

    <?php echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
